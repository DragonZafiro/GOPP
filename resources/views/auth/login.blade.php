<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<title>
			Entra a Gopp
		</title>
		<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
		<!--     Fonts and icons     -->
		<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
		<!-- Font Awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU"
            crossorigin="anonymous">
        <!-- CSS Files -->
		<link href="{{ asset("dist/css/login.css")}}" rel="stylesheet" />
        <link rel="shortcut icon" href="{{ asset("dist/img/logo/GoppSimbolo.png") }}">
        <link rel="stylesheet" href="{{asset('dist/css/goppStyles.css')}}">
        <link rel="stylesheet" href="{{asset('dist/css/sweetalert2.min.css')}}">
	</head>
	<body class="login-page sidebar-collapse">
        @include('modules.formRegistro')
		<nav class="navbar navbar-transparent navbar-color-on-scroll fixed-top navbar-expand-lg" color-on-scroll="100" id="sectionsNav">
			<div class="container">
				<div class="collapse navbar-collapse">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item">
							<a class="nav-link" rel="tooltip" title="" data-placement="bottom" href="#" target="_blank" data-original-title="Síguenos en Twitter">
							<i class="fab fa-twitter-square" ></i>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" rel="tooltip" title="" data-placement="bottom" href="#" target="_blank" data-original-title="Síguenos en Facebook">
							<i class="fab fa-facebook-square" ></i>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" rel="tooltip" title="" data-placement="bottom" href="#" target="_blank" data-original-title="Síguenos en Instagram">
							<i class="fab fa-instagram" ></i>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<div class="page-header header-filter" style="background-image: url('{{ asset("dist/img/bg_login.jpg") }}'); background-size: cover; background-position: top center;">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 col-md-4 ml-auto mr-auto">
					<div class="card card-login">
                    <form class="form" method="post" action="{{ route('login') }}">
							<br>
							<br>
							<br>
							<div class="card-header card-header-primary text-center">
								<h4 class="card-title"><img src="{{ asset("dist/img/logo/GoppLogo1.png") }}" style="height: 40px; width: 150px;"></h4>
							</div>
							<div class="card-body">
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text">
										<i class="material-icons">mail</i>
                                        </span>
									</div>
                                    <input type="text" class="form-control is-invalid" placeholder="Usuario o correo electrónico" name="email" value="{{old('email')}}">
                                    <div class="invalid-feedback">
                                        {{ $errors->first('email') }}
                                    </div>
                                </div>
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text">
										<i class="material-icons">lock_outline</i>
										</span>
									</div>
                                    <input type="password" class="form-control is-invalid" placeholder="Contraseña" name="password">
                                    <div class="invalid-feedback">
                                        {{ $errors->first('password') }}
                                    </div>
								</div>
                            </div>

							<div class="text-center">
								<button type="submit" class="btn btn-primary">
                                <i class="material-icons">arrow_forward_ios</i> Entrar</button>
                            </div>
                            @csrf
                        </form>
                        <div class="text-center">
							<a href="#" onclick="addForm()" class="text-green">
							    ¿No tienes cuenta? Registrate aquí
                            </a>
                        </div>
					</div>
				</div>
            </div>
        </div>
		<footer class="footer">
			<div class="container">
				<nav class="float-left">
					<ul>
					</ul>
				</nav>
				<div class="copyright float-right">
					&copy;
					<script>
						document.write(new Date().getFullYear())
					</script> GOPP Derechos reservados, hecho por Anaconda SW.
				</div>
			</div>
		</footer>
		</div>
        <!--   Core JS Files   -->
		<script src="{{asset("dist/js/jquery.min.js")}}" type="text/javascript"></script>
		<script src="{{asset("dist/js/popper.min.js")}}" type="text/javascript"></script>
		<script src="{{asset("dist/js/bootstrap-material-design.min.js")}}" type="text/javascript"></script>
        <script src="{{asset("dist/js/moment.min.js")}}"></script>
        <script src="{{asset('dist/js/sweetalert2.min.js')}}"></script>
        <script src="{{asset("dist/js/users.js ")}}"></script>
		<!--  Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
		<script src="{{asset("dist/js/bootstrap-datetimepicker.js")}}" type="text/javascript"></script>
		<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
		<script src="{{asset("dist/js/nouislider.min.js")}}" type="text/javascript"></script>
		<!--  Plugin for Sharrre btn -->
		<script src="{{asset("dist/js/jquery.sharrre.js")}}" type="text/javascript"></script>
		<!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
		<script src="{{asset("dist/js/material-kit.js?v=2.0.4")}}" type="text/javascript"></script>
	</body>
</html>
