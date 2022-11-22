@extends('user.template.master')

@push('css')
<link rel="stylesheet" href="https://npmcdn.com/flickity@2/dist/flickity.css">
<script src="https://npmcdn.com/flickity@2/dist/flickity.pkgd.js"></script>
<style>
    .beranda_card img {
        width: 100%;
        height: 180px;
    }

    .list_beranda .col-3 {
        cursor: pointer;
        color: #34495e;
    }

    .list_beranda .col-3 p {
        font-size: 12px;
    }

    .list_beranda .col-3:hover {
        background-color: #27ae60;
        color: white;
        border-radius:10px;
    }




    .carousel-cell {
        width: 70%;
        height: 250px;
        margin-right: 10px;
        /* background: #8C8; */
        border-radius: 5px;
        counter-increment: gallery-cell;
        margin-left: auto;
    }

    .carousel-cell h6 {
        margin-top: 5px;
        margin-bottom: 0px;
        font-size: 14px;
        font-weight: bold;
    }

    .carousel-cell p {
        margin-top: 0px;
        font-size: 11px;
        color: #e74c3c;
    }




    .flickity-page-dots {
        display: none;
    }

    .flickity-button {
        display: none;
    }
</style>
@endpush

@section('content')

<div class="card rouded-3 beranda_card">
    <img src="https://1.bp.blogspot.com/-brh3TCua9PM/WWzudMczgSI/AAAAAAAAAdg/pi2SiVZm9QU3-49juP0wErBpcQNoX_rTQCEwYBhgL/s1600/IMG_20170716_162101_HDR.jpg"
        alt="" srcset="">
</div>

<div class="row mt-3 mb-2 list_beranda">
    <div class="col-3 text-center">
        <i class='bx bxs-graduation fs-1'></i>
        <p>Learning</p>
    </div>
    <div class="col-3 text-center">
        <i class='bx bx-book-open fs-1'></i>
        <p>Materi</p>
    </div>
    <div class="col-3 text-center">
        <i class='bx bxs-megaphone fs-1'></i>
        <p>Info Terbaru</p>
    </div>
    <div class="col-3 text-center">
        <i class='bx bxs-user-voice fs-1'></i>
        <p>Konseling</p>
    </div>
</div>

<!-- Flickity HTML init -->
<div class="carousel" data-flickity='{ "freeScroll": true ,  "cellAlign": "left"}'>
    <div class="carousel-cell">
        <img class="w-100 rounded-3"
            src="https://1.bp.blogspot.com/-brh3TCua9PM/WWzudMczgSI/AAAAAAAAAdg/pi2SiVZm9QU3-49juP0wErBpcQNoX_rTQCEwYBhgL/s1600/IMG_20170716_162101_HDR.jpg"
            alt="" srcset="">
        <h6>Perkenalan Kelas 1</h6>
        <p>Oleh : ASU</p>
    </div>

    <div class="carousel-cell">
        <img class="w-100 rounded-3"
            src="https://1.bp.blogspot.com/-brh3TCua9PM/WWzudMczgSI/AAAAAAAAAdg/pi2SiVZm9QU3-49juP0wErBpcQNoX_rTQCEwYBhgL/s1600/IMG_20170716_162101_HDR.jpg"
            alt="" srcset="">
        <h6>Perkenalan Kelas 1</h6>
        <p>Oleh : ASU</p>
    </div>

    <div class="carousel-cell">
        <img class="w-100 rounded-3"
            src="https://1.bp.blogspot.com/-brh3TCua9PM/WWzudMczgSI/AAAAAAAAAdg/pi2SiVZm9QU3-49juP0wErBpcQNoX_rTQCEwYBhgL/s1600/IMG_20170716_162101_HDR.jpg"
            alt="" srcset="">
        <h6>Perkenalan Kelas 1</h6>
        <p>Oleh : ASU</p>
    </div>
</div>


@endsection