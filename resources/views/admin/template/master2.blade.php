<!doctype html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="theme-color" content="#000000">
    <title>Rumah Baca</title>
    @include('user.template.css')
</head>

<body>

    <!-- loader -->
    <div id="loader">
        <img src="{{asset('public/FINAPP/assets/img/loading-icon.png')}}" alt="icon" class="loading-icon">
    </div>


    <!-- App Header -->
    <div class="appHeader">
        <!-- <div class="left">
            <a href="@yield('backlink',redirect()->getUrlGenerator()->previous())" class="headerButton goBack">
                <ion-icon name="chevron-back-outline"></ion-icon>
            </a>
        </div> -->
        <div class="pageTitle">@yield('titlepage')</div>

    </div>
    <!-- * App Header -->

    <!-- App Capsule -->
    <div id="appCapsule">

        <div id="toast-success" class="toast-box toast-top">
            <div class="in">
                <ion-icon name="checkmark-circle-outline" class="text-success"></ion-icon>
                <div class="text">
                </div>
            </div>
        </div>

        <div id="toast-failed" class="toast-box toast-top">
            <div class="in">
                <ion-icon name="close-circle" class="danger"></ion-icon>
                <div class="text">
                </div>
            </div>
        </div>


        @yield('content')

    </div>
    <!-- * App Capsule -->




    @include('user.template.js')

</body>

</html>