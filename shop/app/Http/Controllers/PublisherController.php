<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Publisher;

class PublisherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lsPub = Publisher::all();
        return view('publisher.list')->with(['lsPublisher' => $lsPub]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('publisher.create');
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
        
        
        $pub = new Publisher();
        $pub->name = $request->name1;
        $pub->save();
        
        $request->session()->flash('success','Publisher was successfull');
        return redirect()->route("pub_management.index");
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
        $pub = Publisher::find($id);
        return view('publisher.edit')->with(['pub' => $pub]);
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
        
        
        $pub = Publisher::find($id);
        $pub->name = $request->name1;
        $pub->save();
        
        $request->session()->flash('success','Publisher was updated');
        return redirect()->route("pub_management.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $pub = Publisher::find($id);
        $pub->delete();
        $request->session()->flash('success','Publisher was deleted');
        return redirect()->route("pub_management.index");
    }
}
