var getUrl = window.location;
var base_urla =
    'https://peracolombia.com';
//TRAER LAS TALLAS DESDE LA BASE DE DATOS
$(document).ready(function() {
    reloadsizes();
    $("#horma").change(function() {
        reloadsizes();
    });
});

function reloadsizes() {
    $.ajax({
        type: "get",
        url: base_urla + "/shirtsizes",
        data: "horma=" + $("#horma").val(),
        success: function(r) {
            $("#sizes1").html(r);
        },
    });
}