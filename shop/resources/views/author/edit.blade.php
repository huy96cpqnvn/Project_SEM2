@extends('layouts.backend')

@section('content')
<div class="container">
    
    @if(count($errors) > 0)
    <div class="alert alert-danger">
        @foreach($errors->all() as $er)
        <p>{{$er}}</p>
        @endforeach
    </div>
    
    
    @endif
    
    <form method="post" action="{{route('author_management.update', $aut->id)}}">
        @csrf  <!-- Bảo mật cho dữ liệu, khi dữ liệu đưa lên tự động tạo ra 1 token -->
        <input type="hidden" name="_method" value="PUT"/>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name1" placeholder="Enter Name" value="{{$aut->name}}"/>
        </div>
        <div class="form-group">
            <label for="name">Profile</label>
            <textarea rows="6" cols="150" name="detail1" placeholder="Enter Author Detail" id="editor" >{{$aut->detail}}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<script>
        CKEDITOR.replace('editor');
    </script>
@endsection