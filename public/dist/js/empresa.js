// Token
$.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
new ClipboardJS('.btn');
$('#btn-codigo').click(function () {
    $('#btn-codigo').popover('show');
})
// Acción para abrir modal (formulario) [NUEVO]
function addEmpresa() {
    save_method = 'add';
    $('#_method').val('POST');
    $('#myModal').modal('show');
    $('#myModal form')[0].reset();
    $('.help-block').html('');
    $('#submitButton').html('<span class="fas fa-sign-in-alt"></span> Registrarse');
}
function generarCodigoEmpresa(id){
    $.ajax({
        url: "../business/" + id + "/codigo",
        type: "GET",
        dataType: "JSON",
        success: function(data){
            $('#codigo_afiliador').html(data.codigo_afiliador);
            $('#modalCodigo').modal('show');
        },
        error: function () {
            swal(
                '¡Error!',
                'Ya tienes un afiliador',
                'error'
            );
        }
    })
}
function desafiliar(id){
    var csrf_token = $('meta[name="_token"]').attr('content');
    swal({
        title: '¿Estás seguro?',
        text: "Tendrás que generar un nuevo código y conseguir otro afiliador",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Desafiliar',
        cancelButtonText: 'Cancelar'
        }).then((result) => {
        if (result.value) {
            $.ajax({
                url: '../business/' + id + '/desafiliar',
                type: "POST",
                data: {"_method": "DELETE", "_token" : csrf_token},
                success: function(){
                    swal(
                        '¡Hecho!',
                        'Te has desafiliado corectamente',
                        'success'
                    );
                    setTimeout(function () {
                        location.reload();
                    }, 2000);
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
// Acción para abrir modal (formulario) [EDITAR]
function editEmpresa(id) {
    save_method = 'edit';
    $('#metodo').val('PUT');
    $('#modalEmpresa form')[0].reset();
    $.ajax({
        url: "../business/" + id,
        type: "GET",
        dataType: "JSON",
        success: function (data) {
            $('#modalEmpresa').modal('show');
            $('.help-block').html('');
            $('#submitButtonEmpresa').html('<span class="fas fa-edit"></span> Actualizar');
            $('#business_id').val(id);
            $('#nombre_empresa').val(data.nombre);
            $('#categoria').val(data.category_id);
            $('#email_empresa').val(data.email);
            $('#descripcion').val(data.descripcion);
            $('#direccion').val(data.direccion);
            $('#descripcion').val(data.descripcion);
            $('#whatsapp').val(data.whatsapp);
            $('#facebook').val(data.facebook);
            $('#twitter').val(data.twitter);
            $('#instagram').val(data.instagram);
            $('#web_empresa').val(data.web);
            $('#telefono').val(data.telefono);
        },
        error: function () {
            alert("error!");
        }
    });
}
// Enviar datos JSON
$('#submitButtonEmpresa').click(function () {
    var id = $('#business_id').val();
    if (save_method == 'add') url = "registro";
    else url = "../business/" + id;
    $.ajax({
        url: url,
        type: "POST",
        data: new FormData($('#modalEmpresa form')[0]),
        contentType: false,
        processData: false,
        dataType: 'json',
        success: function (data) {
            if(save_method == 'add')
            swal(
                '¡Hecho!',
                'Te has registrado correctamente, por favor ingresa para continuar.',
                'success'
            );
            else
            {
                swal(
                    '¡Hecho!',
                    'Actualizaste tus datos correctamente.',
                    'success'
                );
                setTimeout(function () {
                    location.reload();
                }, 2000);
            }
            $('#modalEmpresa').modal('hide');
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
