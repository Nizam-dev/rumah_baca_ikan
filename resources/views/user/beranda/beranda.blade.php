@extends('user.template.master')
@push('css')
<style>
    .stat-box {
        cursor: pointer;
    }
</style>
@endpush
@section('content')

<!-- Wallet Card -->
<div class="section wallet-card-section pt-1">
    <div class="wallet-card" style="padding:0;">
        <!-- Balance -->
        <img class="w-100 rounded-3" style="height:220px;"
            src="http://sastra-indonesia.com/wp-content/uploads/2020/03/Pelabuhan-Kampung-Ujung-Muncar-di-Senja-Hari-Foto-Aditya-Prayuga.jpg"
            alt="">
        <!-- * Wallet Footer -->
    </div>
</div>
<!-- Wallet Card -->



<!-- Stats -->
<div class="section">
    <div class="row mt-2">
        <div class="col-6">
            <a href="">
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

                <li class="splide__slide">
                    <a href="app-blog-post.html">
                        <div class="blog-card">
                            <img src="{{asset('public/FINAPP/assets/img/sample/photo/1.jpg')}}" alt="image"
                                class="imaged w-100">
                            <div class="text">
                                <h4 class="title">What will be the value of bitcoin in the next...</h4>
                            </div>
                        </div>
                    </a>
                </li>

                <li class="splide__slide">
                    <a href="app-blog-post.html">
                        <div class="blog-card">
                            <img src="{{asset('public/FINAPP/assets/img/sample/photo/2.jpg')}}" alt="image"
                                class="imaged w-100">
                            <div class="text">
                                <h4 class="title">Rules you need to know in business</h4>
                            </div>
                        </div>
                    </a>
                </li>

                <li class="splide__slide">
                    <a href="app-blog-post.html">
                        <div class="blog-card">
                            <img src="{{asset('public/FINAPP/assets/img/sample/photo/3.jpg')}}" alt="image"
                                class="imaged w-100">
                            <div class="text">
                                <h4 class="title">10 easy ways to save your money</h4>
                            </div>
                        </div>
                    </a>
                </li>

                <li class="splide__slide">
                    <a href="app-blog-post.html">
                        <div class="blog-card">
                            <img src="{{asset('public/FINAPP/assets/img/sample/photo/4.jpg')}}" alt="image"
                                class="imaged w-100">
                            <div class="text">
                                <h4 class="title">Follow the financial agenda with...</h4>
                            </div>
                        </div>
                    </a>
                </li>

            </ul>
        </div>
    </div>
    <!-- * carousel multiple -->

</div>
<!-- * News -->

@endsection