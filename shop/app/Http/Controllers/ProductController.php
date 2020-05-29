<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lsPro = Product::all();
        return view('product.list')->with(['lsProduct' => $lsPro]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allCategory = Category::all();
        return view('product.create')->with(['allCategory' => $allCategory]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'name1' => 'required|max:255|min:3'
            ]
               
        );
        
        
        $pro = new Product();
        $pro->name = $request->name1;
        $pro->category_id = $request->category_id1;
        $pro->save();
        
        $request->session()->flash('success','Product was successfull');
        return redirect()->route("product_management.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pro = Product::find($id);
        $allCategory = Category::all();
        return view('product.edit')->with(['allCategory' => $allCategory, 'pro' => $pro]);
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
        $request->validate(
            [
                'name1' => 'required|max:255|min:3'
            ]
               
        );
        
        
        $pro = Product::find($id);
        $pro->name = $request->name1;
        $pro->category_id = $request->category_id1;
        $pro->save();
        
        $request->session()->flash('success','Product was updated');
        return redirect()->route("product_management.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $pro = Product::find($id);
        $pro->delete();
        $request->session()->flash('success','Product was deleted');
        return redirect()->route("product_management.index");
    }
}
