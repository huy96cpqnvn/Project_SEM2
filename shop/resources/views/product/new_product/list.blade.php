@extends('layouts.backend')

@section('content')
<div class="container">
    <h1>Product Management</h1>

    @if(session()->has('success'))
    <div class="flash-message">
        <p class="alert alert-success">{{Session::get('success')}}</p>
    </div>
    @endif

    <a href="product_management/create">Add New</a>
    <table class="table">
        <th>No.</th>
        <th>Name</th>
        <th>Category</th>
        <th>Active</th>

        @foreach($lsProduct as $pro)
        <tr>
            <td>{{$pro->id}}</td>
            <td>{{$pro->name}}</td>
            <td>{{$pro->category['name']}}</td>
            <td>
                <a class="button" href="{{route('product_management.edit',$pro->id)}}">Edit</a>
                <form method="POST" action="{{ route('product_management.destroy', $pro->id) }}" onsubmit="confirm('Sure ?')">

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


