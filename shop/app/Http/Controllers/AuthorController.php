<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Author;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lsAut = Author::all();
        return view('author.list')->with(['lsAuthor' => $lsAut]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('author.create');
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
                'name1' => 'required|max:255|min:3',
                'detail1' => 'required'
            ]
               
        );
        
        
        $aut = new Author();
        $aut->name = $request->name1;
        $aut->detail = $request->detail1;
        $aut->save();
        
        $request->session()->flash('success','Author was successfull');
        return redirect()->route("author_management.index");
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
        $aut = Author::find($id);
        return view('author.edit')->with(['aut' => $aut]);
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
                'name1' => 'required|max:255|min:3',
                'detail1' => 'required'
            ]
               
        );
        
        
        $aut = Author::find($id);
        $aut->name = $request->name1;
        $aut->detail = $request->detail1;
        $aut->save();
        
        $request->session()->flash('success','Author was updated');
        return redirect()->route("author_management.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $aut = Author::find($id);
        $aut->delete();
        $request->session()->flash('success','Author was deleted');
        return redirect()->route("aut_management.index");
    }
    
     public function process(Request $request)
    {
        $search = $request->input('search');
        $lsAuthor = Author::select()->where('name','like',"%$search%")->get();
        return  view('author.list')->with([
            'lsAuthor' =>$lsAuthor,
            'search'=>$search
        ]);
    }
    
}
