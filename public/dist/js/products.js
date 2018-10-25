// Token
$.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
// Obtiene datos de todos los productos
var tableProduct = $('#products-table').DataTable({
    searching:true,
    processing: true,
    serverSide: true,
    "language": {
        "lengthMenu": "<h5>Mostrar _MENU_ registros por página</h5>",
        "zeroRecords": "<h5>No se han encontrado productos o servicios</h5>",
        "info": "Mostrando página _PAGE_ de _PAGES_",
        "processing": "Espere...",
        "infoEmpty": "<h4>Agrega un nuevo producto!</h4>",
        "infoFiltered": "(Filtrado de _MAX_ regitros)",
        "sSearch": "Buscar"
    },
    ajax: "servicios_productos",
    columns: [
        {data:'foto',name:'foto',
            "render": function (data, type, full, meta) {
                return "<img class ='squareSizeS squareElementContainer'src=\"" + data + "\" height=\"50\"/>";
        }},
        { data: 'nombre', name: 'nombre' },
        { data: 'codigo', name: 'codigo' },
        { data: 'tipo', name: 'tipo' },
        { data: 'descripcion', name: 'descripcion' },
        { data: 'precio', name: 'precio' },
        { data: 'puntos', name: 'puntos' },
        { data: 'stock', name: 'stock' },
        { data: 'action', name: 'action', orderable: false, searchable: false }

    ]
});
// Acción para abrir modal (formulario) [NUEVO]
function addForm() {
    save_method = 'add';
    $('#_method').val('POST');
    $('#myModal').modal('show');
    $('#myModal form')[0].reset();
    $('.modal-title').text('Agregar nuevo producto o servicio');
    $('#submitButton').text('Agregar');
    $('.help-block').html('');
}
// Acción para abrir modal (formulario) [EDITAR]
function editForm(id){
    save_method = 'edit';
    $('#_method').val('PUT');
    $('#myModal form')[0].reset();
    $.ajax({
        url: "productos/" + id + "/edit",
        type: "GET",
        dataType: "JSON",
        success: function(data){
            $('#myModal').modal('show');
            $('.help-block').html('');
            $('.modal-title').text('Editar Producto');
            $('#submitButton').text('Actualizar producto');
            $('#id').val(data.id);
            $('#nombre').val(data.nombre);
            $('#codigo').val(data.codigo);
            $('#descripcion').val(data.nombre);
            $('#marca').val(data.marca);
            $('#precio').val(data.precio);
            $('#comentario').val(data.comentario);
            $('#stock').val(data.stock);
            $('#puntos').val(data.puntos);
        },
        error: function(){
            alert("error!");
        }
    });
}
function deleteData(id){
    var csrf_token = $('meta[name="_token"]').attr('content');
    swal({
        title: '¿Estás seguro?',
        text: "No podrás recuperar el producto si lo borras...",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Eliminar',
        cancelButtonText: 'Cancelar'
        }).then((result) => {
        if (result.value) {
            $.ajax({
                url: 'productos/' + id,
                type: "POST",
                data: {"_method": "DELETE", "_token" : csrf_token},
                success: function(){
                    swal(
                        '¡Hecho!',
                        'Se ha borrado el producto',
                        'success'
                    );
                    tableProduct.ajax.reload();

                },
                error: function(){
                    swal(
                        '¡Error!',
                        data.message,
                        'error'
                    )
                }
            });
        }
    });
}
// Enviar datos JSON
$('#submitButton').click(function () {
    var id = $('#id').val();
    if (save_method == 'add') url = "productos";
    else url = "productos/" + id;
    $.ajax({
        url: url,
        type: "POST",
        data: new FormData($('#myModal form')[0]),
        contentType: false,
        processData: false,
        dataType: 'json',
        success: function (data) {
            if (save_method == 'add')
            swal(
                '¡Hecho!',
                'Se ha registrado el producto',
                'success'
            );
            else
            swal(
                '¡Hecho!',
                'Se ha actualizado el producto',
                'success'
            );
            $('#myModal').modal('hide');
            tableProduct.ajax.reload();
        },
        error: function (data) {
            var errors = data.responseJSON;
            $('.help-block').html('');
            $.each(errors.errors, function (key, value) {
                $('.' + key + '-error').html(value[0]);
            });
        }
    });
    return false;
});
