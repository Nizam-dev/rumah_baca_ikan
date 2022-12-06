@extends('admin.template.master')
@section('judul','Profil')

@section('content')

<div class="page-inner">


    <div class="row">
        <div class="col-md-12">
            <div class="card">

                <div class="card-body">
                    <ul class="nav nav-pills nav-secondary  nav-pills-no-bd nav-pills-icons justify-content-center" id="pills-tab-with-icon" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-home-tab-icon" data-toggle="pill" href="#pills-home-icon" role="tab" aria-controls="pills-home-icon" aria-selected="true">
                                <i class="fas fa-user-graduate"></i>
                                Profile Saya
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-profile-tab-icon" data-toggle="pill" href="#pills-profile-icon" role="tab" aria-controls="pills-profile-icon" aria-selected="false">
                                <i class="fas fa-key"></i>
                                Password
                            </a>
                        </li>

                    </ul>


                    <div class="tab-content mt-2 mb-3" id="pills-with-icon-tabContent">
                        <div class="tab-pane fade show active" id="pills-home-icon" role="tabpanel" aria-labelledby="pills-home-tab-icon">
                            <div class="col-md-12">                           
                                    <div class="card-body">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-12 mt-3">
                                                    <div class="widget-user-header text-white" style="">
                                                    </div>
                                                    <div class="widget-user-image">
                                                        <!-- <img class="img-circle rounded-circle" src="{{asset('public/profile/'.$users->foto_profil)}}" alt="User Avatar " style=" height:100px; width:100px;">
                                                        <i data-toggle="modal" data-target="#upfotoprofil" class="fa fa-edit text-primary" style="cursor:pointer;">Edit Foto</i> -->

                                                        <!-- Modal -->
                                                        <div class="modal fade" id="upfotoprofil" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">Ganti Foto</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">

                                                                        <div class="form-group upimagebio">
                                                                            <button type="button" class="btn btn-success btn-border btn-block" onclick="document.getElementById('uploadimagefileprofile').click()">
                                                                                <i class="flaticon-photo-camera" style="font-size: 50px;"></i>
                                                                            </button>
                                                                        </div>

                                                                        <img id="img-uploadprofile" src='' alt="" class="img-uploaprofile d-none w-100" onclick="document.getElementById('uploadimagefileprofile').click()">

                                                                        <form action="{{url('perbaruifoto')}}" method="post" id="potoprofil" enctype="multipart/form-data">
                                                                            @csrf

                                                                            <input type="file" onchange="readURLfoto(this);" class="d-none" name="image" accept="image/*" id="uploadimagefileprofile"></input>

                                                                        </form>


                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                        <button type="button" class="btn btn-primary" onclick="document.getElementById('potoprofil').submit()">Simpan</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="tab-pane active">

                                                        <!-- <form class="form-horizontal"> -->
                                                        <form action="" id="updateuser" method="post">

                                                            <div class="form-group">
                                                                <label for="inputName" class="col-sm-2 col-form-label">Nama</label>

                                                                <div class="col-sm-12">
                                                                    <input type="name" id="inputName" value="{{$users->name}}" class="form-control">
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="inputUsername" class="col-sm-2 col-form-label">Username</label>

                                                                <div class="col-sm-12">
                                                                    <input type="email" id="inputUsername" value="{{$users->username}}" class="form-control">
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>

                                                                <div class="col-sm-12">
                                                                    <input type="email" id="inputEmail" value="{{$users->email}}" class="form-control">
                                                                </div>
                                                            </div>



                                                            <div class="form-group">
                                                                <div class="offset-col-sm-2 col-sm-12">
                                                                    <button type="button" class="btn btn-primary" id="btn-upuser">Perbaharui Profil</button>
                                                                  
                                                                </div>
                                                            </div>
                                                        </form>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                    </div>
                             
                            </div>

                        </div>

                        <div class="tab-pane fade" id="pills-profile-icon" role="tabpanel" aria-labelledby="pills-profile-tab-icon">

                            <div class="col-md-12">
                                    <div class="card-body">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-12 mt-3">
                                                    <div class="tab-pane active">
                                                        <!-- <form class="form-horizontal"> -->
                                                        <form action="" id="updatepassword" method="post">

                                                            <div class="form-group">
                                                                <label for="inputName" class="col-sm-2 col-form-label">Password</label>

                                                                <div class="col-sm-12">
                                                                    <input type="password" id="inputPassword" value="" class="form-control">
                                                                </div>
                                                            </div>



                                                            <div class="form-group">
                                                                <div class="offset-col-sm-2 col-sm-12">
                                                                    <button type="button" class="btn btn-primary" id="btn-uppassword">Perbaharui Password</button>
                                                                    <!-- <button @click.prevent="updateInfo" type="submit" class="btn btn-primary">Update Profil</button> -->
                                                                </div>
                                                            </div>
                                                        </form>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="tab-pane active">
                                        </div>

                                    </div>
                               
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')
<script type="text/javascript">
    $(document).ready(function() {




    })

    @if(session()->has('message'))
      Swal.fire({
          icon: 'success',
          title: 'Berhasil',
          text: "{{session()->get('message')}}",
      })
      @endif

    $('#btn-upuser').click(() => {
        var name = $('#inputName')
        var email = $('#inputEmail')
        var username = $('#inputUsername')
        name.removeClass('is-invalid')
        email.removeClass('is-invalid')

        if (name.val() == "") {
            name.addClass('is-invalid')
        }
        if (username.val() == "") {
            username.addClass('is-invalid')
        }
        if (email.val() == "") {
            email.addClass('is-invalid')
        }
        if (name.val() != "" && email.val() != ""&& username.val() != "") {
            axios.post('{{url("admin-profil")}}', {
                    name: name.val(),
                    email: email.val(),
                    username: username.val()
                })
                .then((res) => {
                    Swal.fire({
                        title: "Berhasil!",
                        text: "Profil Berhasil di Perbaharui",
                        icon: "success",
                        buttons: {
                            confirm: {
                                text: "Tutup",
                                value: true,
                                visible: true,
                                className: "btn btn-success",
                                closeModal: true
                            }
                        }
                    });
                })
        }

    })

    $('#btn-uppassword').click(() => {
        var pass = $('#inputPassword')
        pass.removeClass('is-invalid')


        if (pass.val() == "") {
            pass.addClass('is-invalid')
        }

        if (pass.val() != "") {
            axios.post('{{url("admin-profil")}}', {
                    password: pass.val()
                })
                .then((res) => {
                    Swal.fire({
                        title: "Berhasil!",
                        text: "Password Berhasil di Perbaharui",
                        icon: "success",
                        buttons: {
                            confirm: {
                                text: "Tutup",
                                value: true,
                                visible: true,
                                className: "btn btn-success",
                                closeModal: true
                            }
                        }
                    });
                })
        }

    })


    function readURLfoto(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            $('.upimageprofile').removeClass('d-none').addClass('d-none').removeClass('d-block')
            $('#img-uploadprofile').removeClass('d-block').addClass('d-block').removeClass('d-none')

            reader.onload = function(e) {
                $('#img-uploadprofile')
                    .attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection