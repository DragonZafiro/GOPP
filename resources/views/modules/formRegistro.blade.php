<div class="modal fade" id="myModal" tabindex="-1" role="dialog"
    aria-labelledby="myModal" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content bg-black">
            <div class="modal-body">
                <form class="form" method="put" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="files" value="true" id="files">
                    <input type="hidden" name="_method" value="PUT" id="_method">
                    <input type="hidden" name="id" id="id">
                    <div class="form-row ">
                        <div class="form-group col-md-6">
                            <label for="nombre"><span class="fas fa-user"></span> Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre">
                            <span class="help-block nombre-error text-danger"></span>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="last_name"><span class="fas fa-address-card"></span> Apellidos</label>
                            <input type="text" class="form-control" id="last_name" name="last_name">
                            <span class="help-block last_name-error text-danger"></span>
                        </div>
                    </div>
                    <div class="form-row ">
                        <div class="form-group col-md-6">
                            <label for="nick"><span class="fas fa-hashtag"></span> Nick (Apodo)</label>
                            <input type="text" class="form-control" id="nick" name="nick" placeholder="MiNick123">
                            <span class="help-block nick-error text-danger"></span>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="email"><span class="fas fa-envelope"></span> Email</label>
                            <input type="email" class="form-control" id="email" name="email">
                            <span class="help-block email-error text-danger"></span>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputPassword" id="inputPassword"><span class="fas fa-key"></span> Contraseña</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña">
                            <span class="help-block password-error text-danger"></span>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputConfirmPassword" id="confirmPassword"><span class="fas fa-key"></span> Repite tu contraseña</label>
                            <input type="password" class="form-control" id="confirmPassword" name="confirmPassword">
                            <span class="help-block confirmPassword-error text-danger"></span>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="custom-file"><span class="fas fa-image"></span> Foto</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="file" name="foto" lang="es">
                                <label class="custom-file-label" for="file">Seleccionar...</label>
                            </div>
                            <span class="help-block foto-error text-danger"></span>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputDate"><span class="fas fa-calendar-alt"></span> Fecha de nacimiento</label>
                            <input type="date" class="form-control" id="fecha_nac" name="fecha_nac" placeholder="dd/mm/aaaa">
                            <span class="help-block fecha_nac-error text-danger"></span>
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
                            <label for="inputAddress"><span class="fas fa-map-marker-alt"></span> Dirección</label>
                            <input type="text" class="form-control" id="direccion_calle" name="direccion_calle" placeholder="1234 Calle principal">
                            <span class="help-block direccion_calle-error text-danger"></span>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputAddress2"><span class="fas fa-map-marker-alt"></span> Número</label>
                            <input type="text" class="form-control" id="direccion_num" name="direccion_num" placeholder="Apartamento, piso, número.">
                            <span class="help-block direccion_num-error text-danger"></span>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputCity"><span class="fas fa-globe-americas"></span> Estado</label>
                            <input type="text" class="form-control" name="direccion_estado" id="direccion_estado">
                            <span class="help-block direccion_estado-error text-danger"></span>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputState"><span class="fas fa-globe-americas"></span> País</label>
                            <select name="pais" id="inputState" class="form-control">
                                <option selected>México</option>
                            </select>
                            <span class="help-block pais-error text-danger"></span>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="inputZip"><span class="fas fa-map-marker-alt"></span> C.P.</label>
                            <input type="text" class="form-control" name="direccion_cp" id="direccion_cp">
                            <span class="help-block direccion_cp-error text-danger"></span>
                        </div>
                    </div>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button id="submitButton" class="btn btn-primary"><span class="fas fa-sign-in-alt"></span></button>
                </form>
            </div>
        </div>
    </div>
</div>
