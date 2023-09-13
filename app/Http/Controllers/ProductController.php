<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Models\Category;
use App\Models\Color;
use App\Models\ColorProduct;
use App\Models\Image as ModelsImage;
use App\Models\Product;
use App\Models\ProductTag;
use App\Models\ShoesSize;
use App\Models\ShoesSizeProduct;
use App\Models\Tag;
use Illuminate\Http\Request;
use Image, Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        $colors = Color::all();
        $categories = Category::all();
        $shoes = ShoesSize::all();

        return view('product.create', compact('tags', 'colors', 'categories', 'shoes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasFile("cover")){
            $file = $request->file("cover");
            $imageName = time().'_'.$file->getClientOriginalName();
            $file->move(\public_path("cover/"), $imageName);

            // dd($imageName );
            $product = new Product([
                "title" => $request->title,
                "description" => $request->description,
                "content" => $request->content,
                "cover" => $imageName,
                "price" => $request->price,
                "count" => $request->count,
                "category_id" => $request->category_id,
                "created_at" => now(),
            ]);
            $product->save();
        }
        if($request->hasFile("images")){
            $files = $request->file("images");
            foreach($files as $file){
                $imageName = time().'_'.$file->getClientOriginalName();
                $request['product_id'] = $product->id;
                $request['image'] = $imageName;
                $file->move(\public_path("/images"), $imageName);
                ModelsImage::create($request->all());
            }
        }
        $product->tags()->attach($request->tags);
        $product->shoes_size()->attach($request->shoes_size);
        $product->colors()->attach($request->colors);

        return redirect()->route('products.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $images = ModelsImage::where('product_id', $product->id)->get();
        return view('product.show', compact('product', 'images'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $tags = Tag::all();
        $colors = Color::all();
        $categories = Category::all();
        $shoes = ShoesSize::all();
        return view('product.edit', compact('product', 'tags', 'colors', 'categories', 'shoes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product_image_id = ModelsImage::find($id);
        // $images = $product_image_id->image;

        if($request->hasFile("cover")){
            if(file_exists(public_path("cover/".$product->cover))){
                unlink(public_path("cover/".$product->cover));
            }
            $file = $request->file("cover");
            $product->cover=time().'_'.$file->getClientOriginalName();
            $file->move(\public_path("/cover"), $product->cover);
            $request['cover'] = $product->cover;
        }
        $product->update([
            "title" => $request->title,
            "description" => $request->description,
            "content" => $request->content,
            "cover" => $product->cover,
            "price" => $request->price,
            "count" => $request->count,
            "category_id" => $request->category_id,
            "updated_at" => now(),
        ]);
        if($request->hasFile("images")){
            $files = $request->file("images");
            foreach($files as $file){
                $imageName = time().'_'.$file->getClientOriginalName();
                $request['product_id'] = $product->id;
                $request['image'] = $imageName;
                $file->move(\public_path("/images"), $imageName);
                ModelsImage::create($request->all());
            }
        }


        $product->tags()->sync($request->tags);
        $product->shoes_size()->sync($request->shoes_size);
        $product->colors()->sync($request->colors);

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

            if(file_exists(public_path("cover/".$product->cover))){
                unlink(public_path("cover/".$product->cover));
            }
         $images=ModelsImage::where("product_id",$product->id)->get();
            foreach($images as $image){
            if (file_exists(public_path("images/".$image->image))) {
                unlink(public_path("images/".$image->image));
                }
            }
         $product->delete();
         return redirect()->route('products.index');
    }

    public function deleteimage($id)
    {
        $images = ModelsImage::findOrFail($id);
        if(file_exists(public_path("images/".$images->image))){
            unlink(public_path("images/".$images->image));
        }

        ModelsImage::find($id)->delete();
        return back();
    }
    public function deletecover($id){
        // dd(111);
        $cover = Product::findOrFail($id)->cover;
        if (file_exists(public_path("cover/".$cover))) {
            unlink(public_path("cover/".$cover));
       }
       return back();
    }
}
