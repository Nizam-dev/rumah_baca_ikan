@extends('user.template.master2')
@section('backlink',route('user.rbgame'))
@section('titlepage','Point Anda')
@push('css')
<style>
    .card-header ion-icon{
        font-size : 50px;
        color : #FFD700;
    }
    .card-header h3{
        color : #FFD700;
    }
</style>
@endpush
@section('content')

<div class="listview-title mt-1">Selamat Anda Telah Menyelesaikan Game</div>

<div class="section mt-2">
    <div class="card">
        <div class="card-header">
            <div class="text-center d-block mx-auto">
                <ion-icon name="medal-outline"></ion-icon>
                <h3>SKOR {{$poin['skor']}} POIN</h3>
            </div>
        </div>
        <div class="card-body">
            <h4 class="text-success">
                Benar <ion-icon name="checkmark-circle"></ion-icon> {{$poin['benar']}}
            </h4>

            <h4 class="text-danger">
                Salah <ion-icon name="close-circle"></ion-icon> {{$poin['salah']}}
            </h4>
            
        </div>
        <div class="card-footer">
            <a href="{{route('user.rbgame')}}" class="btn mx-auto d-block btn-secondary">Kembali</a>
        </div>
    </div>
</div>


@endsection

@push('js')


@endpush