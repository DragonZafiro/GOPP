@extends('general')
<!-- Titulo -->
@section('titulo', 'Lanzar Boletín')
<!-- Contenido -->
@section('contenido-padding')
<div class="container text-center">
    <h5 class="txtXXL text-usuario">Lanzar Boletín</h5>
        <br><h4> Por la cantidad de $50 M.N lanza un boletin,
        <br>para que tu oferta, producto, lo que quieras,
        <br>tenga una exposición mas alta.
        <br> ¡Es genial!</h4>
        <br><br>
        <h4>Selecciona una opción</h4>
        <br>
        <div class="row">
            <div class="col-sm">
                <a href="#" class="btn btn-goppBtn btn-empresa btn-lg">Ver Plantillas</a>
            </div>
            <div class="col-sm">
                <a href="{{url('boletines')}}" class="btn btn-goppBtn btn-empresa btn-lg">Mis Boletines</a>
            </div>
            <div class="col-sm">
                <a href="{{url('ofertas')}}" class="btn btn-goppBtn btn-empresa btn-lg">Mis Ofertas</a>
            </div>
            <div class="col-sm">
                <a href="{{url('productos')}}" class="btn btn-goppBtn btn-empresa btn-lg">Productos</a>
            </div>
        </div>
</div>

@endsection
