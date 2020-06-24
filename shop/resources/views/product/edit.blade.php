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
    
    <form method="post" action="{{route('product_management.update', $pro->id)}}">
        @csrf  <!-- Bảo mật cho dữ liệu, khi dữ liệu đưa lên tự động tạo ra 1 token -->
        <input type="hidden" name="_method" value="PUT"/>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name1" placeholder="Enter Name" value="{{$pro->name}}"/>
        </div>
        
        <div class="form-group">
            <div class="row">
                <div class="col-md-4 col-lg-2">
                    <label for="name">Category</label>
                </div>
                <div class="col-md-4 col-lg-4 inputGroupContainer">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="mdi mdi-alpha-c-box"></i>
                            </span>
                        </div>
                        <select name="category_id1" id="category_id">
                            @foreach($allCategory as $alc)
                            <option value="{{$alc->id}}" {{$alc->id == $pro->category_id ? 'selected' : ''}}>{{$alc->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection