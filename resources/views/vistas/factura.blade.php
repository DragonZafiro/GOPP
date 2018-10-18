@extends('general')
@php
    $user = App\User::find(auth()->user()->id);
@endphp
<!-- Titulo -->
@section('titulo', 'Factura')
@section('bg-color','bg-white')
@section('contenido-padding')
				<div class="containier text-center">
					<h5 class="txtXXL text-usuario">Mi factura</h5>
					<p>
					Sabemos lo que necesitas, nadie se escapa de los impuestos verdad, 
					<br> danos tus datos y te enviaremos tu factura.
					</p>
				</div>
			<center>
			<form>
				<div class="form-row modal-content">
					<div class="modal-header">
						<div class="card-header card-header-primary text-center">
						<h4 class="card-title">Ingresa tus datos</h4>
						</div>
					</div>
				<table style="width:35%" border="0">
		 			<tr style="">
					  	<td><right><label for="basic-url" class="my-3 lead">RFC</label></right></td>
					  	<td><input type="text" class="form-control" id="" name="" placeholder="RFC" required> </td>
					</tr>
					<tr style="">
					    <td><label for="basic-url" class="my-3 lead">Nombre Completo</label></td>
					    <td><input type="text" class="form-control" id="" name="" placeholder="Nombres" required> </td>
					</tr>
					<tr style="">
					    <td><label for="basic-url" class="my-3 lead">Nombre Completo</label></td>
					    <td><input type="text" class="form-control" id="" name="" placeholder="Nombres" required> </td>
					</tr>
					<tr style="">
					    <td><label for="basic-url" class="my-3 lead">Apellidos</label></td>
					    <td><input type="text" class="form-control" id="" name="" placeholder="Apellidos" required> </td>
					</tr>
					<tr style="">
					    <td><label for="basic-url" class="my-3 lead">Región</label></td>
					    <td><input type="text" class="form-control" id="" name="" placeholder="Región o estado" required> </td>
					</tr>
					<tr style="">
					    <td><label for="basic-url" class="my-3 lead">Calle</label></td>
					    <td><input type="text" class="form-control" id="" name="" placeholder="Calle con numero exterior e interios" required> </td>
					</tr>
					<tr style="">
					    <td><label for="basic-url" class="my-3 lead">Código Postal</label></td>
					    <td><input type="text" class="form-control" id="" name="" placeholder="Código Postal" required> </td>
					</tr>
					<tr style="">
					    <td><label for="basic-url" class="my-3 lead">Correo electrónico</label></td>
					    <td><input type="text" class="form-control" id="" name="" placeholder="Correo electrónico" required> </td>
					</tr>
					
				</table>
				<button type="submit" class="btn btn-primary">Enviar</button>
			</div>
			</form>
			</center>

								
					

	@endsection