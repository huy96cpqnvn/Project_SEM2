@extends('layouts.backend')

@section('content')
<div class="container">
    <h1>ProductDetail Management</h1>

    @if(session()->has('success'))
    <div class="flash-message">
        <p class="alert alert-success">{{Session::get('success')}}</p>
    </div>
    @endif

    <a href="proDetail_management/create">Add New</a>
    <table class="table">
        <th>No.</th>
        <th>Name</th>
        <th>Review</th>
        <th>Product</th>
        <th>Author</th>
        <th>Language</th>
        <th>Publisher</th>
        <th>Discount</th>
        <th>Status</th>
        <th>Action</th>

        @foreach($lsProductDetail as $prd)
        <tr>
            <td>{{$prd->id}}</td>
            <td>{{$prd->name}}</td>
            <td>{{$prd->review}}</td>
            <td>{{$prd->product->name}}</td>
            <td>{{$prd->author->name}}</td>
            <td>{{$prd->language->name}}</td>
            <td>{{$prd->publisher->name}}</td>
            <td>{{$prd->discount->discount}}</td>
             <td>
                <span id="status_{{$prd->id}}">
                {{$prd->status == 1 ? 'Publish' : 'Draff'}}
                </span>
                <form method="POST" action="{{ route('proDetail_management.change', $prd->id) }}"
                      onsubmit="confirm('Sure ? ')">
                    @csrf
                    <input type="submit" value="Change" />
                </form>
            </td>
            <td>
                <a class="button" href="{{route('proDetail_management.edit',$prd->id)}}">Edit</a>
                <form method="POST" action="{{ route('proDetail_management.destroy', $prd->id) }}" onsubmit="confirm('Sure ?')">

                    @csrf
                    <input type="hidden" name="_method" value="DELETE"/>
                    <input type="submit" value="Delete" />
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    {{$lsProductDetail->links()}}
</div>

<script>
    function changeStatus(element) {
        var _id = $(element).attr("data-id");
        var _status = $(element).data('status');
        
        var data = {id: _id, status: _status, "_token" : "{{csrf_token()}}"};

        $.ajax({
                     type:'POST',
                     url:'proDetail_management/changeStatus',
                     data: data
                 }).done(function( msg ) {
                     if(msg.status == "OK") {
                         if(_status == 0) {
                             $("#status_" + _id).html("Pushlish");
                             $(element).data('status',1);
                         } else {
                             $("#status_" + _id).html("Draft");
                             $(element).data('status',0);
                         }
                     }
                   alert(msg.msg);
                 });
    }
</script>
@endsection


