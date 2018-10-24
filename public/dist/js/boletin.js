setTimeout(showBoletin, 5000);
function showBoletin() {
    $("#modalBoletin").modal("show");
    TweenMax.staggerFrom("#first-offer *", 1, {
        alpha: 0,
        scale: .8,
        y: "+=10",
        ease: Back.easeOut
    }, .2);
}
