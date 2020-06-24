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
    
    <form method="post" action="{{route('proDetail_management.update', $prd->id)}}" enctype="multipart/form-data">
        @csrf  <!-- Bảo mật cho dữ liệu, khi dữ liệu đưa lên tự động tạo ra 1 token -->
        <input type="hidden" name="_method" value="PUT"/>
         <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name1" placeholder="Enter Name" value="{{$prd->name}}"/>
        </div>

        <div class="form-group">
            <label for="name">Cover Image</label>
            <input type="file" class="form-control" id="file" name="file1" placeholder="Enter Image"/>
        </div>

        <div class="form-group">
            <label for="name">Review</label>
            <input type="text" class="form-control" id="review" name="review1" placeholder="Enter Review" value="{{$prd->review}}">
        </div>

        <div class="form-group">
            <label for="name">Detail</label>
            <textarea rows="6" cols="150" name="detail1" id="editor">{{$prd->detail}}</textarea>
        </div>
        
        <div class="form-group">
            <label for="name">Price</label>
            <input type="text" class="form-control" id="price" name="price1" placeholder="Enter Price" value="{{$prd->price}}"/>
        </div>
        
        <div class="form-group">
            <label for="name">Amount</label>
            <input type="text" class="form-control" id="amount" name="amount1" placeholder="Enter Amount" value="{{$prd->amount}}"/>
        </div>
        
        <div class="form-group">
            <label for="name">Discount</label>
            <input type="text" class="form-control" id="discount" name="discount1" placeholder="Enter Discount" value="{{$prd->discount}}"/>
        </div>

        
        <div class="form-group">
            <div class="row">
                <div class="col-md-4 col-lg-2">
                    <label for="name">Product</label>
                </div>
                <div class="col-md-4 col-lg-4 inputGroupContainer">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="mdi mdi-alpha-p-box"></i>
                            </span>
                        </div>
                        <select name="product_id1" id="product_id">
                            @foreach($allProduct as $pro)
                            <option value="{{$pro->id}}" {{$pro->id == $prd->product_id ? 'selected' : ''}}>{{$pro->name}}</option> 
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>


        <div class="form-group">
            <div class="row">
                <div class="col-md-4 col-lg-2">
                    <label for="name">Author</label>
                </div>
                <div class="col-md-4 col-lg-4 inputGroupContainer">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="mdi mdi-alpha-a-box"></i>
                            </span>
                        </div>
                        <select name="author_id1" id="author_id">
                            @foreach($allAuthor as $aut)
                            <option value="{{$aut->id}}" {{$aut->id == $prd->author_id ? 'selected' : ''}}>{{$aut->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>


        <div class="form-group">
            <div class="row">
                <div class="col-md-4 col-lg-2">
                    <label for="name">Language</label>
                </div>
                <div class="col-md-4 col-lg-4 inputGroupContainer">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="mdi mdi-alpha-l-box"></i>
                            </span>
                        </div>
                        <select name="language_id1" id="language_id">
                            @foreach($allLanguage as $lang)
                            <option value="{{$lang->id}}" {{$lang->id == $prd->language_id ? 'selected' : ''}}>{{$lang->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>


        <div class="form-group">
            <div class="row">
                <div class="col-md-4 col-lg-2">
                    <label for="name">Publisher</label>
                </div>
                <div class="col-md-4 col-lg-4 inputGroupContainer">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="mdi mdi-alpha-p-box"></i>
                            </span>
                        </div>
                        <select name="publisher_id1" id="publisher_id">
                            @foreach($allPublisher as $pub)
                            <option value="{{$pub->id}}" {{$pub->id == $prd->publisher_id ? 'selected' : ''}}>{{$pub->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>


        <div class="form-group">
            <div class="row">
                <div class="col-md-4 col-lg-2">
                    <label for="name">Status</label>
                </div>
                <div class="col-md-4 col-lg-4 inputGroupContainer">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="mdi mdi-alpha-s-box"></i>
                            </span>
                        </div>
                        <select name="status1" id="status">
                            <option value="0" {{$prd->status == 0 ? 'selected' : ''}}>draff</option>
                            <option value="1" {{$prd->status == 1 ? 'selected' : ''}}>public</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        
        
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<script>
        CKEDITOR.replace('editor');
    </script>
@endsection