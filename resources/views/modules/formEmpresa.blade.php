<div class="modal fade" id="modalEmpresa" tabindex="-1" role="dialog"
    aria-labelledby="modal-empresa" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content bg-black">
            <div class="modal-body">
                <form class="form" method="put" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="files" value="true">
                    <input type="hidden" name="_method" value="PUT" id="metodo">
                    <input type="hidden" name="business_id" id="business_id">
                    <div class="form-row ">
                        <div class="form-group col-md-6">
                            <label for="nombre_empresa"><span class="fas fa-building"></span> Nombre</label>
                            <input type="text" class="form-control" id="nombre_empresa" name="nombre_empresa">
                            <span class="help-block nombre_empresa-error text-danger"></span>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="direccion"><span class="fas fa-address-card"></span> Dirección</label>
                            <input type="text" class="form-control" id="direccion" name="direccion">
                            <span class="help-block direccion-error text-danger"></span>
                        </div>
                    </div>
                    <div class="form-row ">
                        <div class="form-group col-md-6">
                            <label for="telefono"><span class="fas fa-phone-square"></span> Teléfono</label>
                            <input type="text" class="form-control" id="telefono" name="telefono">
                            <span class="help-block telefono-error text-danger"></span>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="email_empresa"><span class="fas fa-envelope"></span> Email</label>
                            <input type="email" class="form-control" id="email_empresa" name="email_empresa">
                            <span class="help-block email-error text-danger"></span>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="web"><span class="fab fa-chrome"></span> Web</label>
                            <input type="text" class="form-control" id="web_empresa" name="web" placeholder="Página web">
                            <span class="help-block web-error text-danger"></span>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="categoria"><span class="fas fa-thumbtack"></span> Categoria</label>
                            <select id="categoria" class="form-control" name="categoria">
                                @foreach(App\CategoryModel::all() as $category)
                                <option value={{$category->id}}>{{$category->nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="custom-file"><span class="fas fa-image"></span> Foto</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="file_empresa" name="foto" lang="es">
                                <label class="custom-file-label text-truncate" for="file">Seleccionar...</label>
                            </div>
                            <span class="help-block foto-error text-danger"></span>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="descripcion"><span class="fas fa-clipboard"></span> Descripción</label>
                            <input type="text" class="form-control" id="descripcion" name="descripcion">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="whatsapp"><span class="fab fa-whatsapp"></span> WhatsApp</label>
                            <input type="text" class="form-control" id="whatsapp" name="whatsapp" placeholder="5299999999">
                            <span class="help-block whatsapp-error text-danger"></span>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="facebook"><span class="fab fa-facebook"></span> facebook.com/</label>
                            <input type="text" class="form-control" id="facebook" name="facebook" placeholder="gopp">
                            <span class="help-block facebook-error text-danger"></span>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="twitter"><span class="fab fa-twitter"></span> twitter.com/</label>
                            <input type="text" class="form-control" name="twitter" id="twitter" placeholder="gopp">
                            <span class="help-block twitter-error text-danger"></span>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="instagram"><span class="fab fa-instagram"></span> instagram.com/</label>
                            <input type="text" class="form-control" name="instagram" id="instagram" placeholder="gopp">
                            <span class="help-block instagram-error text-danger"></span>
                        </div>
                    </div>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button id="submitButtonEmpresa" class="btn btn-primary"><span class="fas fa-sign-in-alt"></span></button>
                </form>
            </div>
        </div>
    </div>
</div>
