@extends('general')
<!-- Titulo -->
@section('titulo', 'Comparte y Gana')
@section('bg-color','bg-white')
<!-- Contenido -->
@section('contenido-padding')
	<div class="conteiner text-center">
		<h5 class="txtXXL text-usuario">Comparte y Gana!</h5>
		<br> <h3>Comparte con tus amigo en redes sociales
		 <br> y gana 300 GOPPIS, para servirte.</h3>
		 <script src="//platform-api.sharethis.com/js/sharethis.js#property=5bc0f4140c55ed0011c01d84&product=inline-share-buttons"></script>
		 <br><div class="sharethis-inline-share-buttons"></div>
	</div>
@endsection
