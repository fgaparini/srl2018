<html>
	<head>
		<title>Envio de   Formulario</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	  <link rel="stylesheet" href="css/jquery-ui-1.9.2.custom.css" />

	</head>
	<body>
		<div id="c_form_list">
			
		
  <h2>Enviar Consulta </h2>
  <?php 


  $id_A=$_GET['id'];
  $email_A=$_GET['email'];
  $bu=$_GET['bu'];
  $tipo_ae=$_GET['tipo_ae'];
  $name_ae=$_GET['name_ae'];
  ?>
 <form id="fromAa" method="post"> <div id="form"  align="left" >
    <div class=""><label for="namexa">Nombre y Apellido:</label><br/><input type="text" name="namexa" id="namexa" placeholder="Su nombre Aqui"/> </div>
    <div class=""><label for="llegadaxa">Llegada:</label><br/><input type="text" name="fromxa" id="fromxa" class="fechainput"/> </div>
    <div class=""><label for="Salidaxa">salida:</label><br/><input type="text" name="toXA" id="toXA" class="fechainput"/> </div>
    <div class=""><label for="emailxa">Email:</label><br/><input type="text" name="emailxa" placeholder="Su email Aqui" id="emailxa"/> </div>
    <div class=""><label for="telefonoxa">Telefono:</label><br/><input type="text" name="telefonoxa" id="telefonoxa" placeholder="Su telefono Aqui"/> </div>
    <div class=""><label for="consultaxa">Consulta:</label><br/><textarea name="consultaxa" id="consultaxa" cols="40" rows="1" id="consulta" placeholder="Agregue su consulta"></textarea> </div>
    <button type="button" id="enviarIF" class="ib_button">Enviar</button>
    <input type="hidden" name="emailA" id="emailA" value="<?php echo $email_A ?>">
    <input type="hidden" name="idA"  id="idA" value="<?php echo $id_A ?>">
    <input type="hidden" name="bu" id="bu" value="<?php echo $bu ?>">
	<input type="hidden" name="tipo_aexa" id="tipo_aexa" value="<?php echo $tipo_ae ?>">
	<input type="hidden" name="name_aexa" id="name_aexa" value="<?php echo $name_ae ?>">
   
 </div>
		</div>
	</body>
	
<script>
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

   $("#enviarIF").click(function() {
 base_url= $("input#bu").val();

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
      // FROM
     var from = $("input#fromxa").val();
      if (from == "") {
       $("input#fromxa").addClass("error");
      $("input#fromxa").val("Falta dia Llegada");
      $("input#fromxa").focus();
      return false; }
      // to
      var to = $("input#toXA").val();
      if (to == "") {
       $("input#toXA").addClass("error");
      $("input#toXA").val("Falta dia Salida");
      $("input#toXA").focus();
      return false; }
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

    ides= $("input#idA").val();//ID EMPRESA O ALOJAMIENTO
    email_A= $("input#emailA").val();// EMAIL EMPRESA ALOJAMIENTO
    tipo_ae= $("input#tipo_aexa").val();
    name_ae= $("input#name_aexa").val();
   
   var dataString = {
        name:name,
        from:from,
        to:to,
        email:email,
        telefono:phone,
        consulta:txt,
        id:ides,
        email_A:email_A,
        tipo_ae:tipo_ae,
        name_ae:name_ae
      };
      //alert (dataString);return false;
      
      $.ajax({
      type: "POST",
       
      url:base_url+'website/ajaxs/emailxalojar/',
      data: dataString,
      success: function(data) {
        
          	$.fancybox(data);
      }
     });

  });
});
</script>
</html>