<!-- Plantilla -->
@extends('general')
@php $user = App\User::find(auth()->user()->id); @endphp
<!-- Titulo -->
@section('titulo', 'Mis Productos y Servicios')
<!-- Estilos -->
@section('styles')
    <link rel="stylesheet" href="{{asset('dist/DataTables/css/jquery.dataTables.min.css')}}">
    <link rel="stylesheet" href="{{asset('dist/css/sweetalert2.min.css')}}">
@endsection
<!-- Contenido -->
@section('contenido-padding')
@if ($errors->any())
<p>Hay errores!</p>
@endif
    @include('modules.formProductos')
    <h1 class="display-4 text-empresa">Mis Productos y Servicios</h1>
    <div style="color: #1eb6a7;font-weight: bold;font-size: 14px;" hidden id="error_msg2"></div>
    <h2>Estos son tus <span class="badge badge-primary">Productos</span> y <span class="badge badge-primary">Servicios</span>:</h2>
    <table class="table table-striped table-bordered dt-responsive table-responsive-lg" id="products-table" style="width:100%">
        <thead class="thead-dark">
            <tr>
                <th>Foto</th>
                <th>Nombre</th>
                <th scope="col">Código</th>
                <th scope="col">Tipo</th>
                <th scope="col">Descripción</th>
                <th scope="col">Precio</th>
                <th scope="col">Dines</th>
                <th scope="col">Almacén</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
    <a onclick="addForm()" class="btn btn-m btn-info btn-lg text-white pull-right">Agregar producto o servicio</a>
@endsection
@section('scripts')
    <script src="{{asset('dist/js/sweetalert2.min.js')}}"></script>
    <script src="{{asset('dist/DataTables/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('dist/js/products.js')}}" type="text/javascript"></script>
@endsection
