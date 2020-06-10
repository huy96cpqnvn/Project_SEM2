<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subscribe;

class SubscribeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lsMail = Subscribe::all();
        return view('mails.list')->with(['lsMail' => $lsMail]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mails.create');
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
                'email' => 'required'
            ]

        );


        $mail = new Subscribe();
        $mail->email = $request->email;
        $mail->save();

        $request->session()->flash('success','Mail was successfull');
        return redirect()->route("mail_management.index");
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
        $mail = Subscribe::find($id);
        return view('mails.edit')->with(['mail' => $mail]);
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
                'email' => 'required'
            ]

        );


        $mail = Subscribe::find($id);
        $mail->email = $request->email;
        $mail->save();

        $request->session()->flash('success','Mail was updated');
        return redirect()->route("mail_management.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $mail = Subscribe::find($id);
        $mail->delete();
        $request->session()->flash('success','Mail was deleted');
        return redirect()->route("mail_management.index");
    }
}
