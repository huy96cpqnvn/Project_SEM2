@extends('layouts.backend')

@section('content')
<div class="container">
    <h1>Author Management</h1>

    @if(session()->has('success'))
    <div class="flash-message">
        <p class="alert alert-success">{{Session::get('success')}}</p>
    </div>
    @endif

    <a href="author_management/create">Add New</a>
    <table class="table">
        <th>No.</th>
        <th>Name</th>
        <th>Profile</th>
        <th>Active</th>

        @foreach($lsAuthor as $aut)
        <tr>
            <td>{{$aut->id}}</td>
            <td>{{$aut->name}}</td>
            <td>{{$aut->detail}}</td>
            <td>
                <a class="button" href="{{route('author_management.edit',$aut->id)}}">Edit</a>
                <form method="POST" action="{{ route('author_management.destroy', $aut->id) }}" onsubmit="confirm('Sure ?')">

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


