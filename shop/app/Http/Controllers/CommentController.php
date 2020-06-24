<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lsComment = Comment::all();
        return view('comment.list')->with(['lsComment' => $lsComment]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $com = Comment::find($id);
        $com->delete();
        $request->session()->flash('success','Comment was deleted');
        return redirect()->route("comment_management.index");
    }
    
     public function change($id, Request $request) {
        $com = Comment::find($id);
        if($com->status == 1) {
            $com->status = 0;
        } else {
            $com->status = 1;
        }
        $com->save();
        $request->session()->flash('success','Comment was changed');
        return redirect()->route("comment_management.index");
    }
    
    
    public function process(Request $request)
    {
        $search = $request->input('search');
        $lsComment = Comment::select()->where('email','like',"%$search%")->orWhere('name','like',"%$search%")->get();
        return  view('comment.list')->with([
            'lsComment' =>$lsComment,
            'search'=>$search
        ]);
    }
    
    public function status($status)
    {

        if ($status == 1 || $status == 0) {
            $lsComment = Comment::select()->where('status', '=', $status)->get();

        } else {
            $lsComment = Comment::all();

        }

        return view('comment.list')->with([
            'lsComment'=> $lsComment
        ]);
    }

}
