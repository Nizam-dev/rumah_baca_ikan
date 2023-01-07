@extends('user.template.master')
@push('css')
<style>
    .stat-box {
        cursor: pointer;
    }
    #slide-split{
        cursor: pointer;
    }
</style>
@endpush
@section('content')

<!-- Wallet Card -->
<div class="section wallet-card-section pt-1 mb-5">
    <div class="wallet-card" style="padding:0;">
        <!-- Balance -->
        <!-- <img class="w-100 rounded-3" style="height:220px;"
            src="http://sastra-indonesia.com/wp-content/uploads/2020/03/Pelabuhan-Kampung-Ujung-Muncar-di-Senja-Hari-Foto-Aditya-Prayuga.jpg"
            alt=""> -->

        <!-- carousel full -->
        <div class="carousel-full splide rounded-3" id="slide-split" style="height:220px;">
            <div class="splide__track rounded-3">
                <ul class="splide__list">


                    

                    @foreach($sliders as $slider)
                    <li class="splide__slide rounded-3" data-splide-interval="500">
                        <img class="w-100 rounded-3" style="height:220px;"
                            src="{{asset('public/gambar-Slider/'.$slider->gambar)}}"
                            alt="">
                    </li>
                    @endforeach

                </ul>
            </div>
        </div>
        <!-- * carousel full -->


        <!-- * Wallet Footer -->
    </div>
</div>
<!-- Wallet Card -->




<!-- Stats -->
<div class="section">
    <div class="row mt-2">
        <div class="col-6">
            <a href="{{route('user.informasi')}}">
                <div class="stat-box">
                    <div class="value text-center">
                        <ion-icon name="megaphone-outline"></ion-icon>
                    </div>
                    <div class="title text-center">Info Terbaru</div>
                </div>
            </a>

        </div>

        <div class="col-6">
            <a href="{{route('user.konsultasi')}}">

                <div class="stat-box">
                    <div class="value text-center">
                        <ion-icon name="body-outline"></ion-icon>
                    </div>
                    <div class="title text-center">Konseling</div>
                </div>
            </a>
        </div>

    </div>

</div>
<!-- * Stats -->




<!-- News -->
<div class="section full mt-4 mb-3">
    <div class="section-heading padding">
        <h2 class="title">Lastest Materi</h2>
        <a href="" class="link">View All</a>
    </div>

    <!-- carousel multiple -->
    <div class="carousel-multiple splide">
        <div class="splide__track">
            <ul class="splide__list">

                @foreach($last_materi as $materi)
                <li class="splide__slide">
                    <a href="{{route('user.mapel_view',$materi->mapel_id)}}">
                        <div class="blog-card">
                            <img src="https://img.youtube.com/vi/{{str_replace('https://www.youtube.com/watch?v=','',$materi->link_youtube)}}/mqdefault.jpg"
                                alt="image" class="imaged w-100">
                            <div class="text">
                                <h4 class="title">{{$materi->judul}}
                                    <p class="my-0 text-secondary" style="font-size:10px;">Mapel {{$materi->mapel}}</p>
                                </h4>
                            </div>
                        </div>
                    </a>
                </li>
                @endforeach



            </ul>
        </div>
    </div>
    <!-- * carousel multiple -->

</div>
<!-- * News -->

@endsection
@push('js')

<script>

$(document).ready(()=>{
    // var splide = new Splide( '#slide-split' );

    // splide.on( 'autoplay:playing', function ( rate ) {
    // console.log( rate ); // 0-1
    // } );

    // splide.mount();

    new Splide( '#slide-split', {
      arrows :false ,
      type    : 'loop',
      perPage : 1,
      autoplay: true,
      cover: false,
    }).mount();

})

</script>

@endpush