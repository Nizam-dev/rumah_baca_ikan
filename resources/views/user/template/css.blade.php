<meta name="description" content="Finapp HTML Mobile Template">
<meta name="keywords"
    content="bootstrap, wallet, banking, fintech mobile template, cordova, phonegap, mobile, html, responsive" />
<link rel="icon" type="image/png" href="assets/img/favicon.png" sizes="32x32">
<link rel="apple-touch-icon" sizes="180x180" href="assets/img/icon/192x192.png">
<link rel="stylesheet" href="{{asset('public/FINAPP/assets/css/style.css')}}">
<link rel="manifest" href="{{asset('public/FINAPP/__manifest.json')}}">

<style>
    .form-group.basic .form-control.is-ivalid{
        border-bottom : 1px solid #dc3545 !important;
    }

    .bg-primary{
        background : #0080FE !important;
    }
    #loader{
        background : #0080FE !important;
    }
    .wallet-card-section:before{
        background : #0080FE !important;

    }

    .appBottomMenu .item.active ion-icon, .appBottomMenu .item.active strong{
        color : #0080FE !important;

    }
    .appBottomMenu .item.active:before{
        background : #0080FE !important;

    }

    .appHeader.text-light .headerButton {
        color: #fff200;
        font-weight: bold;
    }
    .text-birulaut{
        color: #0080FE !important;
    }
</style>

@stack('css')