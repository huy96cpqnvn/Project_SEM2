<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Discount;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lsDis = Discount::all();
        return view('discount.list')->with(['lsDiscount' => $lsDis]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('discount.create');
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
                'discount' => 'required|max:255'     
            ]
               
        );
        
        
        $dis = new Discount();
        $dis->discount = $request->discount;
        $dis->save();
        
        $request->session()->flash('success','Discount was successfull');
        return redirect()->route("dis_management.index");
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
        $dis = Discount::find($id);
        return view('discount.edit')->with(['dis' => $dis]);
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
                'discount' => 'required|max:255'     
            ]
               
        );
        
        
        $dis = Discount::find($id);
        $dis->discount = $request->discount;
        $dis->save();
        
        $request->session()->flash('success','Discount was updated');
        return redirect()->route("dis_management.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $dis = Discount::find($id);
        $dis->delete();
        $request->session()->flash('success','Discount was deleted');
        return redirect()->route("dis_management.index");
    }
}
