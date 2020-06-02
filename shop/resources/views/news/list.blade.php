@extends('layouts.backend')

@section('content')
<div class="container">
    <h1>News Management</h1>

    @if(session()->has('success'))
    <div class="flash-message">
        <p class="alert alert-success">{{Session::get('success')}}</p>
    </div>
    @endif

    <a href="news_management/create">Add New</a>
    <table class="table">
        <th>No.</th>
        <th>Title</th>
        <th>Summary</th>
        <th>Category</th>
        <th>Status</th>
        <th>Action</th>

        @foreach($allNews as $news)
        <tr>
            <td>{{$news->id}}</td>
            <td>{{$news->title}}</td>
            <td>{{$news->summary}}</td>
            <td>{{$news->category->name}}</td>
            <td>
                <span id="status_{{$news->id}}">
                {{$news->status == 1 ? 'Publish' : 'Draff'}}
                </span>
                <form method="POST" action="{{ route('news_management.change', $news->id) }}"
                      onsubmit="confirm('Sure ? ')">
                    @csrf
                    <input type="submit" value="Change" />
                </form>
            </td>
            <td>
                <a class="button" href="{{route('news_management.edit',$news->id)}}">Edit</a>
                <form method="POST" action="{{ route('news_management.destroy', $news->id) }}" onsubmit="confirm('Sure ?')">

                    @csrf
                    <input type="hidden" name="_method" value="DELETE"/>
                    <input type="submit" value="Delete" />
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    {{$allNews->links()}}
</div>
<script>
    function changeStatus(element) {
        var _id = $(element).attr("data-id");
        var _status = $(element).data('status');
        
        var data = {id: _id, status: _status, "_token" : "{{csrf_token()}}"};
        $.ajax({
                     type:'POST',
                     url:'news_management/changeStatus',
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


