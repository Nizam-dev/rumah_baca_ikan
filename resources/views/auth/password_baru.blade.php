<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('public/template-admin/dist/img/umroh.png')}}">
    <link rel="icon" type="image/png" href="{{asset('public/template-admin/dist/img/umroh.png')}}">
    <title>Password Baru</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('public/template-admin/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{asset('public/template-admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('public/template-admin/dist/css/adminlte.min.css')}}">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="card card-outline card-orange">
            <div class="card-header text-center">
                <img src="{{asset('public/template-admin/dist/img/umroh.png')}}" width="100" height="auto">
            </div>
            <div class="card-body">

                @if(session()->has('message'))

                <div class="toastrDefaultSuccess" role="alert" id="notif">
                    <!-- 
    <span data-notify="icon" class="fa fa-bell"></span>
    <span data-notify="title">Success</span> <br>
    <span data-notify="message">{{session()->get('message')}}</span> -->
                </div>
                @endif
                @if(session()->has('error'))
                <div class="alert alert-danger alert-dismissible fade show col-md-12" role="alert">

                    <span data-notify="icon" class="fa fa-bell"></span>
                    <span data-notify="title">Gagal</span> <br>
                    <span data-notify="message">{{session()->get('error')}}</span>
                </div>
                @endif

                @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show col-md-12" role="alert">
                    <strong>Gagal !</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif

                <p class="login-box-msg"> Buat Password baru
                </p>
                <form action="{{url('password_baru/'.$id)}}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="password" value="{{old('password')}}" id="password" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="ulang_password" id="ulang_password" placeholder="Ulang Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Ubah Password</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <br>
                <p class="text-center">
                    <a href="{{url('/login')}}">Login</a>
                </p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="{{asset('public/template-admin/plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{asset('public/template-admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- template-adminLTE App -->
    <script src="{{asset('public/template-admin/dist/js/adminlte.min.js')}}"></script>
    <script src="{{asset('public/template-admin/plugins/toastr/toastr.min.js')}}"></script>
        <script src="{{asset('public/js/swal.js')}}"></script>  
        <script type="text/javascript">
    $(document).ready(function() {

        @if(session()->has('message'))
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: "{{session()->get('message')}}",
        })
        @endif


    });

    $(function() {


//   toastr.success('Berhasil Mendaftar akun')

$('.toastrDefaultSuccess').addClass(function() {

    toastr.success('Berhasil Mendaftar Akun')
});


});


    </script>
</body>

</html>