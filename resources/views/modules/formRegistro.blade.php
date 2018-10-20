<div style="position: absolute !important; top: -30px !important;" class="modal fade" id="form-registro" tabindex="-1" role="dialog"
    aria-labelledby="form-registro" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <form class="form" method="post" action="{{route('register')}}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="files" value="true" id="files">
                    <div class="form-row ">
                        <div class="form-group col-md-6">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="last_name">Apellidos</label>
                            <input type="text" class="form-control" id="last_name" name="last_name">
                        </div>
                    </div>
                    <div class="form-row ">
                        <div class="form-group col-md-6">
                            <label for="nick">Nick (Apodo)</label>
                            <input type="text" class="form-control" id="nick" name="nick" placeholder="MiNick123">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputPassword">Contraseña</label>
                            <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Contraseña">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputConfirmPassword">Repite tu contraseña</label>
                            <input type="password" class="form-control" id="inputPassword" name="confirmPassword">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="custom-file">Foto</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="file" name="foto" lang="es">
                                <label class="custom-file-label" for="file">Seleccionar...</label>
                                <span class="help-block file-error text-danger"></span>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputDate">Fecha de nacimiento</label>
                            <input type="date" class="form-control" id="inputDate" name="fecha_nac" placeholder="dd/mm/aaaa">
                        </div>
                        {{-- <div class="form-group col-md-6">
                            <label for="custom-file">Portada</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="file" name="portada" lang="es">
                                <label class="custom-file-label" for="file">Seleccionar...</label>
                                <span class="help-block file-error text-danger"></span>
                            </div>
                        </div> --}}
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputAddress">Dirección</label>
                            <input type="text" class="form-control" id="inputAddress" name="direccion_calle" placeholder="1234 Calle principal">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputAddress2">Número</label>
                            <input type="text" class="form-control" id="inputAddress2" name="direccion_num" placeholder="Apartamento, piso, número.">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputCity">Estado</label>
                            <input type="text" class="form-control" name="direccion_estado" id="inputCity">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputState">País</label>
                            <select name="pais" id="inputState" class="form-control">
                            <option selected>México</option>
                        </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="inputZip">C.P.</label>
                            <input type="text" class="form-control" name="direccion_cp" id="inputZip">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">
                        <i class="material-icons">how_to_reg</i> Registrarse
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
