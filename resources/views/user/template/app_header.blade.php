<div class="appHeader bg-primary text-light">
    <div class="left">
        <a href="#" class="headerButton" data-bs-toggle="modal" data-bs-target="#sidebarPanel">
            <ion-icon name="home"></ion-icon> Rumah Baca
        </a>
    </div>
    <!-- <div class="pageTitle">
        <img src="assets/img/logo.png" alt="logo" class="logo">
    </div> -->
    <div class="right">
        <!-- <a href="app-notifications.html" class="headerButton">
            <ion-icon class="icon" name="notifications-outline"></ion-icon>
            <span class="badge badge-danger">4</span>
        </a> -->
        <a href="{{route('user.akun')}}" class="headerButton">
            <img src="{{asset('public/images/profil/defaultfoto.png')}}" alt="image" class="imaged w32">
            <span class="badge badge-danger"></span>
        </a>
    </div>
</div>