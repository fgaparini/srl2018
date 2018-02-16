<?php require_once('../../Connections/clasificados.php'); ?>
<?php
//initialize the session
if (!isset($_SESSION)) {
  session_start();
}

// ** Logout the current user. **
$logoutAction = $_SERVER['PHP_SELF']."?doLogout=true";
if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
  $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){
  //to fully log out a visitor we need to clear the session varialbles
  $_SESSION['MM_Username'] = NULL;
  $_SESSION['MM_UserGroup'] = NULL;
  $_SESSION['PrevUrl'] = NULL;
  unset($_SESSION['MM_Username']);
  unset($_SESSION['MM_UserGroup']);
  unset($_SESSION['PrevUrl']);
	
  $logoutGoTo = "../index.php";
  if ($logoutGoTo) {
    header("Location: $logoutGoTo");
    exit;
  }
}
// *** Validate request to login to this site.

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['usuario'])) {
  $loginUsername=$_POST['usuario'];
  $password=$_POST['contrasena'];
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "sistema/index.php";
  $MM_redirectLoginFailed = "registro.php";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_clasificados, $clasificados);
  
  $LoginRS__query=sprintf("SELECT usuario, contrasena FROM usuarios WHERE usuario='%s' AND contrasena='%s'",
    get_magic_quotes_gpc() ? $loginUsername : addslashes($loginUsername), get_magic_quotes_gpc() ? $password : addslashes($password)); 
   
  $LoginRS = mysql_query($LoginRS__query, $clasificados) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
     $loginStrGroup = "";
    
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	      

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}

?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

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
}

$colname_Recordset4 = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_Recordset4 = (get_magic_quotes_gpc()) ? $_SESSION['MM_Username'] : addslashes($_SESSION['MM_Username']);
}
mysql_select_db($database_clasificados, $clasificados);
$query_Recordset4 = sprintf("SELECT * FROM usuarios WHERE usuario = '%s'", $colname_Recordset4);
$Recordset4 = mysql_query($query_Recordset4, $clasificados) or die(mysql_error());
$row_Recordset4 = mysql_fetch_assoc($Recordset4);
$totalRows_Recordset4 = mysql_num_rows($Recordset4);

$colname_Recordset1 = "-1";
if (isset($_GET['inmuebles_id'])) {
  $colname_Recordset1 = $_GET['inmuebles_id'];
}
mysql_select_db($database_clasificados, $clasificados);
$query_Recordset1 = sprintf("SELECT * FROM inmuebles WHERE inmuebles_id = %s", GetSQLValueString($colname_Recordset1, "int"));
$Recordset1 = mysql_query($query_Recordset1, $clasificados) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

mysql_select_db($database_clasificados, $clasificados);
$query_Recordset2 = "SELECT * FROM usuarios, inmuebles WHERE usuarios.id_usuario =  inmuebles.id_usuario";
$Recordset2 = mysql_query($query_Recordset2, $clasificados) or die(mysql_error());
$row_Recordset2 = mysql_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysql_num_rows($Recordset2);

mysql_select_db($database_clasificados, $clasificados);
$query_Recordset3 = "SELECT * FROM preguntas , inmuebles WHERE preguntas.clasificado_id = inmuebles.inmuebles_id ORDER BY preguntas.fecha_pregunta ASC";
$Recordset3 = mysql_query($query_Recordset3, $clasificados) or die(mysql_error());
$row_Recordset3 = mysql_fetch_assoc($Recordset3);
$totalRows_Recordset3 = mysql_num_rows($Recordset3);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/empleos.dwt.php" codeOutsideHTMLIsLocked="false" -->

<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<title><?php echo $row_Recordset1['nombre']; ?>|| Autos en San Rafael || Venta y Compra || Clasificados SRL || San Rafael || </title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="description" lang="es" content="Clasificados SRL :: Clasificados en San Rafael :: Articulos venta y compra de electrodomesticos, tv, audio, video, computacion, animales celulares, deportes, antiguedades, juguetes, ropa, muebles, etc en  SAN RAFAEL.. clasificados.sanrafaellate.com.ar "/>
<meta name="keywords" lang="es" content="Clasificados, San Rafael, Mendoza, Empleos, Inmubeles, Propiedades, articulos, educacionales, judiciales, legales, profesionales " />
<META NAME="Copyright" CONTENT="sanrafaellate.com.ar" />
<!-- InstanceEndEditable -->
<link href="../clasificados.css" rel="stylesheet" type="text/css" /><style type="text/css">
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
.style2 {font-family: Geneva, Arial, Helvetica, sans-serif}
-->
</style>
<!-- InstanceEndEditable -->
<script>
function abrirpopup(nombre,ancho,alto) {
dat = 'width=' + ancho + ',height=' + alto + ',left=300,top=100,scrollbars=no,resize=no';
window.open(nombre,'',dat)
}
</script>
<script src="../../Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
</head>

<body>
<table width="859" border="0" align="left" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="2" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="415" height="100" valign="middle"><div><a href="http://srlclasificados.com.ar"><img src="../imagenes/cabecera2.jpg" alt="SRL CLASIFICADOS :: Clasificados en San Rafael :: " width="350" height="78" border="0" align="middle" /><br />
            </a>
                <div>
                  <div align="center"><a href="http://srlclasificados.com.ar"><span class="texto_negro"><strong>www.</strong></span><span class="titulo_anuncios style1"><strong>srl</strong></span><span class="texto_negro"><strong>clasificados.com.ar</strong></span></a></div>
                </div>
          <a href="http://srlclasificados.com.ar"> </a> </div></td>
        <td width="444" align="center" valign="middle"><div align="center">
                    <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="400" height="80" align="absmiddle">
            <param name="movie" value="../publicidad/sec-top.swf" />
            <param name="quality" value="high" />
            <embed src="../publicidad/sec-top.swf" width="400" height="80" align="absmiddle" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash"></embed>
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
        <td width="28%"><div align="center"><a href="../registro_usuarios.php">Registrate GRATIS!!</a> </div></td>
        <td width="26%"><div align="center"><?php 	if (isset( $_SESSION['MM_Username'])) { ?><a href="../sistema/">Mi Cuenta</a>  <?php } else { ?><a href="../publique_anuncio.php">Publique Anuncio</a><?php } ?></div></td>
        <td width="16%"><div align="center"><a href="../ayuda.php"></a><a href="../publicidad.php">Publicidad</a></div></td>
        <td width="15%"><div align="center"><a href="../contacto.php">Contacto</a></div></td>
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
          <td width="64%"><div class="texto_anuncio">
            <div align="right">
              <div class="texto_anuncio">
                <div align="right"><a href="#" onclick="abrirpopup('../sistema/guardar_anuncios_inmueble.php?anuncio_id=<?php echo $row_Recordset1['inmuebles_id']; ?>',450,450)"></a></div>
              </div>
            </div>
          </div></td>
        </tr>
        <tr>
          <td class="rubros"><a href="../index.php">Inicio&gt;&gt;</a> <a href="inmuebles_san_rafael.php">Inmuebles&gt;&gt;</a></td>
        </tr>
        <tr>
          <td height="30" bgcolor="#EBEBEB" class="texto_opciones"><table width="100%" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td width="31%"><strong class="rubros_articulos_seleccionado"><?php echo $row_Recordset1['nombre']; ?></strong></td>
                <td width="2%">&nbsp;</td>
                <td width="67%"><div align="right"></div></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td bgcolor="#FFFFFF"><div align="right">
            <table width="100%" border="0" cellpadding="0" cellspacing="0" class="linea_detalles">
              <tr>
                <td width="3%">&nbsp;</td>
                <td width="57%" valign="middle"><div align="right"><a href="#" onclick="abrirpopup('../sistema/guardar_anuncios_inmueble.php?anuncio_id=<?php echo $row_Recordset1['inmuebles_id']; ?>',450,450)"><img src="../iconos/agrega_favoritos.jpg" alt="Agregar a favoritos" width="25" height="25" border="0" title="Agregue Anuncio a Anuncios Guardados" /><span class="texto_link_chico">guadar para seguimiento</span></a></div></td>
                <td width="4%" valign="middle">&nbsp;</td>
                <td width="14%" valign="middle"><div align="left"><span class="texto_link_chico"><a href="#" onclick="abrirpopup('../sistema/guardar_anuncio.php?anuncio_id=<?php echo $row_Recordset1['articulos_id']; ?>&amp;&amp;base_datos=articulos',450,450)"> </a></span><a  href="#" onclick="abrirpopup('../sistema/imprimir_anuncio_inmueble.php?anuncio_id=<?php echo $row_Recordset1['inmuebles_id']; ?>',450,500)"><img src="../iconos/imprimir.png" alt="Imprimir anuncio" width="25" height="25" border="0"  title="Imprima Anuncio" /><span class="texto_link_chico">imprimir</span></a></div></td>
                <td width="2%" valign="middle">&nbsp;</td>
                <td width="20%" valign="middle"><div align="left"><a  href="#" onclick="abrirpopup('../sistema/enviarxemail_inmuebles.php?anuncio_id=<?php echo $row_Recordset1['inmuebles_id']; ?>',450,600)"><img src="../iconos/email-enviar.png" alt="Enviar por Mail" width="30" height="30" border="0" /></a><a  href="#" class="texto_link_chico" onclick="abrirpopup('../sistema/enviarxemail_inmuebles.php?anuncio_id=<?php echo $row_Recordset1['inmuebles_id']; ?>',450,600)">Enviar a un amigo</a></div></td>
              </tr>
            </table>
          </div></td>
        </tr>
        <tr>
          <td bgcolor="#FFFFFF"><table width="100%" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td width="46%" height="15" rowspan="2" valign="top" class="division_detalles_fotos"><?php if ($row_Recordset1['imagen'] != NULL) {?>
                <img src="../fotos-clasificados/autos/<?php echo $row_Recordset1['articulos_id']; ?>.jpg" width="200" height="200" hspace="2" vspace="2" />
                <?php } else {?>
                <img src="../fotos-clasificados/sin_imagen.jpg" width="200" height="200" hspace="2" vspace="2" />                <?php }  ?></td>
              <td width="54%" valign="top" class="contenedor_opciones"><table width="97%" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="50" class="texto_negro" height="40"><strong>Precio:</strong></td>
                  <td width="205" class="textoguias">$<?php echo $row_Recordset1['precio']; ?></td>
                </tr>
                
                <tr>
                  <td width="50" class="texto_negro"><strong>Publicado el: </strong></td>
                  <td class="texto_opciones"><?php echo $row_Recordset1['fecha']; ?></td>
                </tr>
                <tr>
                  <td class="texto_negro"><strong>Tipo:</strong></td>
                  <td class="texto_opciones"><?php echo $row_Recordset1['tipo_inmueble']; ?></td>
                </tr>
                <tr>
                  <td class="texto_negro"><strong>Operacion</strong></td>
                  <td class="texto_opciones"><span class="texto_opciones"><?php echo $row_Recordset1['operacion']; ?></span></td>
                </tr>
                <tr>
                  <td width="50" class="linea_detalles">&nbsp;</td>
                  <td class="linea_detalles">&nbsp;</td>
                </tr>
                <tr>
                  <td height="23" colspan="2" bgcolor="#F9F9F9" class="texto_negro"><strong> Datos Vendedor </strong></td>
                  </tr>
                <tr>
                  <td colspan="2" bgcolor="#F9F9F9" class="rubros_articulos"><?php echo $row_Recordset2['usuario']; ?></td>
                  </tr>
                <tr>
                  <td colspan="2" bgcolor="#F9F9F9" class="texto_anuncio">Mienbro desde<span class="fecha_anuncio"> <?php echo $row_Recordset2['fecha']; ?></span></td>
                  </tr>
                <tr>
                  <td width="50" bgcolor="#F9F9F9" class="texto_negro"><span class="style2">Empresa:</span></td>
                  <td bgcolor="#F9F9F9" class="texto_opciones"><strong><span class="division_detalles_fotos">
                    <?php if ($row_Recordset1['imagen'] != NULL) {?>
                  </span><?php echo $row_Recordset2['empresa']; ?><span class="division_detalles_fotos">
                  <?php } else { echo "Particular";}?>
                  </span></strong></td>
                </tr>
                <tr>
                  <td width="50" bgcolor="#F9F9F9" class="texto_negro"><span class="style2">Telefono</span></td>
                  <td bgcolor="#F9F9F9" class="texto_opciones"><strong><?php echo $row_Recordset2['telefono']; ?></strong></td>
                </tr>
                <tr>
                  <td bgcolor="#F9F9F9" class="texto_negro">Email:</td>
                  <td bgcolor="#F9F9F9" class="texto_opciones"><strong><?php echo $row_Recordset2['email']; ?></strong></td>
                </tr>
                <tr>
                  <td width="50" bgcolor="#F9F9F9" class="linea_detalles">&nbsp;</td>
                  <td bgcolor="#F9F9F9" class="linea_detalles">&nbsp;</td>
                </tr>
              </table></td>
            </tr>
            <tr>
              <td height="231" valign="top" class="linea_detalles"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td class="texto_panel">Descripcion</td>
                </tr>
                <tr>
                  <td class="texto_opciones"><?php echo $row_Recordset1['anuncio']; ?></td>
                </tr>
                <tr>
                  <td class="texto_opciones">&nbsp;</td>
                </tr>
              </table></td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td height="60" bgcolor="#FFFFFF"><a href="../articulos/articulos.php" class="texto_anuncio">El vendedor de este aviso asume la total responsabilidad de la presente  publicaci&oacute;n. Si consider&aacute;s que este aviso contradice las pol&iacute;ticas de  nuestro sitio. Hac&eacute;  click ac&aacute;.</a></td>
        </tr>
        <tr>
          <td height="22">&nbsp;</td>
        </tr>
      </table>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td height="29" bgcolor="#000000"><div class="texto_opciones"><span class="rubros_articulos_seleccionado">Preguntas  al Vendedor</span> </div>          </td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><div align="center">
              <p class="texto_anuncio"><a href="#" class="texto_link_chico" onclick="abrirpopup('../sistema/hacer_pregunta.php?clasi_id=<?php echo $row_Recordset1['inmuebles_id']; ?>&&tipo_clasi=inmuebles&&usuario_art_id=<?php echo $row_Recordset1['usuario_id']; ?>',600,450)"><strong>Hacer Pregunta</strong> (solo usuarios registrados) &gt;&gt;</a></p>
          </div></td>
        </tr>
        <tr>
          <td class="texto_opciones"><?php do { ?>
              <table width="100%" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="23" bgcolor="#FFFFFF"></td>
                  <td width="23" bgcolor="#FFFFFF" ></td>
                </tr>
                <tr>
                  <td width="330" bgcolor="#E2E2E2"><strong class="Estilo7">Pregunta</strong>:</td>
                  <td width="219" bgcolor="#E2E2E2" class="rubros_articulos_seleccionado"><span class="texto_negro"><strong>Usuario:</strong></span><?php echo $row_Recordset3['usuario_pregunta']; ?></td>
                </tr>
                <tr>
                  <td colspan="2" bgcolor="#E2E2E2" class="linea_diferencial"><span class="texto_opciones"><strong><span class="texto_negro">
                    <?php if ($row_Recordset3['pregunta_id'] != NULL) {?>
                  </span></strong>
                      </span><span class="texto_negro"><?php echo $row_Recordset3['pregunta']; ?>
                      </span><span class="texto_opciones">
                      <?php }  else { echo ' no hay preguntas a este clasificado' ;} ?>
                      </span></td>
                </tr>
                <tr>
                  <td bgcolor="#FFDDD5" class="linea_diferencial"> <span class="Estilo7">Respuesta Vendedor</span><strong><span class="texto_negro">:
                    </span></strong></td>
                  <td bgcolor="#FFDDD5" class="sos_nuevo">&nbsp;</td>
                </tr>
                <tr>
                  <td colspan="2" bgcolor="#FFDDD5" class="texto_opciones"><strong><span class="texto_negro">
                    <?php if ($row_Recordset3['respuesta'] != NULL) {?>
                  </span></strong><span class="texto_opciones"><?php echo $row_Recordset3['respuesta']; ?>
                  <?php } else { echo '<span class="testo_opciones" >no tiene respuesta todavia</span>' ;}?>
                  </span></td>
                </tr>
                <tr></tr>
              </table>
          <?php } while ($row_Recordset3 = mysql_fetch_assoc($Recordset3)); ?></td>
        </tr>
      </table>
      <p align="center">&nbsp;</p>
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
            <td align="left" valign="middle"><a href="../autos_san_rafael/autos_san_rafael.php"><img src="../imagenes/automotores.jpg" alt="automotores en san rafael" width="40" height="40" border="0" /></a></td>
            <td align="left" valign="middle" class="rubros"><a href="../autos_san_rafael/autos_san_rafael.php">Automotores</a> </td>
            <td><img src="../imagenes/propiedades.jpg" alt="propiedades en san rafael" width="40" height="40" /></td>
            <td class="rubros"><a href="inmuebles_san_rafael.php">Inmuebles</a></td>
          </tr>
          <tr>
            <td width="14%"><img src="../imagenes/empleos.jpg" alt="EMPLEOS EN SAN RAFAEL" width="40" height="40" /></td>
            <td width="27%" class="rubros"><a href="../empleos/empleos.php">Empleo</a></td>
            <td width="13%"><img src="../imagenes/profesionales.jpg" alt="profesionales en san rafael" width="40" height="40" /></td>
            <td width="46%" class="rubros"><a href="../profesionales/profesionales.php">Guia de Profesionales </a></td>
          </tr>
          <tr>
            <td><img src="../imagenes/judiciales.jpg" alt="Judiciales, legales en san rafael" width="40" height="40" /></td>
            <td class="rubros"><a href="../legales/legales.php">Legales</a></td>
            <td><img src="../imagenes/educacionales.jpg" alt="educaconales en san rafael" width="40" height="40" /></td>
            <td class="rubros"><a href="../educacionales/educacionales.php">Educacionales</a></td>
          </tr>
          <tr>
            <td><img src="../imagenes/articulos.jpg" alt="Judiciales, legales en san rafael" width="40" height="40" /></td>
            <td class="rubros"><a href="../articulos/articulos.php">Articulos</a></td>
            <td width="13%"><img src="../imagenes/servicios.jpg" alt="educaconales en san rafael" width="40" height="40" /></td>
            <td class="rubros"><a href="../servicios/servicios.php">Servicios</a></td>
          </tr>
          <tr>
            <td><img src="../iconos/icono-Industria.gif" alt="Guia Empresas de San Rafael" width="40" height="40" /></td>
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
                  <td width="50" height="25"><img src="../iconos/panel_control.jpg" alt="Ir a Panel Control Clasificados San Rafael Late" width="50" height="50" /></td>
                  <td colspan="3"><a href="../sistema/index.php">Ir a Panel de Control </a></td>
                </tr>
                <tr>
                  <td><img src="../iconos/panel_escribir.jpg" alt="Escribi tu anuncio en Clasificados San Rafael Late" width="48" height="48" /></td>
                  <td width="133"><a href="../sistema/publique_anuncio.php">Publicar Anuncio </a></td>
                  <td width="51"><img src="../iconos/ayuda-C.jpg" alt="Ayuda del sistema clasificados San Rafael Late" width="50" height="50" /></td>
                  <td width="69"><a href="../sistema/publique_anuncio.php">Ayuda</a></td>
                </tr>
                <tr>
                  <td><img src="../iconos/salir-c.jpg" alt="Salir - Desconetar Usuario" width="50" height="50" /></td>
                  <td colspan="3"><a href="<?php echo $logoutAction ?>" class="titulo_anuncios">Desconectar</a></td>
                </tr>
              </table>
			</div>
			  <?php } else { ?>
        <br/>
		
        <form id="form2" name="form2" method="POST" action="../login.php">
          <table width="97%" height="113" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td height="27" colspan="3" align="center" valign="middle" class="rubros_articulos_seleccionado"><div align="left">
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="19%"><img src="../imagenes/usuario.gif" alt="usuario de san rafael late" width="39" height="34" /></td>
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
              <td height="19" colspan="3" valign="top" bgcolor="#FFFFFF" class="texto_anuncio"><span class="texto_link_chico"><a href="olvide_contrase&ntilde;a.php">olvidaste tu contrase&ntilde;a ?</a> -<a href="../registro.php"> Registrate Aqui &gt;&gt;</a><a href="#"></a></span> </td>
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
        <td width="28%"><div align="center"><a href="../registro_usuarios.php">Registrate GRATIS!!</a> </div></td>
        <td width="26%" height="25"><div align="center"><a href="../publicidad.php"></a><a href="../publique_anuncio.php">Publique un Anuncio</a></div></td>
        <td width="16%"><div align="center"><a href="../ayuda.php"></a><a href="../publicidad.php">Publicidad</a></div></td>
        <td width="15%"><div align="center"><a href="../contacto.php">Contacto</a></div></td>
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
mysql_free_result($Recordset4);

mysql_free_result($Recordset1);

mysql_free_result($Recordset2);

mysql_free_result($Recordset3);
?>
