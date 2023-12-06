<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        if($request->hasFile("cover")){
            $file = $request->file("cover");
            $imageName = time().'_'.$file->getClientOriginalName();
            $file->move(\public_path("cover/"), $imageName);

            // dd($imageName );
            $category = new Category([
                "title" => $request->title,
                "cover" => $imageName,
                "created_at" => now(),
            ]);
            $category->save();
        }
        return redirect()->route('categories.index')->with('success','Category was added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        $category = Category::findOrFail($id);
        if($request->hasFile("cover")){
            if($category->cover){
                unlink(public_path("cover/".$category->cover));
            }
            $file = $request->file("cover");
            $category->cover=time().'_'.$file->getClientOriginalName();
            $file->move(\public_path("/cover"), $category->cover);
            $request['cover'] = $category->cover;
        }
        $category->update([
            'title' => $request->title,
            "cover" => $category->cover,
            "updated_at" => now()
        ]);

        return view('category.show', compact('category'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        if(file_exists(public_path("cover/".$category->cover))){
            unlink(public_path("cover/".$category->cover));
        }
        $category->delete();

        return redirect()->route('categories.index')->with('success','Category was deleted successfully');
    }
    public function deletecover($id){
        // dd(111);
        $cover = Category::findOrFail($id)->cover;
        if (file_exists(public_path("cover/".$cover))) {
            unlink(public_path("cover/".$cover));
        }
        return back();
    }
    public function showProductsCategory($id)
    {
        $products_category = Product::where('category_id', $id)->get();

        return view('category_products', compact('products_category'));
    }
}
