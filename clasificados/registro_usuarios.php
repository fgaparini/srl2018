<?php require_once('../Connections/clasificados.php'); ?>
<?php
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = (!get_magic_quotes_gpc()) ? addslashes($theValue) : $theValue;

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO usuarios (nombre_usuario, apellido, empresa, telefono, email, nivel, usuario, contrasena, edad, direccion) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['nombre'], "text"),
                       GetSQLValueString($_POST['apellido'], "text"),
                       GetSQLValueString($_POST['empresa'], "text"),
                       GetSQLValueString($_POST['telefono'], "text"),
                       GetSQLValueString($_POST['email'], "text"),
                       GetSQLValueString($_POST['nivel'], "text"),
                       GetSQLValueString($_POST['usuario'], "text"),
                       GetSQLValueString($_POST['contrasena'], "text"),
                       GetSQLValueString($_POST['edad'], "text"),
                       GetSQLValueString($_POST['direccion'], "text"));

  mysql_select_db($database_clasificados, $clasificados);
  $Result1 = mysql_query($insertSQL, $clasificados) or die(mysql_error());

  $insertGoTo = "confirmar_registro.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

mysql_select_db($database_clasificados, $clasificados);
$query_Recordset1 = "SELECT * FROM usuarios";
$Recordset1 = mysql_query($query_Recordset1, $clasificados) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/empleos.dwt.php" codeOutsideHTMLIsLocked="false" -->

<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Registrate!! en Clasificados SRL || San Rafael ||</title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="description" lang="es" content="Clasificados SRL :: Clasificados en San Rafael :: Publica tu anuncio de clasificados . CLASIFICADOS EN SAN RAFAEL.. clasificados.sanrafaellate.com.ar "/>
<meta name="keywords" lang="es" content="Clasificados, San Rafael, Mendoza, Empleos, Inmubeles, Propiedades, articulos, educacionales, judiciales, legales, profesionales " />
<META NAME="Copyright" CONTENT="sanrafaellate.com.ar" />
<!-- InstanceEndEditable -->
<link href="clasificados.css" rel="stylesheet" type="text/css" /><style type="text/css">
<!--
body {
	margin-left: 3px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
a:hover {
	text-decoration: none;
}
a:active {
	text-decoration: none;
}
.Estilo1 {color: #FFFFFF}
.Estilo4 {color: #FFFFFF; font-size: 14; }
.Estilo6 {font-size: 16px}
.style1 {font-size: 14px}
-->
</style>
<!-- InstanceBeginEditable name="head" -->
<style type="text/css">
<!--
.Estilo1 {font-size: 9px}
-->
</style>
<script type="text/javascript">
<!--
function MM_validateForm() { //v4.0
  if (document.getElementById){
    var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
    for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=document.getElementById(args[i]);
      if (val) { nm=val.name; if ((val=val.value)!="") {
        if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
          if (p<1 || p==(val.length-1)) errors+='- '+nm+' Falta rellenar direccion. email\n';
        } else if (test!='R') { num = parseFloat(val);
          if (isNaN(val)) errors+='- '+nm+' falta nuemero telefono.\n';
          if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
            min=test.substring(8,p); max=test.substring(p+1);
            if (num<min || max<num) errors+='- '+nm+' must contain a number between '+min+' and '+max+'.\n';
      } } } else if (test.charAt(0) == 'R') errors += '- '+nm+' .\n'; }
    } if (errors) alert('Falta completar los sgtes datos:\n'+errors);
    document.MM_returnValue = (errors == '');
} }
//-->
</script>
<!-- InstanceEndEditable -->
<script>
function abrirpopup(nombre,ancho,alto) {
dat = 'width=' + ancho + ',height=' + alto + ',left=300,top=100,scrollbars=no,resize=no';
window.open(nombre,'',dat)
}
</script>
<script src="../Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
</head>

<body>
<table width="859" border="0" align="left" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="2" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="415" height="100" valign="middle"><div><a href="http://srlclasificados.com.ar"><img src="imagenes/cabecera2.jpg" alt="SRL CLASIFICADOS :: Clasificados en San Rafael :: " width="350" height="78" border="0" align="middle" /><br />
            </a>
                <div>
                  <div align="center"><a href="http://srlclasificados.com.ar"><span class="texto_negro"><strong>www.</strong></span><span class="titulo_anuncios style1"><strong>srl</strong></span><span class="texto_negro"><strong>clasificados.com.ar</strong></span></a></div>
                </div>
          <a href="http://srlclasificados.com.ar"> </a> </div></td>
        <td width="444" align="center" valign="middle"><div align="center">
                    <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="400" height="80" align="absmiddle">
            <param name="movie" value="publicidad/sec-top.swf" />
            <param name="quality" value="high" />
            <embed src="publicidad/sec-top.swf" width="400" height="80" align="absmiddle" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash"></embed>
          </object>
        </div></td>
      </tr>
    </table>
    </td>
  </tr>
  <tr>
    <td bgcolor="#F90000"><table width="86%" height="15" border="0" cellpadding="0" cellspacing="0" class="menu_superior">
      <tr>
        <td width="15%"><div align="center"> <a href="http://clasificados.sanrafaellate.com.ar">Inicio</a> </div></td>
        <td width="28%"><div align="center"><a href="registro_usuarios.php">Registrate GRATIS!!</a> </div></td>
        <td width="26%"><div align="center"><?php 	if (isset( $_SESSION['MM_Username'])) { ?><a href="sistema/">Mi Cuenta</a>  <?php } else { ?><a href="publique_anuncio.php">Publique Anuncio</a><?php } ?></div></td>
        <td width="16%"><div align="center"><a href="ayuda.php"></a><a href="publicidad.php">Publicidad</a></div></td>
        <td width="15%"><div align="center"><a href="contacto.php">Contacto</a></div></td>
      </tr>
    </table></td>
    <td height="24" bgcolor="#F90000"><div align="right" class="texto_anuncio">
      
        <div align="center"><span class="Estilo1">San Rafael Mendoza        </span>
          <script>
	var mydate=new Date();
	var year=mydate.getYear();
	if (year < 1000)
		year+=1900;
	var day=mydate.getDay();
	var month=mydate.getMonth();
	var daym=mydate.getDate();
	if (daym<10)
		daym="0"+daym;

	var dayarray=new Array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
	var montharray=new Array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
	document.write("<small><font color='000000' face='Arial'><b>"+ dayarray[day] + " " + daym + " de " + montharray[month] + " de " + year + "</b></font></small>");

          </script>
        </div>
    </div></td>
  </tr>
  <tr bgcolor="#EC7058">
    <td width="549" height="3" bgcolor="#666666"></td>
    <td width="310" height="3" bgcolor="#666666"></td>
  </tr>
  <tr>
    <td width="550" valign="top"><!-- InstanceBeginEditable name="centro" -->
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="64%">&nbsp;</td>
        </tr>
        <tr>
          <td class="titulos_seccion">REGISTRO DE USUARIOS  </td>
        </tr>
        <tr>
          <td bgcolor="#FFFFFF"><div align="left">
            <div class="texto_opciones">Registrate y empeza a disfrutar de todos los beneficios de <span class="textoguias">SRL CLASIFICADOS</span>. Vas a poder publicar todos los anuncios que desees, vas a poder controlar tus anuncios borrarlos modificarlos, etc. No pierdas esta oportunidad... </div>
          </div></td>
        </tr>
        <tr>
          <td bgcolor="#FFFFFF">&nbsp;</td>
        </tr>
        <tr>
          <td align="left"><form action="<?php echo $editFormAction; ?>" id="form1" name="form1" method="POST">
            <table width="367" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td colspan="2" class="sos_nuevo"><div class="contenedor_anuncios">
                    <div align="left">Datos Persnolaes </div>
                </div></td>
              </tr>
              <tr>
                <td height="5" class="texto_rubros"></td>
                <td height="5" class="texto_rubros"></td>
              </tr>
              <tr>
                <td width="203" class="texto_rubros"><div align="right">Nombre:</div></td>
                <td width="164" class="texto_rubros"><div align="center">
                    <input name="nombre" type="text" class="texto_opciones" id="nombre" />
                </div></td>
              </tr>
              <tr>
                <td class="texto_rubros"><div align="right">Apellido:</div></td>
                <td class="texto_rubros"><div align="center">
                    <input name="apellido" type="text" class="texto_opciones" id="apellido" />
                </div></td>
              </tr>
              <tr>
                <td class="texto_rubros"><div align="right">Direccion:</div></td>
                <td class="texto_rubros"><div align="center">
                    <input name="direccion" type="text" class="texto_opciones" id="direccion" />
                </div></td>
              </tr>
              <tr>
                <td class="texto_rubros"><div align="right">Edad:</div></td>
                <td class="texto_rubros"><div align="center">
                    <input name="edad" type="text" class="texto_opciones" id="edad" />
                </div></td>
              </tr>
              <tr>
                <td class="texto_rubros"><div align="right">Empresa:</div></td>
                <td class="texto_rubros"><div align="center">
                    <input name="empresa" type="text" class="texto_opciones" id="empresa" />
                </div></td>
              </tr>
              <tr>
                <td class="texto_rubros"><div align="right">Telefono:</div></td>
                <td class="texto_rubros"><div align="center">
                    <input name="telefono" type="text" class="texto_opciones" id="telefono" />
                </div></td>
              </tr>
              <tr>
                <td class="texto_rubros"><div align="right">Email:</div></td>
                <td class="texto_rubros"><div align="center">
                    <input name="email" type="text" class="texto_opciones" id="email" />
                </div></td>
              </tr>
              <tr>
                <td colspan="2" class="sos_nuevo"><div align="left" class="" onfocus="MM_validateForm('nombre','','R','apellido','','R','direccion','','R','edad','','R','email','','RisEmail','usuario','','R','contrasena','','R');return document.MM_returnValue">Datos Usuario </div></td>
              </tr>
              <tr>
                <td height="5" class="texto_rubros"></td>
                <td height="5" class="texto_rubros"></td>
              </tr>
              <tr>
                <td class="texto_rubros"><div align="right">Nombre de Usuario : </div></td>
                <td class="texto_rubros"><div align="center">
                    <input name="usuario" type="text" class="texto_opciones" id="usuario2" />
                </div></td>
              </tr>
              <tr>
                <td class="texto_rubros"><div align="right">Contrase&ntilde;a:</div></td>
                <td class="texto_rubros"><div align="center">
                    <input name="contrasena" type="password" class="texto_opciones" id="contrasena2" value="" />
                </div></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td><input name="nivel" type="hidden" id="nivel" value="usuario" /></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td><label>
                  <input name="Submit" type="submit" class="texto_opciones" value="Enviar" />
                </label></td>
              </tr>
            </table>
            <input type="hidden" name="MM_insert" value="form1">
          </form>          </td>
        </tr>
      </table>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
      </table>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
    <!-- InstanceEndEditable --></td>
    <td valign="top" class="bordes_lateral_guias"><div class="guias_contenedor">
      <!-- titulo -->
      <div >
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td colspan="4" class="RUBRO_TITULOS">RUBROS</td>
          </tr>
          <tr>
            <td align="left" valign="middle"><a href="autos_san_rafael/autos_san_rafael.php"><img src="imagenes/automotores.jpg" alt="automotores en san rafael" width="40" height="40" border="0" /></a></td>
            <td align="left" valign="middle" class="rubros"><a href="autos_san_rafael/autos_san_rafael.php">Automotores</a> </td>
            <td><img src="imagenes/propiedades.jpg" alt="propiedades en san rafael" width="40" height="40" /></td>
            <td class="rubros"><a href="propiedades_san_rafael/inmuebles_san_rafael.php">Inmuebles</a></td>
          </tr>
          <tr>
            <td width="14%"><img src="imagenes/empleos.jpg" alt="EMPLEOS EN SAN RAFAEL" width="40" height="40" /></td>
            <td width="27%" class="rubros"><a href="empleos/empleos.php">Empleo</a></td>
            <td width="13%"><img src="imagenes/profesionales.jpg" alt="profesionales en san rafael" width="40" height="40" /></td>
            <td width="46%" class="rubros"><a href="profesionales/profesionales.php">Guia de Profesionales </a></td>
          </tr>
          <tr>
            <td><img src="imagenes/judiciales.jpg" alt="Judiciales, legales en san rafael" width="40" height="40" /></td>
            <td class="rubros"><a href="legales/legales.php">Legales</a></td>
            <td><img src="imagenes/educacionales.jpg" alt="educaconales en san rafael" width="40" height="40" /></td>
            <td class="rubros"><a href="educacionales/educacionales.php">Educacionales</a></td>
          </tr>
          <tr>
            <td><img src="imagenes/articulos.jpg" alt="Judiciales, legales en san rafael" width="40" height="40" /></td>
            <td class="rubros"><a href="articulos/articulos.php">Articulos</a></td>
            <td width="13%"><img src="imagenes/servicios.jpg" alt="educaconales en san rafael" width="40" height="40" /></td>
            <td class="rubros"><a href="servicios/servicios.php">Servicios</a></td>
          </tr>
          <tr>
            <td><img src="iconos/icono-Industria.gif" alt="Guia Empresas de San Rafael" width="40" height="40" /></td>
            <td colspan="2" class="rubros">Guia de Empresas </td>
            <td class="rubros">&nbsp;</td>
          </tr>
        </table>
		<?php 	if (isset( $_SESSION['MM_Username'])) { ?>
			<div align="left" class="texto_opciones">
			  <table width="303" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td height="56" colspan="4" valign="middle" bgcolor="#FFFFFF"><div align="center"><br/>                    
                        <span class="textoguias">Bienvenido </span><span class="texto_negro Estilo6"><strong><?php echo ucfirst($row_Recordset4['nombre_usuario']); ?> </strong></span><span class="textoguias"> a SRL Clasificados</span> </div></td>
                </tr>
                <tr>
                  <td width="50" height="25"><img src="iconos/panel_control.jpg" alt="Ir a Panel Control Clasificados San Rafael Late" width="50" height="50" /></td>
                  <td colspan="3"><a href="sistema/index.php">Ir a Panel de Control </a></td>
                </tr>
                <tr>
                  <td><img src="iconos/panel_escribir.jpg" alt="Escribi tu anuncio en Clasificados San Rafael Late" width="48" height="48" /></td>
                  <td width="133"><a href="sistema/publique_anuncio.php">Publicar Anuncio </a></td>
                  <td width="51"><img src="iconos/ayuda-C.jpg" alt="Ayuda del sistema clasificados San Rafael Late" width="50" height="50" /></td>
                  <td width="69"><a href="sistema/publique_anuncio.php">Ayuda</a></td>
                </tr>
                <tr>
                  <td><img src="iconos/salir-c.jpg" alt="Salir - Desconetar Usuario" width="50" height="50" /></td>
                  <td colspan="3"><a href="<?php echo $logoutAction ?>" class="titulo_anuncios">Desconectar</a></td>
                </tr>
              </table>
			</div>
			  <?php } else { ?>
        <br/>
		
        <form id="form2" name="form2" method="POST" action="login.php">
          <table width="97%" height="113" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td height="27" colspan="3" align="center" valign="middle" class="rubros_articulos_seleccionado"><div align="left">
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="19%"><img src="imagenes/usuario.gif" alt="usuario de san rafael late" width="39" height="34" /></td>
                      <td width="81%">Mi cuenta </td>
                    </tr>
                  </table>
              </div></td>
            </tr>
            <tr>
              <td width="33%" height="29" bgcolor="#FFFFFF" class="menu_superior"><div align="left"><span class="rubros_articulos">Nombre:</span>:</div></td>
              <td width="25" height="29" bgcolor="#FFFFFF" class="menu_superior"><input name="usuario" type="text" class="texto_opciones" id="usuario" size="15" /></td>
              <td height="30" rowspan="2" align="right" valign="middle" bgcolor="#FFFFFF" class="menu_superior"><label></label>
                  <div align="center">
                    <label>
                    <input name="Submit2" type="submit" class="rubros" value="entrar" />
                    </label>
                </div></td>
            </tr>
            <tr>
              <td width="33%" height="25" valign="top" bgcolor="#FFFFFF" class="menu_superior"><div align="right" class="rubros_articulos">
                  <div align="left">contrase&ntilde;a:</span></div>
              </div></td>
              <td width="25" height="25" valign="top" bgcolor="#FFFFFF" class="menu_superior"><input name="contrasena" type="password" class="texto_opciones" id="contrasena" size="15" /></td>
            </tr>
            <tr>
              <td height="19" colspan="3" valign="top" bgcolor="#FFFFFF" class="texto_anuncio"><span class="texto_link_chico"><a href="olvide_contrase&ntilde;a.php">olvidaste tu contrase&ntilde;a ?</a> -<a href="registro.php"> Registrate Aqui &gt;&gt;</a><a href="#"></a></span> </td>
            </tr>
          </table>
            </form><?php } ?>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
      </div>
      <br clear="all" />
        <!-- viajes -->
    </div></td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#FF0000"><table width="86%" height="15" border="0" cellpadding="0" cellspacing="0" class="menu_superior">
      <tr>
        <td width="15%"><div align="center"> <a href="http://clasificados.sanrafaellate.com.ar">Inicio</a> </div></td>
        <td width="28%"><div align="center"><a href="registro_usuarios.php">Registrate GRATIS!!</a> </div></td>
        <td width="26%" height="25"><div align="center"><a href="publicidad.php"></a><a href="publique_anuncio.php">Publique un Anuncio</a></div></td>
        <td width="16%"><div align="center"><a href="ayuda.php"></a><a href="publicidad.php">Publicidad</a></div></td>
        <td width="15%"><div align="center"><a href="contacto.php">Contacto</a></div></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td colspan="2"><div align="center">
      <p align="center" class="texto_negro">&copy;<strong><span lang="es-mx" xml:lang="es-mx"> sanrafaellate.com.ar</span></strong> &bull; Todos los Derechos Reservados &bull; 200<span lang="es" xml:lang="es">5</span></p>
    </div></td>
  </tr>
  <tr>
    <td colspan="2"><div align="center" class="rubros_articulos">SRL CLASIFICADOS <span class="rubros_articulos">&bull;</span>Anuncios Clasificados de San Rafael </div></td>
  </tr>
  <tr>
    <td colspan="2"><div align="center" class="rubros_articulos_seleccionado">&bull; <a href="http://www.sanrafaellate.com.ar" class="rubros_articulos_seleccionado">San Rafael</a> &bull; Mendoza &bull; Argentina &bull;</div></td>
  </tr>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<table width="130" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="130">&nbsp;</td>
  </tr>
  <tr>
    <td width="130">&nbsp;</td>
  </tr>
  <tr>
    <td width="130">&nbsp;</td>
  </tr>
  <tr>
    <td width="130">&nbsp;</td>
  </tr>
  <tr>
    <td width="130">&nbsp;</td>
  </tr>
</table>
</body>
<!-- InstanceEnd --></html>
<?php

mysql_free_result($Recordset1);
?>
