
	 $(function() {
 //BUSCADOR ALOJAMIENTOS E FICHAS
  $(  "#fromxa"  ).datepicker({
    dateFormat: "dd/mm/yy",
      changeMonth: true,
      numberOfMonths: 2,
      onClose: function( selectedDate ) {
        $(  "#toXA"  ).datepicker( "option", "minDate", selectedDate );
      }
    });
    $(  "#toXA"  ).datepicker({
     dateFormat: "dd/mm/yy",
      changeMonth: true,
      numberOfMonths: 2,
      onClose: function( selectedDate ) {
        $(  "#fromxa"  ).datepicker( "option", "maxDate", selectedDate );
      }
    });


//FROMULARIO DE CONTACTO ------------------------------
//-----------------------------------------------------
$("#enviarIF").click(function() {
base_url= $("input#baseurl").val();
// validate and process form
// first hide any error messages
$('#enviarIF').ajaxStart(function() {
$.fancybox.showActivity(); }).ajaxStop(function() {


});



// NOMBRE
var name = $("input#namexa").val();
if (name == "") {
$("input#namexa").addClass("error");
$("input#namexa").val("Falta su Nombre");
$("input#namexa").focus();
return false;
}
// email
var email = $("input#emailxa").val();
if (email == "") {
$("input#emailxa").addClass("error");
$("input#emailxa").val("Falta su Email");
$("input#emailxa").focus();
return false;
}
// telefono
var phone = $("input#telefonoxa").val();
if (phone == "") {
$("input#telefonoxa").addClass("error");
$("input#telefonoxa").val("Falta su Telefono");
$("input#telefonoxa").focus();
return false; }
// consulta
var txt = $("textarea#consultaxa").val();
if (txt == "") {
$("textarea#consultaxa").addClass("error");
$("textarea#consultaxa").focus();
return false; }
asunto= $("input#asunto").val();//asunto
tipoc= $("input#tipoc").val();//asunto

var dataString = {
name:name,
email:email,
telefono:phone,
consulta:txt,
asunto:asunto,
tipoc:tipoc
};
//alert (dataString);return false;

$.ajax({
type: "POST",

url:base_url+'website/ajaxs/contacto/',
data: dataString,
success: function(data) {

$.fancybox(data);
}
});
});
});
