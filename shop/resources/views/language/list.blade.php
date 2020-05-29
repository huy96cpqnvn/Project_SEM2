@extends('layouts.backend')

@section('content')
<div class="container">
    <h1>Language Management</h1>

    @if(session()->has('success'))
    <div class="flash-message">
        <p class="alert alert-success">{{Session::get('success')}}</p>
    </div>
    @endif

    <a href="language_management/create">Add New</a>
    <table class="table">
        <th>No.</th>
        <th>Name</th>
        <th>Active</th>

        @foreach($lsLanguage as $lang)
        <tr>
            <td>{{$lang->id}}</td>
            <td>{{$lang->name}}</td>
            <td>
                <a class="button" href="{{route('language_management.edit',$lang->id)}}">Edit</a>
                <form method="POST" action="{{ route('language_management.destroy', $lang->id) }}" onsubmit="confirm('Sure ?')">

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


