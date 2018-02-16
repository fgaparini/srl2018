<html>
	<head>
		<title>Envio de   Formulario</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	  <link rel="stylesheet" href="css/jquery-ui-1.9.2.custom.css" />
<style>
.exitoE { width: 450px; font-family: tahoma;font-size: 13px; color: #222; background-color: #fff; border-radius:10px ; }
.exitoE h2 {font-family: tahoma; font-size: 16px; color: #C7CF5C;}
#loadmess p.aguarde {font-family: tahoma; font-size: 16px; font-weight: bold;}
#loadmess div.enviando { background-color: #EAF0DB; border-radius:10px ; font-family: tahoma; font-size: 14px; color:#666; margin: 10px 0; padding: 10px; width: 430px;}
#loaders {display:none }
 </style>
	</head>
	<body>
   <?php 
  $tipoAlojar=$_GET['tipoalojar'];
  $nameA=$_GET['nameA'];
    $bu=$_GET['bu'];
  ?>
		<div id="c_E_M">
			
		
  <h2>Consulta Multiple</h2>
  <p> Envie una cosnulta a todos los <?php echo $nameA; ?> listados, facil rapido y sencillo.</p>
 
 <form id="fromAa" method="post"> <div id="form"  align="left" >
    <div class=""><label for="nameem">Nombre y Apellido:</label><br/><input type="text" name="nameem" id="nameem" placeholder="Su nombre Aqui"/> </div>
    <div class=""><label for="llegadaem">Llegada:</label><br/><input type="text" name="fromem" id="fromem" class="fechainput"/> </div>
    <div class=""><label for="Salidaem">salida:</label><br/><input type="text" name="toem" id="toem" class="fechainput"/> </div>
    <div class=""><label for="emailem">Email:</label><br/><input type="text" name="emailem" placeholder="Su email Aqui" id="emailem"/> </div>
    <div class=""><label for="telefonoem">Telefono:</label><br/><input type="text" name="telefonoem" id="telefonoem" placeholder="Su telefono Aqui"/> </div>
    <div class=""><label for="consultaem">Consulta:</label><br/><textarea name="consultaem"  cols="40" rows="1" id="consultaem" placeholder="Agregue su consulta"></textarea> </div>
    <button type="button" id="enviarEM" class="ib_button">Enviar</button>
    
	<input type="hidden" name="tipoalojar" id="tipoalojar" value="<?php echo $tipoAlojar ?>">
   <input type="hidden" name="bu" id="bu" value="<?php echo $bu ?>">
 </form>

 </div>
		</div>

    <div id="loaders"><div id="loadmess" ><p class="aguarde">Esto puede tardar algunos segundos aguarde por favor.. </p><div align="center" style="width:100%"><img src="<?php echo $bu; ?>imagenes/barra-loader.gif" alt=""></div><div class="enviando">Estamos enviando su consulta a todos los <?php echo $nameA ?>..<br></div></div>
	</div></body>
	
    


<script>
   $(function() {
     //BUSCADOR ALOJAMIENTOS E FICHAS
     $("#fromem").datepicker({
       dateFormat: "dd/mm/yy",
       changeMonth: true,
       numberOfMonths: 2,
       onClose: function(selectedDate) {
         $("#toem").datepicker("option", "minDate", selectedDate);
       }
     });
     $("#toem").datepicker({
       dateFormat: "dd/mm/yy",
       changeMonth: true,
       numberOfMonths: 2,
       onClose: function(selectedDate) {
         $("#fromem").datepicker("option", "maxDate", selectedDate);
       }
     });

     //ENVIANDO FORM
     $("#enviarEM").click(function() {
       base_url = $("input#bu").val();

     
      $('#enviarEM').ajaxStart(function() {
       $.fancybox({
        href: '#loadmess', 
        modal: true
    });
  
        
      }).ajaxStop(function() {


      });



       // NOMBRE
       var name = $("input#nameem").val();
       if (name == "") {
         $("input#nameem").addClass("error");
         $("input#nameem").val("Falta su Nombre");
         $("input#nameem").focus();
         return false;
       }
       // FROM
       var from = $("input#fromem").val();
       if (from == "") {
         $("input#fromem").addClass("error");
         $("input#fromem").val("Falta dia Llegada");
         $("input#fromem").focus();
         return false;
       }
       // to
       var to = $("input#toem").val();
       if (to == "") {
         $("input#toem").addClass("error");
         $("input#toem").val("Falta dia Salida");
         $("input#toem").focus();
         return false;
       }
       // email
       var email = $("input#emailem").val();
       if (email == "") {
         $("input#emailem").addClass("error");
         $("input#emailem").val("Falta su Email");
         $("input#emailem").focus();
         return false;
       } 
      if(email.indexOf('@', 0) == -1 || email.indexOf('.', 0) == -1) {  
          $("input#emailem").val("La dirección e-mail es incorrecta");  
        return false;  
       }  
       // telefono
       var phone = $("input#telefonoem").val();
       if (phone == "") {
         $("input#telefonoem").addClass("error");
         $("input#telefonoem").val("Falta su Telefono");
         $("input#telefonoem").focus();
         return false;
       }
       // consulta
       var txt = $("textarea#consultaem").val();
       if (txt == "") {
         $("textarea#consultaem").addClass("error");
         $("textarea#consultaem").focus();
         return false;
       }

       tipoA = $("input#tipoalojar").val(); //ID TIPO ALOJAMIENTO

       var dataString = {
         name: name,
         from: from,
         to: to,
         email: email,
         telefono: phone,
         consulta: txt,
         tipoA: tipoA

       };


       $.ajax({
         type: "POST",
         url: base_url + 'website/ajaxs/emailmultiple/',
         data: dataString,
         /*progress: function(e) {
                        if(e.lengthComputable) {
                            var pct = (e.loaded / e.total) * 100;

                            $('#prog')
                                .progressbar('option', 'value', pct)
                                .children('.ui-progressbar-value')
                                .html(pct.toPrecision(3) + '%')
                                .css('display', 'block');
                        } else {
                            console.warn('Content Length not reported!');
                        }
                    },*/
         success: function(data) {

           $.fancybox(data);
         }
       });

     });
   });
</script>
</html>