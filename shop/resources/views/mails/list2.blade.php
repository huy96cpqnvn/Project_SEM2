@extends('layouts.backend')

@section('content')
<div class="container">
    <h1>Mail Management</h1>

    @if(session()->has('success'))
    <div class="flash-message">
        <p class="alert alert-success">{{Session::get('success')}}</p>
    </div>
    @endif

    <a href="mail_management/create">Add New</a>
    <table class="table">
        <th>No.</th>
        <th>Mail</th>
        <th>Active</th>

        @foreach($lsMail as $mail)
        <tr>
            <td>{{$mail->id}}</td>
            <td>{{$mail->email}}</td>
            <td>
                <a class="button" href="{{route('mail_management.edit',$mail->id)}}">Edit</a>
                <form method="POST" action="{{ route('mail_management.destroy', $mail->id) }}" onsubmit="confirm('Sure ?')">

                    @csrf
                    <input type="hidden" name="_method" value="DELETE"/>
                    <input type="submit" value="Delete" />
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection


