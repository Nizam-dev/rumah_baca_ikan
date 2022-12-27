@extends('user.template.master2')
@section('backlink',route('user.informasi'))
@section('titlepage','Informasi Terbaru')
@push('js')
<style>
    body {
        --bs-bg-opacity: 1;
        background-color: rgba(var(--bs-white-rgb), var(--bs-bg-opacity)) !important;
    }
</style>
@endpush
@section('content')


<div class="section mt-3">
    <h1 class="">
        {{$info->judul}}
    </h1>

    <div class="blog-header-info mt-2 mb-2">
        <div>
            <img src="{{asset('public/FINAPP/assets/img/sample/avatar/avatar1.jpg')}}" alt="img"
                class="imaged w24 rounded me-05">
            by <a href="#">Admin</a>
        </div>
        <div>
            {{$info->created_at->format('d, M Y')}}
        </div>
    </div>


    <div class="lead">

        <figure class="mx-auto">
            <img src="{{asset('public/gambar-informasi/'.$info->gambar)}}" alt="image" class="imaged img-fluid">
        </figure>


        {!! $info->deskripsi !!}
    </div>
</div>

@endsection