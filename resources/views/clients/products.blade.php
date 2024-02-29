@extends('layouts.client');
@section('title')
    {{$title}}
@endsection

@section('sidebar')
    @parent 
<h3>Product sidebar</h3>
@endsection

@section('content')
<h1>Sản phẩm</h1>
@endsection

@section('css')
@endsection

{{-- @section('js')
<script>
     document.querySelector('.show').onclick= function(){
    alert('Thành công')
 }
</script>
 @endsection --}}