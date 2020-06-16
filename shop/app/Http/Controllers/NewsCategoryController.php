<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NewsCategory;

class NewsCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function index()
    {
        $lsCate = NewsCategory::paginate(1);
        return view('newsCategory.list')->with(['lsCategory' => $lsCate]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('newsCategory.create');
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


        $cate = new NewsCategory();
        $cate->name = $request->name1;
        $cate->save();

        $request->session()->flash('success','NewsCategory was successfull');
        return redirect()->route("newscate_management.index");
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
        $cate = NewsCategory::find($id);
        return view('newsCategory.edit')->with(['cate' => $cate]);
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


        $cate = NewsCategory::find($id);
        $cate->name = $request->name1;
        $cate->save();

        $request->session()->flash('success','NewsCategory was updated');
        return redirect()->route("newscate_management.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $cate = NewsCategory::find($id);
        $cate->delete();
        $request->session()->flash('success','NewsCategory was deleted');
        return redirect()->route("newscate_management.index");
    }

     public function process(Request $request)
    {
        $search = $request->input('search');
        $lsCate = NewsCategory::select()->where('name','like',"%$search%")->get();
        return  view('newscategory.list')->with([
            'lsCategory' =>$lsCate,
            'search'=>$search
        ]);
    }

}
