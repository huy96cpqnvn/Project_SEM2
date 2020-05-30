<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class Admin_userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
       return  view('admin.manage_user')->with([
           'users' =>$users
       ]);
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

        $user = User::find($id);
        $users = User::all();
        return view('admin.form')->with([
            'user'=>$user,
            'users'=>$users
        ]);
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

        $request->validate([
            'name' => 'required|max:255|min:3',
            'email' => 'required|max:255|min:3|unique:users',
            'email' => 'required|max:255|min:3|unique:users',
            'phone' => 'required|max:255|min:3|unique:users',
            'address' => 'required|max:255|min:3',
            'status'=>'required|in:0,1',

        ]);

        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->status = $request->status;
        $user->save();

        $request->session()->flash('sucess','User was updated');
        return  redirect()->route('user_management.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id ,Request $request)
    {
        $user = User::find($id);
        $user->delete();
        $request->session()->flash('success', 'Post was deleted!');
        return  redirect()->route('user_management.index');

    }
}
