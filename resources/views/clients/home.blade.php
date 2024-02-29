@extends('layouts.client')
@section('title')
    {{$title}}
@endsection

@section('sidebar')
    <h3>Home sidebar</h3>
@endsection

@section('content')
    <h1>Trang chủ</h1>
    @datetime('2021-12-12 11:00:00')
    @include('clients.contents.slide')
    @include('clients.contents.about')
@endsection

@section('css')

@endsection

