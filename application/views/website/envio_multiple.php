<html>
  <head>
    <title>Envio de   Formulario - Prueba</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="stylesheet" href="css/jquery-ui-1.9.2.custom.css" />
    <style>
    body, html {width: 100%; height: 100%; }
    .exitoE { width: 450px; font-family: tahoma;font-size: 13px; color: #222; background-color: #fff; border-radius:10px ; }
    .exitoE h2 {font-family: tahoma; font-size: 16px; color: #C7CF5C;}
    #loadmess {width: 95%; margin: 50px 0 0 0;  }
    #loadmess div.aguarde {font-family: tahoma; font-size: 14px; font-weight: bold; color: #fff;}
    div.aguarde span.tarda {font-family: tahoma; font-size: 12px; font-weight: normal; color: #fff;}
    #loadmess div.enviando { background-color: #EAF0DB; border-radius:10px ; font-family: tahoma; font-size: 14px; color:#666; margin: 10px 0; padding: 10px; width: 430px;}
    #loaders { width: 100%;background-color: rgba(10,10,10,.8);height: 100%; background: #222; -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=80)";
    /* IE 5-7 */
    filter: alpha(opacity=80);
    /* Netscape */
    -moz-opacity: 0.8;
    /* Safari 1.x */
    -khtml-opacity: 0.8;
    /* Good browsers */
    opacity: 0.8;   position: absolute;top: 0: left:0; z-index: 9999;}
    #c_E_M{ position: relative;}
    .porcnum {display: inline-block; color: #FFF; font-size: 16px; vertical-align: top; font-weight: bold; padding:32px 0 0 20px;  }
    .progress { width: 60%; border-radius: 4px; border:1px #666 solid; height: 20px;background-color: #fff; margin: 30px 0 0 30px;display: inline-block;}
    .progress .bar {
    border-radius: 2px;
    height: 20px;
    background-color: #BBC074;
    color:#222;
    width: 0%;
    -webkit-transition: width 4s;
    -moz-transition: width 4s;
    -ms-transition: width 4s;
    -o-transition: width 4s;
    transition: width 4s;
    }
    #loadmess div.cerrar {color:#fff; font-size: 14px; font-family: tahoma; margin: 30px 0 0 0;}
    #loadmess div.cerrar>p {color:#fff; font-size: 14px; font-family: tahoma;}
    #loadmess div.cerrar> button {
    font-family: Arial, Helvetica, sans-serif;
    font-size: 14px;
    color: #ffffff;
    padding: 10px 20px;
    background: #909e5d;
    background: linear-gradient(
    top,
    #d8e09b 0%,
    #909e5d 50%,
    #d8e09b);
    background: -moz-linear-gradient(
    top,
    #d8e09b 0%,
    #909e5d 50%,
    #d8e09b);
    background: -webkit-gradient(
    linear, left top, left bottom,
    from(#d8e09b),
    color-stop(0.50, #909e5d),
    to(#d8e09b));
    -moz-border-radius: 14px;
    -webkit-border-radius: 14px;
    border-radius: 14px;
    border: 0px solid #6d8000;
    -moz-box-shadow:
    0px 1px 3px rgba(000,000,000,0.5),
    inset 0px 0px 0px rgba(255,255,255,0);
    -webkit-box-shadow:
    0px 1px 3px rgba(000,000,000,0.5),
    inset 0px 0px 0px rgba(255,255,255,0);
    box-shadow:
    0px 1px 3px rgba(000,000,000,0.5),
    inset 0px 0px 0px rgba(255,255,255,0);
    text-shadow:
    0px -1px 0px rgba(31,29,31,0.2),
    0px 1px 0px rgba(150,150,150,0.4);
    }
    #loadmess div.cerrar> button:hover {background:#909e5d; text-decoration: underline; }
    </style>
  </head>
  <body>
    
    <div id="c_E_M">
      
      <div id="loaders">
        <div id="loadmess" align="center">
          <div class="aguarde">Estamos enviando tu consulta a muliples Alojamientos.</br></br><span class="tarda">Esto puede tardar algunos Segundos.. <br>(aprox 30-40 segundos)</span>
          </div>
          <br>
          <div id="bara-loader">
            <img src="<?php echo $bu ?>/imagenes/barra-loader.gif" alt="">
          </div>
        </div>
    </div>
  
      <h2>Consulta Multiple</h2>
      <p> Envie una cosnulta a todos los <?php echo $nameA; ?> listados, facil rapido y sencillo.dsda</p>
      
      <form id="fromAa" method="post"> <div id="form"  align="left" >
        <div class=""><label for="nameem">Nombre y Apellido:</label><br/><input type="text" name="nameem" id="nameem" placeholder="Su nombre Aqui" value=""/> </div>
        <div class=""><label for="llegadaem">Llegada:</label><br/><input type="text" name="fromem" id="fromem" class="fechainput"/> </div>
        <div class=""><label for="Salidaem">salida:</label><br/><input type="text" name="toem" id="toem" class="fechainput"/> </div>
        <div class=""><label for="emailem">Email:</label><br/><input type="text" name="emailem" placeholder="Su email Aqui" id="emailem" value=""/> </div>
        <div class=""><label for="telefonoem">Telefono:</label><br/><input type="text" name="telefonoem" id="telefonoem" placeholder="Su telefono Aqui"/> </div>
        <div class=""><label for="consultaem">Consulta:</label><br/><textarea name="consultaem"  cols="40" rows="1" id="consultaem" placeholder="Agregue su consulta"></textarea> </div>
        <button type="button" id="enviarEM" class="ib_button">Enviar</button>
        
        <input type="hidden" name="tipoalojar" id="tipoalojar" value="<?php echo $tipoAlojar ?>">
        <input type="hidden" name="bu" id="bu" value="<?php echo $bu ?>">
      </div> </form>
    </div>
  </body>
  
  <script>
  $(function() {
  $('#loaders').hide();
  //BUSCADOR ALOJAMIENTOS E FICHAS
  $("#fromem").datepicker({
  dateFormat: "dd/mm/yy",
  monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
  'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
  monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun',
  'Jul','Ago','Sep','Oct','Nov','Dic'],
  dayNames: ['Domingo','Lunes','Martes','Miércoles','Jueves','Viernes','Sábado'],
  dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
  dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
  
  onClose: function(selectedDate) {
  $("#toem").datepicker("option", "minDate", selectedDate);
  }
  });
  $("#toem").datepicker({
  dateFormat: "dd/mm/yy",
  monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
  'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
  monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun',
  'Jul','Ago','Sep','Oct','Nov','Dic'],
  dayNames: ['Domingo','Lunes','Martes','Miércoles','Jueves','Viernes','Sábado'],
  dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
  dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
  
  
  onClose: function(selectedDate) {
  $("#fromem").datepicker("option", "maxDate", selectedDate);
  }
  });
  
  //ENVIANDO FORM
  function texta(name){
  
  }
  $("#enviarEM").click(function() {
                  base_url = $("input#bu").val();
                  /*
                  $('#enviarEM').ajaxStart(function() {
                  $.fancybox({
                  href: '#loadmess',
                  modal: true
                  });
                  
                  }).ajaxStop(function() {
                  });
                  */
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
                  $
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
                  
                  $('#loaders').show();
                  
                  $.ajax({
                  type: 'POST',
                  url: base_url + 'website/ajaxs/emailmultiple/',
                  data: dataString,
                  success: function(data)
                  {
                  //$('#loaders div#loadmess').append('<p style="color:#fff">Porcentaje: '+Porcent+'<br>'+ia+'<br>'+totalA+'<br>arr:'+arr.length+'<br>porc %'+Porcent2+'<p>');
                  $('.aguarde').hide();
                  $('#bara-loader').hide();
                  $("#loaders div#loadmess").append('</br><div class="cerrar"><p><b> Su consulta se envio exitosamente ! .. gracias.</b></p></br><button onclick ="$.fancybox.close();"> Cerrar Ventana </button></div>');
                  }
                  
                  });
            });     
  /*$.each(<?php echo $rows_P2 ?>, function(k,v){
  nombre = v.Nombre;
  ID_Alojar=v.ID_Alojamiento;
  emailAlojar=v.Email;
  
  
  //$('#loadmess p.aguarde').append('<br>Enviando email a: '+name);
  Porcent=Math.round(ia*100/totalA);
  Porcent2=Math.round((ia-1)*100/totalA);
  $.ajaxSetup({
  async: true
  });
  $.ajax({
  type: "POST",
  url: base_url + 'website/ajaxs/emailmultiple2/?nameA='+nombre+'&emailA='+emailAlojar+'&IDA='+ID_Alojar,
  
  data: dataString,
  
  
  complete: function(data) {
  
  $('.progress').find(".bar").css('width',''+Porcent+'%');
  
  $(".porcnum").html(''+Porcent2+'%');}
  
  
  
  });
  $.ajaxSetup({
  async: false
  });
  
  ia++;
  //     $(".loadmess").append('span<span>'+ia+'-</span>');
  if(ia==totalA) {
  setTimeout(function(){$(".porcnum").html('100%');},1800);
  setTimeout(function(){ $("#loadmess").append('</br><div class="cerrar"><p> Su consulta se envio exitosamente ! .. gracias.</p></br><button onclick ="$.fancybox.close();"> Cerrar Ventana </button></div>');
  },2800)
  }
  });
  */
  });
  </script>
</html>