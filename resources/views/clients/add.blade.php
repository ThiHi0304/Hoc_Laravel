@extends('layouts.client')
@section('title')
    {{$title}}
@endsection

@section('content')
    <h1>Thêm sản phẩm</h1>
    <form action="" method="post">
        <input type="text" name="username">
        <!-- <input type="hidden" name="_token" value="{{csrf_token()}}"> -->
        <button type="submit">Submit</button>
        @csrf
        @mehtod('PUT')
    </form>
@endsection

@section('css')

@endsection

