@extends('layouts.backend')
@section('content')
    @php
    if (Auth::check() && Auth::user()->level != 'admin'){
    $mesage = 'Chỉ có Admin Mới truy cập được vào chức năng này';
}else {
    $mesage = 'Bạn chưa đăng nhập ';
}
    @endphp
<Div>
@php
echo "<h1>$mesage </h1>";
@endphp
</Div>
@endsection
