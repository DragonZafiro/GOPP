@extends('general')
@php
    $user = App\User::find(auth()->user()->id);
@endphp
<!-- Titulo -->
@section('titulo', 'Favor')
@section('bg-color','bg-white')
@section('contenido-padding')
<h5 class="txtXXL text-usuario">Pide un Favor!</h5>
<div class="containier p-3">
						<div class="row">
							<div class="col-4">
								
								<form>
									<div class="form-row">
										<div class="col">
											<input type="text" class="form-control" placeholder="Ingresa direccion">
										</div>
										<div class="col">
											<input type="text" class="form-control" placeholder="Ingresa destino">
										</div>
									</div>
									<br> <br>
									<textarea type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" rows="5" 
									placeholder="Ej: Olvide mis llaves en casa, mi dirección es Granados #10, alguien saldra a dartelas cuando toques la puerta, traelas a mi ubicación, Laureles #88."></textarea>
									<div class="btn btn-goppBtn btn-usuario btn-block my-3" data-toggle="modal" data-target="#modalHecho">Continuar</div>
								</form>
							</div>
@endsection