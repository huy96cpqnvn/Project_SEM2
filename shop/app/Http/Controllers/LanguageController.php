<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Language;

class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lsLang = Language::all();
        return view('language.list')->with(['lsLanguage' => $lsLang]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('language.create');
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
        
        
        $lang = new Language();
        $lang->name = $request->name1;
        $lang->save();
        
        $request->session()->flash('success','Language was successfull');
        return redirect()->route("language_management.index");
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
        $lang = Language::find($id);
        return view('language.edit')->with(['lang' => $lang]);
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
        
        
        $lang = Language::find($id);
        $lang->name = $request->name1;
        $lang->save();
        
        $request->session()->flash('success','Language was updated');
        return redirect()->route("language_management.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $lang = Language::find($id);
        $lang->delete();
        $request->session()->flash('success','Language was deleted');
        return redirect()->route("language_management.index");
    }
}
