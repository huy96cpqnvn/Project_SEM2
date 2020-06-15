@extends('layouts.backend')

@section('content')
<div class="container">
    <h1>Discount Management</h1>

    @if(session()->has('success'))
    <div class="flash-message">
        <p class="alert alert-success">{{Session::get('success')}}</p>
    </div>
    @endif

    <a href="dis_management/create">Add New</a>
    <table class="table">
        <th>No.</th>
        <th>Discount</th>
        <th>Active</th>

        @foreach($lsDiscount as $dis)
        <tr>
            <td>{{$dis->id}}</td>
            <td>{{$dis->discount}}</td>
            <td>
                <a class="button" href="{{route('dis_management.edit',$dis->id)}}">Edit</a>
                <form method="POST" action="{{ route('dis_management.destroy', $dis->id) }}" onsubmit="confirm('Sure ?')">

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


