@extends('general')
@php
    $user = App\User::find(auth()->user()->id);
    $promos = App\Business::all();
@endphp
<!-- Titulo -->
@section('titulo', 'Lo que quieras')
@section('bg-color','bg-white')
<!-- Contenido -->
@section('contenido-padding')
					<div class="container p-2">
						<h5 class="txtXXL text-usuario">Lo que quieras</h5>
					</div>
					<div class="containier p-3">
						<div class="row">
							<div class="col-4">
								<p>
									Acá nos puedes ordenar lo que quieras ¡literal!, 
									efectivo, que vayamos por lo que olvidaste, ropa, 
									que veamos si esta abierto un lugar, etc, ¡lo que se te ocurra! SERVIDO
								</p>
								<form>
									<div class="form-row">
										<div class="col">
										<input type="text" class="form-control" placeholder="Ingresa direccion">
										</div>
										<div class="col">
										<input type="text" class="form-control" placeholder="Ingresa direccion">
										</div>
									</div>
									<label for="basic-url" class="my-3 lead">Tarifa base: $35 (2km / 30 minutos)</label>
									<label for="basic-url" class="my-3">Especifica tus instrucciones</label>
									<textarea type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" rows="5" 
									placeholder="Ej: Olvide mis llaves en casa, mi dirección es Granados #10, alguien saldra a dartelas cuando toques la puerta, traelas a mi ubicación, Laureles #88."></textarea>
									<div class="btn btn-goppBtn btn-usuario btn-block my-3" data-toggle="modal" data-target="#modalHecho">Continuar</div>
								</form>
							</div>
							<div class="col-8">
								<div class="container">
										<iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d1720.8779657828209!2d-98.9969469985489!3d19.387289613821427!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses!2smx!4v1536465420412" width="620" height="550" frameborder="0" style="border:0" allowfullscreen></iframe>
								</div>
							</div>
						</div>
					</div>	
@endsection