<!-- Usuario -->
@if($user->usuario || $user->admin)
<form method="POST" action="{{ url('/validar') }}">
    @csrf
    {{ method_field('PUT') }}
    <input type="hidden" name="modo" value="usuario">
    <div class='row my-4'><button type="submit" class='btn btn-block btn-lg btn-goppBtn btn-usuario'>Usuario</button></div>
</form>
@endif
<!-- Empresa -->
@if($user->empresa || $user->admin)
<form method="POST" action="{{ url('/validar') }}">
    @csrf
    {{ method_field('PUT') }}
    <input type="hidden" name="modo" value="empresa">
    <div class='row my-4'><button type="submit" class='btn btn-block btn-lg btn-goppBtn btn-empresa'>Empresa</button></div>
</form>
@endif
<!-- Afiliador -->
@if($user->afiliador || $user->admin)
<form method="POST" action="{{ url('/validar') }}">
    @csrf
    {{ method_field('PUT') }}
    <input type="hidden" name="modo" value="afiliador">
    <div class='row my-4'><button type="submit" class='btn btn-block btn-lg btn-goppBtn btn-afiliador'>Afiliador</button></div>
</form>
@endif
<!-- Repartidor -->
@if($user->repartidor || $user->admin)
<form method="POST" action="{{ url('/validar') }}">
    @csrf
    {{ method_field('PUT') }}
    <input type="hidden" name="modo" value="repartidor">
    <div class='row my-4'><button type="submit" class='btn btn-block btn-lg btn-goppBtn btn-repartidor'>Repartidor</button></div>
</form>
@endif
