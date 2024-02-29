@extends('layouts.client')
@section('title')
    {{$title}}
@endsection

@section('sidebar')
    <h3>Home sidebar</h3>
@endsection

@section('content')
    <h1>Trang chủ</h1>
    @include('clients.contents.slide')
    @include('clients.contents.about')
@endsection

@section('css')

@endsection

