<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<link rel="apple-touch-icon" sizes="76x76" href="{{asset('public/template-admin/dist/img/umroh.png')}}">
	<link rel="icon" type="image/png" href="{{asset('public/template-admin/dist/img/umroh.png')}}">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>

	<!-- Google Font: Source Sans Pro -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="{{asset('public/template-admin/plugins/fontawesome-free/css/all.min.css')}}">
	<!-- icheck bootstrap -->
	<link rel="stylesheet" href="{{asset('public/template-admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
	<!-- Theme style -->
	<link rel="stylesheet" href="{{asset('public/template-admin/dist/css/adminlte.min.css')}}">
	<link rel="stylesheet" href="{{asset('public/template-admin/plugins/toastr/toastr.min.css')}}">
	<style type="text/css">
		
		body {
        background-color: #b7dde1;
        -webkit-animation: color 12s ease-in 0s infinite alternate running;
        -moz-animation: color 12s linear 0s infinite alternate running;
        animation: color 12s linear 0s infinite alternate running;
    }

    @-webkit-keyframes color {
        0% {
            background-color: #b7dde1;
        }

        25% {
            background-color: #b7dde1;
        }

        50% {
            background-color: #b7dde1;
        }

        75% {
            background-color: #91aec4;
        }

        100% {
            background-color: #5f84a2;
        }
    }
    
	
	</style>

</head>

<body class="hold-transition login-page">
	<!--Hey! This is the original version
of Simple CSS Waves-->

	<div class="header">

		<!--Content before waves-->
		
			<!--Just the logo.. Don't mind this-->
			<div class="login-box">
				<!-- /.login-logo -->
				<div class="card card-outline">
					<div class="card-header text-center">
						<img src="{{asset('public/template-adminadmin/dist/.png')}}" width="100" height="auto">
					</div>
					<div class="card-body">
						<p class="login-box-msg" style="font-size: 20px;">Login</p>

						@if(session()->has('message'))

						<div class=" toastrDefaultSuccess" role="alert" id="notif">

						</div>
						@endif

						@if(session()->has('message_lupapassword'))

						<div class=" toastrDefaultSuccess2" role="alert" id="notif">

						</div>
						@endif

						@if(session()->has('error'))
						<div class="alert alert-danger" role="alert" id="notif">

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
						<form action="{{url('postlogin')}}" method="POST">
							@csrf
							<label class="mb-1" style="font-size: 16px;">Username</label>
							<div class="input-group mb-3">
								<input type="text" name="username" id="username" class="form-control" placeholder="Username">
								<div class="input-group-append">
									<div class="input-group-text">
										<span class="fas fa-envelope"></span>
									</div>
								</div>
							</div>
							<label class="mb-1" style="font-size: 16px;">Password</label>
							<div class="input-group mb-3">
								<input type="password" name="password" id="password" class="form-control" placeholder="Password">
								<div class="input-group-append">
									<div class="input-group-text">
										<span class="fas fa-lock"></span>
									</div>
								</div>
							</div>
							<div class="row">

								<!-- /.col -->
								<div class="col-12">
									<button type="submit" class="btn btn-primary btn-block">Login</button>
								</div>
								<!-- /.col -->
							</div>
						</form>
						<br>
						<p class="text-center">
							<a href="" class="text-center"> Lupa Password</a>
						</p>
						<p class="text-center">
							Belum punya akun ?<a href="" class="text-center"> Register</a>
						</p>
					</div>
					<!-- /.card-body -->
				</div>
				<!-- /.card -->
			</div>
			<!-- <h1>Simple CSS Waves</h1> -->


		<!--Waves Container-->
	
		</div>
		<!--Waves end-->


		<!--Header ends-->

		<!--Content starts-->
		<div class="content flex">
			<p></p>
		</div>
		<!--Content ends-->
		<script src="{{asset('public/template-admin/plugins/jquery/jquery.min.js')}}"></script>
		<!-- Bootstrap 4 -->
		<script src="{{asset('public/template-admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
		<!-- AdminLTE App -->
		<script src="{{asset('public/template-admin/dist/js/adminlte.min.js')}}"></script>
		<script src="{{asset('public/template-admin/plugins/toastr/toastr.min.js')}}"></script>
		<script>
			$(function() {


				//   toastr.success('Berhasil Mendaftar akun')

				$('.toastrDefaultSuccess').addClass(function() {

					toastr.success('Berhasil Mendaftar akun. Silahkan login')
				});

				$('.toastrDefaultSuccess2').addClass(function() {

					toastr.success('Berhasil Merubah Password. Silahkan login')
				});


			});
		</script>
</body>

</html>