@extends('layouts.backend');

@section('content')
<div class="container">

    @if(count($errors) > 0)
    <div class="alert alert-danger">
        @foreach($errors->all() as $er)
        <p>{{$er}}</p>
        @endforeach
    </div>


    @endif

    <form method="post" action="{{route('news_management.update',$news->id)}}" enctype="multipart/form-data"> <!-- Phải có entype để có thể nhận dạng file đưa lên -->
        @csrf  <!-- Bảo mật cho dữ liệu, khi dữ liệu đưa lên tự động tạo ra 1 token -->
        <input type="hidden" name="_method" value="PUT"/>
         <div class="form-group">
            <label for="name">Cover Image</label>
            <input type="file" class="form-control" id="file" name="file1" placeholder="Enter Image"/>
        </div>
        <div class="form-group">
            <label for="name">Title</label>
            <input type="text" class="form-control" id="title" name="title1" placeholder="Enter Title" value="{{$news->title}}"/>
        </div>

        <div class="form-group">
            <label for="name">Summary</label>
            <input type="text" class="form-control" id="summary" name="summary1" placeholder="Enter Summary" value="{{$news->summary}}">
        </div>
        <div class="form-group">
            <label for="name">Content</label>
            <textarea rows="6" cols="150" name="content1">{{$news->content}}</textarea>
        </div>
        <div class="form-group">
            <label for="name">Category</label>
            <select name="category_id1" id="category_id">
                @foreach($allCategory as $alc)
                <option value="{{$alc->id}}" {{$alc->id == $news->category_id ? 'selected' : ''}}>{{$alc->name}}</option>
                @endforeach
            </select>
        </div>



        <div class="form-group">
            <label for="name">Active</label>
            <select name="status1" id="status">
                <option value="0" {{$news->status == 0 ? 'selected' : ''}}>Draff</option>
                <option value="1" {{$news->status == 1 ? 'selected' : ''}}>Public</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<script>
        CKEDITOR.replace('content1');
    </script>
@endsection