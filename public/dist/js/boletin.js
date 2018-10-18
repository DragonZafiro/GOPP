setTimeout(showBoletin, 5000);
function showBoletin() {
    $("#modalBoletin").modal("show");
}
function testAnim(x) {
    $('.modal .modal-dialog').attr('class', 'modal-dialog  ' + x + '  animated');
};
$('#modalBoletin').on('show.bs.modal', function (e) {
    testAnim('swing');
    TweenMax.staggerFrom("#first-offer *", 1, { alpha: 0, scale: .8, y: "+=10", ease: Back.easeOut }, .2);
})
$('#modalBoletin').on('hide.bs.modal', function (e) {
    testAnim('bounceOutLeft');
})
