@extends('user.template.master2')
@section('backlink',route('user.beranda'))
@section('titlepage','Informasi Terbaru ')
@section('content')


<div class="row mt-3">

    @forelse($informasi as $info)
    <div class="col-6 mb-2">
        <a href="{{route('user.info_detail',$info->id)}}">
            <div class="blog-card">
                <img src="{{asset('public/gambar-informasi/'.$info->gambar)}}"
                    alt="image" class="imaged w-100">
                <div class="text">
                    <h4 class="title">{{$info->judul}}</h4>
                </div>
            </div>
        </a>
    </div>
    @empty

    <p class="text-center mt-5">Tidak Ada Informasi</p>

    @endforelse

</div>

@endsection