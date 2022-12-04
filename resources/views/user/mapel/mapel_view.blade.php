@extends('user.template.master2')
@section('backlink',route('user.mapel'))
@section('titlepage','Mapel '.$mapel->mapel)

@section('content')

<div class="section tab-content mt-2 mb-2">

    <div class="listview-title mt-1">Materi</div>

    <ul class="listview image-listview text inset">


        @forelse($materis as $materi)
        <li>
            <a href="{{route('user.materi',$materi->id)}}" class="item">
                <div class="in">
                    <div>Bab {{$materi->bab}}</div>
                    <span class="text-primary">{{$materi->judul}}</span>
                </div>
            </a>
        </li>
        @empty

        <p class="text-center mt-5">Tidak Ada Materi</p>

        @endforelse
    </ul>





</div>

<div class="section tab-content mt-2 mb-2">

    <div class="listview-title mt-1">Quiz</div>

</div>

@endsection