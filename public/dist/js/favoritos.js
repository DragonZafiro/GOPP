$.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
$('.fav').on('click', function () {
    $(this).toggleClass('faved');
});
function addFavorite(id){
    var csrf_token = $('meta[name="_token"]').attr('content');
    $.ajax({
        url: route('usuario.favorito', id).url(),
        type: "POST",
        dataType: "json",
        data: {"_method": "post", "_token" : csrf_token},
        success: function (data) {
        },
        error: function (data) {
        }
    });
    return false;
}
function addBusinessFavorite(id){
    var csrf_token = $('meta[name="_token"]').attr('content');
    $.ajax({
        url: route('usuario.favorito_empresa', id).url(),
        type: "POST",
        dataType: "json",
        data: {"_method": "post", "_token" : csrf_token},
        success: function (data) {
        },
        error: function (data) {
        }
    });
    return false;
}
