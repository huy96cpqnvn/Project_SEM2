<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class Admin_userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(Request $request)
    {



    }
//    public function search($search){
//
//    }

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

        $request->validate([
            'name' => 'required|max:255|min:3',
            'email' => 'required|max:255|min:3|unique:users',
            'email' => 'required|max:255|min:3|unique:users',
            'phone' => 'required|max:255|min:3|unique:users',
            'address' => 'required|max:255|min:3',
            'status'=>'required|in:0,1',

        ]);
        $user =  new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->status = $request->status;
        $user->password	 = $request->pass;
        $user->level	 = $request->level;
        $user->save();

        $request->session()->flash('sucess','User was updated');
        return  redirect()->route('user_management.index');

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
    public function edit($id,Request $request)
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
            'email' => 'required|max:255|min:3',
            'phone' => 'required|max:255|min:3',
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
    public  function add(){
        return view('user.form');
    }
    public function search()
    {
    }
    public function process(Request $request)
    {
        $search = $request->input('search');

        $users = User::select()->where('email','like',"%$search%")->get();
        return  view('admin.manage_user')->with([
            'users' =>$users
        ]);
    }
    public  function  status($status){

        if ($status ==1 || $status ==0){
            $users = User::select()->where('status','=',$status)->get();

        }else {
            $users = User::all();

        }

        return  view('admin.manage_user')->with([
            'users' =>$users,
        ]);
    }
    public  function getLogin(){
        return view('admin.message_for_admin_user');
    }
    public  function postLogin(Request $request)
    {

//        $arr =   ['email'=>$request->email,
//            'password'=>$request->password,
//            ];
//        if (Auth::attempt($arr)){
//
//            dd('tc');
//        }else{
//            dd('cd');
//        }


        return view('auth.login');
    }
    protected function createCheckLogin(array $data)
    {
        return User::create([
            ‘name’ => $data[‘name’],
            ‘email’ => $data[‘email’],
            ‘password’ => bcrypt($data[‘password’]),
            ‘level’ => $data[‘level’],
        ]);
    }
}
