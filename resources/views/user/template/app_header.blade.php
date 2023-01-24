<div class="appHeader bg-primary text-light">
    <div class="left">
        <a href="#" class="headerButton" data-bs-toggle="modal" data-bs-target="#sidebarPanel">
            <!-- <ion-icon name="home"></ion-icon>  -->
            <img src="{{asset('public/rbi.png')}}" alt="image"
                                    class="image rounded" style="width:40px;height:40px;">
            Rumah Kreatif Nelayan
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
            <img  src="{{asset('public/images/profil/'.auth()->user()->foto)}}" alt="image" class="imaged w32" style="height:32px;">
            <span class="badge badge-danger"></span>
        </a>
    </div>
</div>