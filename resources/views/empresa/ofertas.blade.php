<!-- Plantilla -->
@extends('general')
<!-- Titulo -->
@section('titulo', 'Mis Ofertas y Promociones')
<!-- Estilos -->
@section('styles')
    <link rel="stylesheet" href="{{asset('dist/DataTables/css/jquery.dataTables.min.css')}}">
    <link rel="stylesheet" href="{{asset('dist/css/sweetalert2.min.css')}}">
@endsection
<!-- Contenido -->
@section('contenido-padding')
    @include('modules.formOfertas')
<h1 class="display-4 text-empresa">Mis Ofertas y Promociones</h1>
<h2>Estos son tus <span class="badge badge-primary">Ofertas</span> y <span class="badge badge-primary">Promociones</span>:</h2>
<table class="table table-striped table-bordered dt-responsive table-responsive-lg" id="products-table" style="width:100%">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Producto</th>
            <th scope="col">Precio</th>
            <th scope="col">Compra Mínima</th>
            <th scope="col">Título</th>
            <th scope="col">Descripción</th>
            <th scope="col">Día de Término</th>
            <th scope="col">Plantilla</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>
<a onclick="addForm()" class="btn btn-m btn-info btn-lg text-white pull-right">Agregar nueva oferta</a>
@endsection


@section('scripts')
    <script src="{{asset('dist/js/sweetalert2.min.js')}}"></script>
    <script src="{{asset('dist/DataTables/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('dist/js/ofertas.js')}}" type="text/javascript"></script>
@endsection
