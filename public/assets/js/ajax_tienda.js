var getUrl = window.location;
var base_urla =
  getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split("/")[1];

//TRAER LAS CIUDADES DESDE LA BASE DE DATOS

$(document).ready(function () {
  reloadsizes();
  $("#horma").change(function () {
    reloadsizes();
  });
});
function reloadsizes() {
  $.ajax({
    type: "get",
    url: base_urla + "/shirtsizes",
    data: "horma=" + $("#horma").val(),
    success: function (r) {
      $("#sizes1").html(r);
    },
  });
}
