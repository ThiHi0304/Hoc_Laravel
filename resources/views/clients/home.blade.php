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
    <p><img src="https://vcdn-dulich.vnecdn.net/2020/09/04/1-Meo-chup-anh-dep-khi-di-bien-9310-1599219010.jpg" alt=""></p>
    {{-- <p><a href="{{route('download-image').'?image=https://vcdn-dulich.vnecdn.net/2020/09/04/1-Meo-chup-anh-dep-khi-di-bien-9310-1599219010.jpg'}}" class="btn btn-primary">Dowload ảnh</a></p> --}}

    <p><a href="{{route('download-image').'?image='.public_path('storage\avatar2.jpg')}}" class="btn btn-primary">Dowload ảnh</a></p>
    <p><a href="{{route('download-doc').'?file='.public_path('storage\avatar1.jpg')}}" class="btn btn-primary">Dowload tài liệu</a></p>

@endsection

@section('css')
        <style>
            img{
                width: 100%;
                height: auto;
            }
        </style>
@endsection

