@extends('layouts.backend')

@section('content')
<div class="container">
    <h1>Category Management</h1>

    @if(session()->has('success'))
    <div class="flash-message">
        <p class="alert alert-success">{{Session::get('success')}}</p>
    </div>
    @endif

    <a href="cate_management/create">Add New</a>
    <table class="table">
        <th>No.</th>
        <th>Name</th>
        <th>Active</th>

        @foreach($lsCategory as $cate)
        <tr>
            <td>{{$cate->id}}</td>
            <td>{{$cate->name}}</td>
            <td>
                <a class="button" href="{{route('cate_management.edit',$cate->id)}}">Edit</a>
                <form method="POST" action="{{ route('cate_management.destroy', $cate->id) }}" onsubmit="confirm('Sure ?')">

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


