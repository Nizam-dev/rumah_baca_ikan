@extends('user.template.master')
@section('content')


<div class="section mt-3 text-center">
    <div class="avatar-section">
        <a href="#">
            <img src="{{asset('public/FINAPP/assets/img/sample/avatar/avatar1.jpg')}}" alt="avatar"
                class="imaged w100 rounded">
            <span class="button">
                <ion-icon name="camera-outline"></ion-icon>
            </span>
        </a>
    </div>
</div>





<div class="listview-title mt-1">Profile Settings</div>
<ul class="listview image-listview text inset">
    <li>
        <a href="{{route('user.profile')}}" class="item">
            <div class="in">
                <div>Nama</div>
                <span class="text-primary">{{auth()->user()->name}}</span>
            </div>
        </a>
    </li>
    <li>
        <a href="{{route('user.profile')}}" class="item">
            <div class="in">
                <div>E-mail</div>
                <span class="text-primary">{{auth()->user()->email}}</span>
            </div>
        </a>
    </li>

    <!-- <li>
        <a href="#" class="item">
            <div class="in">
                <div>Address</div>
                <span class="text-primary"></span>
            </div>
        </a>
    </li> -->

    <li>
        <a href="{{route('user.kelas')}}" class="item">
            <div class="in">
                <div>Kelas</div>
                <span class="text-primary">{{auth()->user()->profile->kelas_->kelas}} {{auth()->user()->profile->jenjang_->jenjang}}</span>
            </div>
        </a>
    </li>
    
</ul>

<div class="listview-title mt-1">Security</div>
<ul class="listview image-listview text mb-2 inset">
    <li>
        <a href="#" class="item">
            <div class="in">
                <div>Update Password</div>
            </div>
        </a>
    </li>

    <li>
        <a href="{{route('logout')}}" class="item">
            <div class="in">
                <div>Log out</div>
            </div>
        </a>
    </li>
</ul>

@endsection