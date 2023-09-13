<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShoesSizeRequest;
use App\Models\ShoesSize;
use Illuminate\Http\Request;

class ShoesSizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shoes = ShoesSize::all();
        return view('shoes.index', compact('shoes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('shoes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ShoesSizeRequest $request)
    {
        $data = $request->validated();
        ShoesSize::firstOrCreate($data);

        return redirect()->route('shoes.index')->with('success','Shoes Size was added successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ShoesSize $shoes)
    {
        return view('shoes.show', compact('shoes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ShoesSize $shoes)
    {
        return view('shoes.edit', compact('shoes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ShoesSizeRequest $request,ShoesSize $shoes)
    {
        $data = $request->validated();
        $shoes->update($data);

        return view('shoes.show', compact('shoes'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ShoesSize $shoes)
    {
        $shoes->delete();

        return redirect()->route('shoes.index')->with('success','Shoes size was added successfully');

    }
}
