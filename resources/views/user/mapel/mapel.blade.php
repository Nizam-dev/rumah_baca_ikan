@extends('user.template.master')
@section('content')

<div class="section tab-content mt-2 mb-2">

    <div class="section-heading">
        <h2 class="title">Mapel</h2>
    </div>

    <div class="row">

        @forelse($mapels as $mapel)
        <div class="col-6 mb-2">
            <a href="{{route('user.mapel_view',$mapel->id)}}">
                <div class="blog-card">
                    <img src="https://img.freepik.com/free-vector/hand-drawn-flat-design-stack-books-illustration_23-2149341898.jpg" alt="image"
                        class="imaged w-100">
                    <div class="text">
                        <h4 class="title">{{$mapel->mapel}}</h4>
                    </div>
                </div>
            </a>
        </div>
        @empty

        <p class="text-center mt-5">Tidak Ada Mapel</p>

        @endforelse

    </div>



</div>

@endsection