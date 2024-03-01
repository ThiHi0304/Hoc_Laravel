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
    @env('production')
        <p>Môi trường production</p>
    @elseenv('test')
    <p>Môi trường test</p>
    @else
    <p>Môi trường dev</p>
    @endenv
    <x-alert type="info" :content="$message" data-icon="youtube" />
    {{-- <x-inputs.button />

    <x-forms.button /> --}}
@endsection

@section('css')

@endsection

