@extends('layouts.backend')

@section('content')
<div class="container">
    <h1>Tags Management</h1>

    @if(session()->has('success'))
    <div class="flash-message">
        <p class="alert alert-success">{{Session::get('success')}}</p>
    </div>
    @endif

    <a href="tag_management/create">Add New</a>
    <table class="table">
        <th>No.</th>
        <th>Name</th>
        <th>Active</th>

        @foreach($lsTag as $tag)
        <tr>
            <td>{{$tag->id}}</td>
            <td>{{$tag->name}}</td>
            <td>
                <a class="button" href="{{route('tag_management.edit',$tag->id)}}">Edit</a>
                <form method="POST" action="{{ route('tag_management.destroy', $tag->id) }}" onsubmit="confirm('Sure ?')">

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


