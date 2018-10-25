// Token
$.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
var tableProduct = $('#products-table').DataTable({
    searching: true,
    processing: true,
    serverSide: true,
    "language": {
        "lengthMenu": "<h5>Mostrar _MENU_ registros por página</h5>",
        "zeroRecords": "<h5>No se han encontrado boletines</h5>",
        "info": "Mostrando página _PAGE_ de _PAGES_",
        "infoEmpty": "<h4>Agrega un nuevo boletín!</h4>",
        "processing": "Espere...",
        "infoFiltered": "(Filtrado de _MAX_ registros totales)",
        "sSearch": "Buscar"
    },
    ajax: "boletin_todos",
    columns: [
        { data: 'titulo', name: 'titulo' },
        { data: 'contenido', name: 'contenido' },
        { data: 'enlace', name: 'enlace' },
        { data: 'plantilla', name: 'plantilla' },
        { data: 'fecha_fin', name: 'fecha_fin' },
        { data: 'action', name: 'action', orderable: false, searchable: false }

    ]
});
// Acción para abrir modal (formulario) [NUEVO]
function addForm() {
    save_method = 'add';
    $('#_method').val('POST');
    $('#myModal').modal('show');
    $('#myModal form')[0].reset();
    $('.modal-title').text('Agregar nueva promoción u oferta');
    $('#submitButton').text('Agregar');
    $('.help-block').html('');
}
// Acción para abrir modal (formulario) [EDITAR]
function editForm(id) {
    save_method = 'edit';
    $('#_method').val('PUT');
    $('#myModal form')[0].reset();
    $.ajax({
        url: "ofertas/" + id + "/edit",
        type: "GET",
        dataType: "JSON",
        success: function (data) {
            $('#myModal').modal('show');
            $('.help-block').html('');
            $('.modal-title').text('Editar promoción u oferta');
            $('#submitButton').text('Actualizar');
            $('#id').val(data.id);
            $('#precio').val(data.precio);
            $('#compraMinima').val(data.compraMinima);
            $('#descripcion').val(data.descripcion);
            $('#fecha_fin').val(data.fecha_fin);
            $('#precio').val(data.precio);
            $('#encabezado').val(data.encabezado);
            $('#plantilla').val(data.plantilla);
            $('#product_id').val(data.product_id);
        },
        error: function () {
            alert("error!");
        }
    });
}
function deleteData(id) {
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
                url: 'ofertas/' + id,
                type: "POST",
                data: { "_method": "DELETE", "_token": csrf_token },
                success: function () {
                    swal(
                        '¡Hecho!',
                        'Se ha borrado la oferta',
                        'success'
                    );
                    tableProduct.ajax.reload();

                },
                error: function () {
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
    if (save_method == 'add') url = "ofertas";
    else url = "ofertas/" + id;
    $.ajax({
        url: url,
        type: "POST",
        data: new FormData($('#myModal form')[0]),
        contentType: false,
        processData: false,
        dataType: 'json',
        success: function (data) {
            swal(
                '¡Hecho!',
                'Se ha registrado la oferta',
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
