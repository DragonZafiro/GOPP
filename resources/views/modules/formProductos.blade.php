<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content  ">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="PUT" data-toggle="validator" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="files" value="true" id="files">
                <input type="hidden" name="_method" value="PUT" id="_method">
                <input type="hidden" name="id" id="id">
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="custom-file">Foto</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="file" name="file" lang="es">
                                <label class="custom-file-label" for="file">Seleccionar...</label>
                                <span class="help-block file-error text-danger"></span>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre">
                            <span class="help-block nombre-error text-danger"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripción</label>
                        <input type="text" class="form-control" name="descripcion" id="descripcion" placeholder="Descripción">
                        <span class="help-block descripcion-error text-danger"></span>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="marca">Marca</label>
                            <input type="text" class="form-control" name="marca" id="marca" placeholder="Marca">
                            <span class="help-block marca-error text-danger"></span>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="precio">Precio</label>
                            <input type="text" class="form-control" name="precio" id="precio" placeholder="Precio">
                            <span class="help-block precio-error text-danger"></span>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="codigo">Código</label>
                            <input type="text" class="form-control" name="codigo" id="codigo" placeholder="Código">
                            <span class="help-block codigo-error text-danger"></span>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="tipo">Tipo</label>
                            <select id="tipo" class="form-control" name="tipo">
                                <option selected value="Producto">Producto</option>
                                <option value="Servicio">Servicio</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="puntos">Dines</label>
                            <input type="text" class="form-control" name="puntos" id="puntos" placeholder="Puntos">
                            <span class="help-block puntos-error text-danger"></span>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="stock">Existencias</label>
                            <input type="text" class="form-control" name="stock" id="stock">
                            <span class="help-block stock-error text-danger"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="comentario">Comentarios</label>
                        <input type="text" class="form-control" name="comentario" id="comentario" placeholder="Comentarios">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button id="submitButton" class="btn btn-primary"></button>
                </div>
            </form>
        </div>
    </div>
</div>
