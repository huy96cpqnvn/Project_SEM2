<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PriceFilter;

class PriceFilterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function index()
    {
        $lsPrf = PriceFilter::all();
        return view('priceFilter.list')->with(['lsPriceFilter' => $lsPrf]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('priceFilter.create');
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
        
        
        $prf = new PriceFilter();
        $prf->name = $request->name1;
        $prf->save();
        
        $request->session()->flash('success','PriceFilter was successfull');
        return redirect()->route("prf_management.index");
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
        $prf = PriceFilter::find($id);
        return view('priceFilter.edit')->with(['prf' => $prf]);
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
        
        
        $prf = PriceFilter::find($id);
        $prf->name = $request->name1;
        $prf->save();
        
        $request->session()->flash('success','PriceFilter was updated');
        return redirect()->route("prf_management.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $prf = PriceFilter::find($id);
        $prf->delete();
        $request->session()->flash('success','PriceFilter was deleted');
        return redirect()->route("prf_management.index");
    }
    
    public function process(Request $request)
    {
        $search = $request->input('search');
        $lsPriceFilter = PriceFilter::select()->where('name','like',"%$search%")->get();
        return  view('priceFilter.list')->with([
            'lsPriceFilter' =>$lsPriceFilter,
            'search'=>$search
        ]);
    }
    
}
