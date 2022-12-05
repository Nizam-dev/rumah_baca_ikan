@extends('user.template.master2')
@section('backlink',route('user.mapel'))
@section('titlepage','Mapel '.$mapel->mapel)

@section('content')

<div class="section tab-content mt-2 mb-2">

    <div class="listview-title mt-1">Materi</div>

    <ul class="listview image-listview text inset">

        @php($materi_kurang = 0)
        @forelse($materis as $no=>$materi)

        @if(!$materi->history->isEmpty())
        <li>
            <a href="{{route('user.materi',$materi->id)}}" class="item">
                <div class="in">
                    <div>Bab {{$materi->bab}}</div>
                    <span class="text-primary">{{$materi->judul}}</span>
                </div>
            </a>
        </li>
        @else
        <li class="bg-danger">
            <a href="#" class="item">
                <div class="in text-white">
                    <div>Bab {{$materi->bab}}</div>
                    <span class="text-white">{{$materi->judul}}</span>
                </div>
            </a>
        </li>
        @php($materi_kurang++)
        @endif

        @empty

        <p class="text-center mt-5">Tidak Ada Materi</p>

        @endforelse
    </ul>





</div>

<div class="section tab-content mt-2 mb-2">

    <div class="listview-title mt-1">Quiz</div>

    @if($materi_kurang != 0)
    <div class="listview-title mt-1">
        <h6 class="text-danger">Harap Selesaikan Materi Untuk Mengerjakan Quiz</h6>
    </div>
    @endif

    <ul class="listview image-listview text inset">
        @if(!$pertanyaans->isEmpty())
            @if($materi_kurang != 0)
            <li class="bg-danger">
                <a href="#" class="item">
                    <div class="in text-white">
                        <div>Quiz</div>
                        <span class="text-white"></span>
                    </div>
                </a>
            </li>
            @else
            @endif
        @else
        <p class="text-center mt-5">Tidak Ada Quiz</p>
        @endif
    </ul>



</div>

@endsection