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
    
    <form method="post" action="{{route('dis_management.update', $dis->id)}}">
        @csrf  <!-- Bảo mật cho dữ liệu, khi dữ liệu đưa lên tự động tạo ra 1 token -->
        <input type="hidden" name="_method" value="PUT"/>
        <div class="form-group">
            <label for="name">Discount</label>
            <input type="text" class="form-control" id="discount" name="discount" placeholder="{{$dis->discount}}"/>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection