@extends('user.template.master')
@section('content')


<div class="section mt-3 text-center">
    <div class="avatar-section">
        <a href="#">
            <img src="{{asset('public/images/profil/'.auth()->user()->foto)}}" alt="avatar" class="imaged  rounded" style="width: 120px;height:120px;">
            <span class="button" data-bs-toggle="modal" data-bs-target="#ModalBasic">
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

    <li>
        <a href="{{route('user.profile')}}" class="item">
            <div class="in">
                <div>No Hp</div>
                <span class="text-primary">{{auth()->user()->no_hp}}</span>
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
                <span class="text-primary">{{auth()->user()->profile->kelas_->kelas}}
                    {{auth()->user()->profile->jenjang_->jenjang}}</span>
            </div>
        </a>
    </li>

    <li>
        <a href="{{route('user.profile')}}" class="item">
            <div class="in">
                <div>Alamat</div>
                <span class="text-primary">{{auth()->user()->alamat}}</span>
            </div>
        </a>
    </li>


</ul>

<div class="listview-title mt-1">Security</div>
<ul class="listview image-listview text mb-2 inset">
    <li>
        <a href="{{route('user.ganti_password')}}" class="item">
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




<!-- Modal Basic -->
<div class="modal fade modalbox" id="ModalBasic" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ganti Foto</h5>
                <a href="#" data-bs-dismiss="modal">Close</a>
            </div>
            <div class="modal-body">

                <form action="{{route('user.ganti_foto.update')}}" method="post" enctype='multipart/form-data'>
                    @csrf
                    <div class="card">
                        <div class="card-body">

                            <div class="form-group basic">
                                <div class="input-wrapper">
                                    <label class="label" for="no_hp">Masukan Foto Baru</label>
                                    <input type="file" class="form-control" name="foto" id="foto"
                                    accept="image/*"
                                         required>
                                    <i class="clear-input">
                                        <ion-icon name="close-circle"></ion-icon>
                                    </i>
                                </div>
                            </div>


                        </div>
                    </div>



                    <div class="form-button-group transparent">
                        <button type="submit" class="btn btn-primary btn-block btn-lg">Simpan</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>
<!-- * Modal Basic -->
@endsection