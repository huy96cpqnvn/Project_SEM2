@extends('layouts.backend')

@section('content')
<div class="container">
    <h1>Publisher Management</h1>

    @if(session()->has('success'))
    <div class="flash-message">
        <p class="alert alert-success">{{Session::get('success')}}</p>
    </div>
    @endif

    <a href="pub_management/create">Add New</a>
    <table class="table">
        <th>No.</th>
        <th>Name</th>
        <th>Active</th>

        @foreach($lsPublisher as $pub)
        <tr>
            <td>{{$pub->id}}</td>
            <td>{{$pub->name}}</td>
            <td>
                <a class="button" href="{{route('pub_management.edit',$pub->id)}}">Edit</a>
                <form method="POST" action="{{ route('pub_management.destroy', $pub->id) }}" onsubmit="confirm('Sure ?')">

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


