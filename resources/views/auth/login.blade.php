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
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
		<!-- CSS Files -->
		<link href="{{ asset("dist/css/login.css")}}" rel="stylesheet" />
		<link rel="shortcut icon" href="{{ asset("dist/img/logo/GoppSimbolo.png") }}">
	</head>
	<body class="login-page sidebar-collapse">
		<nav class="navbar navbar-transparent navbar-color-on-scroll fixed-top navbar-expand-lg" color-on-scroll="100" id="sectionsNav">
			<div class="container">
				<div class="collapse navbar-collapse">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item">
							<a class="nav-link" rel="tooltip" title="" data-placement="bottom" href="#" target="_blank" data-original-title="Síguenos en Twitter">
							<i class="fa fa-twitter"></i>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" rel="tooltip" title="" data-placement="bottom" href="#" target="_blank" data-original-title="Síguenos en Facebook">
							<i class="fa fa-facebook-square"></i>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" rel="tooltip" title="" data-placement="bottom" href="#" target="_blank" data-original-title="Síguenos en Instagram">
							<i class="fa fa-instagram"></i>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<div class="page-header header-filter" style="background-image: url('{{ asset("dist/img/bg_login.jpg") }}'); background-size: cover; background-position: top center;">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 col-md-6 ml-auto mr-auto">
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
                                    <input type="text" class="form-control" placeholder="Correo" name="email">

                                </div>
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text">
										<i class="material-icons">lock_outline</i>
										</span>
									</div>
									<input type="password" class="form-control" placeholder="Contraseña" name="password">
								</div>
							</div>
							<div class="text-center">
								<br>
								<button type="submit" class="btn btn-primary">
                                <i class="material-icons">arrow_forward_ios</i> Entrar</button>
                            </div>
                            @csrf
                        </form>
						<div class="text-center">
							<button class="btn btn-primary" data-toggle="modal" data-target="#miRegistroModal" style="margin-top: -100px; ">
							<i class="material-icons">how_to_reg</i> Registro
							</button>
                        </div>
                        <div class="text-center">
                            @foreach ($errors->all() as $error)
                            <p class="text-danger">{{ $error }}</p>
                            @endforeach
                        </div>
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade" id="miRegistroModal" tabindex="-1" role="dialog">
			<div class="modal-dialog modal-login" role="document">
				<div class="modal-content">
					<div class="card card-signup card-plain">
						<div class="modal-header">
							<div class="card-header card-header-primary text-center">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
								<h4 class="card-title">Registro</h4>
							</div>
						</div>
						<div class="modal-body">
							<form class="form" method="POST" action="phpClasses/registro.php" enctype="multipart/form-data">
								<div class="card-body">
                                    <div class="justify-content-center">
                                        <div class="btn btn-primary btn-round">
                                            <label class="material-icons">
                                            attach_file
                                            <input type="file" name="imagen" size="20" style="opacity: 0; width: 0px; height: 100%;" required>
                                            </label>
                                            Agregar foto.
                                        </div>
                                    </div>
									<div class="form-group">
										<label>Tipo de usuario</label>
										<select class="form-control selectpicker" data-style="btn btn-link" name="tipoUsuario">
											<option>Usuario</option>
											<option>Praemie</option>
											<option>Afiliador</option>
											<option>Repartidor</option>
											<option>Empresa</option>
										</select>
									</div>
									<div class="form-group bmd-form-group">
										<div class="input-group">
											<span class="input-group-addon">
											<i class="material-icons">face</i>
											</span>
											<input type="text" class="form-control" placeholder=" Nombre" name="nombre" required >
										</div>
									</div>
									<div class="form-group bmd-form-group">
										<div class="input-group">
											<span class="input-group-addon">
											<i class="material-icons">font_download</i>
											</span>
											<input type="text" class="form-control" placeholder=" Apellido" name="apellido" required>
										</div>
									</div>
									<div class="form-group bmd-form-group">
										<div class="input-group">
											<span class="input-group-addon">
											<i class="material-icons">date_range</i>
											</span>
											<input type="text" class="form-control" placeholder=" 1990-12-20" name="fecha" required>
										</div>
									</div>
									<div class="form-group bmd-form-group">
										<label id="resultado"></label>
										<div class="input-group">
											<span class="input-group-addon">
											<i class="material-icons">tag_faces</i>
											</span>
											<input type="text" class="form-control" placeholder=" Apodo" name="apodo" required id="search">
										</div>
									</div>
									<div class="form-group bmd-form-group">
										<div class="input-group">
											<span class="input-group-addon">
											<i class="material-icons">contact_mail</i>
											</span>
											<input type="email" class="form-control" placeholder=" Correo" name="correo" required>
										</div>
									</div>
									<div class="form-group bmd-form-group">
										<div class="input-group">
											<span class="input-group-addon">
											<i class="material-icons">lock</i>
											</span>
											<input type="password" class="form-control" placeholder=" Contraseña" name="contrasenia" required>
										</div>
									</div>
									<div class="form-group bmd-form-group">
										<div class="input-group">
											<span class="input-group-addon">
											<i class="material-icons">contact_phone</i>
											</span>
											<input type="text" class="form-control" placeholder=" Número" name="numero" required>
										</div>
									</div>
									<div class="form-group bmd-form-group">
										<div class="input-group">
											<span class="input-group-addon">
											<i class="material-icons">store_mall_directory</i>
											</span>
											<input type="text" class="form-control" placeholder=" Calle" name="calle" required>
										</div>
									</div>
									<div class="form-group bmd-form-group">
										<div class="input-group">
											<span class="input-group-addon">
											<i class="material-icons">location_city</i>
											</span>
											<input type="text" class="form-control" placeholder=" Colonia" name="colonia" required>
										</div>
									</div>
									<div class="form-group bmd-form-group">
										<div class="input-group">
											<span class="input-group-addon">
											<i class="material-icons">account_balance</i>
											</span>
											<input type="text" class="form-control" placeholder=" Delegación" name="delegacion" required>
										</div>
									</div>
									<div class="form-group bmd-form-group">
										<div class="input-group">
											<span class="input-group-addon">
											<i class="material-icons">room</i>
											</span>
											<input type="text" class="form-control" placeholder=" Código Postal" name="cp" required>
										</div>
									</div>
									<div class="form-group bmd-form-group">
										<div class="input-group">
											<span class="input-group-addon">
											<i class="material-icons">place</i>
											</span>
											<input type="text" class="form-control" placeholder=" Estado" name="estado" required>
										</div>
									</div>
									<div class="form-group bmd-form-group">
										<div class="input-group">
											<span class="input-group-addon">
											<i class="material-icons">map</i>
											</span>
											<input type="text" class="form-control" placeholder=" País" name="pais" required>
										</div>
									</div>
								</div>
								<div class="modal-footer justify-content-center">
									<button type="submit" class="btn btn-primary">Registro</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade" id="repetido" tabindex="-1" role="dialog">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Modal title</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<i class="material-icons">clear</i>
						</button>
					</div>
					<div class="modal-body">
						<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth. Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.
						</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-link">Nice Button</button>
						<button type="button" class="btn btn-danger btn-link" data-dismiss="modal">Close</button>
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
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script type="text/javascript" src="js/index.js"></script>
		<script src="{{asset("dist/js/jquery.min.js")}}" type="text/javascript"></script>
		<script src="{{asset("dist/js/popper.min.js")}}" type="text/javascript"></script>
		<script src="{{asset("dist/js/bootstrap-material-design.min.js")}}" type="text/javascript"></script>
		<script src="{{asset("dist/js/moment.min.js")}}"></script>
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
