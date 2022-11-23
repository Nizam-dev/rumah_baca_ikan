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
		@import url(//fonts.googleapis.com/css?family=Lato:300:400);

		body {
			margin: 0;
		}

		h1 {
			font-family: 'Lato', sans-serif;
			font-weight: 2000;
			letter-spacing: 2px;
			font-size: 48px;
		}

		p {
			font-family: 'Lato', sans-serif;
			letter-spacing: 1px;
			font-size: 14px;
			color: #333333;
		}

		.header {
			position: relative;
			text-align: center;
			background: linear-gradient(60deg, rgba(84, 58, 183, 1) 0%, rgba(0, 172, 193, 1) 100%);
			color: white;
		}

		.logo {
			width: 50px;
			fill: white;
			padding-right: 15px;
			display: inline-block;
			vertical-align: middle;
		}

		.inner-header {
			height: 520px;
			width: 1280px;
			margin: 0;
			padding: 0;
		}

		.flex {
			/*Flexbox for containers*/
			display: flex;
			justify-content: center;
			align-items: center;
			text-align: center;
		}

		.waves {
			position: relative;
			width: 100%;
			height: 15vh;
			margin-bottom: -7px;
			/*Fix for safari gap*/
			/* min-height:100px;
  max-height:150px; */
		}

		.content {
			position: relative;
			height: 100%;
			text-align: center;
			background-color: white;
		}

		/* Animation */

		.parallax>use {
			animation: move-forever 25s cubic-bezier(.55, .5, .45, .5) infinite;
		}

		.parallax>use:nth-child(1) {
			animation-delay: -2s;
			animation-duration: 7s;
		}

		.parallax>use:nth-child(2) {
			animation-delay: -3s;
			animation-duration: 10s;
		}

		.parallax>use:nth-child(3) {
			animation-delay: -4s;
			animation-duration: 13s;
		}

		.parallax>use:nth-child(4) {
			animation-delay: -5s;
			animation-duration: 20s;
		}

		@keyframes move-forever {
			0% {
				transform: translate3d(-90px, 0, 0);
			}

			100% {
				transform: translate3d(85px, 0, 0);
			}
		}

		/*Shrinking for mobile*/
		@media (max-width: 1000px) {
			.waves {
				height: 40px;
				min-height: 40px;
			}

			.content {
				height: 300px;
			}

			h1 {
				font-size: 24px;
			}
		}
	</style>

</head>

<body class="hold-transition login-page">
	<!--Hey! This is the original version
of Simple CSS Waves-->

	<div class="header">

		<!--Content before waves-->
		<div class="inner-header flex">
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
		</div>

		<!--Waves Container-->
		<div>
			<svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
				<defs>
					<path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
				</defs>
				<g class="parallax">
					<use xlink:href="#gentle-wave" x="100%" y="0" fill="rgba(255,255,255,0.7" />
					<use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(255,255,255,0.5)" />
					<use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(255,255,255,0.3)" />
					<use xlink:href="#gentle-wave" x="48" y="7" fill="#fff" />
				</g>
			</svg>
		</div>
		<!--Waves end-->

	</div>
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