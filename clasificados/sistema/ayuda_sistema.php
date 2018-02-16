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
?>
<?php
if (!isset($_SESSION)) {
  session_start();
}
$MM_authorizedUsers = "";
$MM_donotCheckaccess = "true";

// *** Restrict Access To Page: Grant or deny access to this page
function isAuthorized($strUsers, $strGroups, $UserName, $UserGroup) { 
  // For security, start by assuming the visitor is NOT authorized. 
  $isValid = False; 

  // When a visitor has logged into this site, the Session variable MM_Username set equal to their username. 
  // Therefore, we know that a user is NOT logged in if that Session variable is blank. 
  if (!empty($UserName)) { 
    // Besides being logged in, you may restrict access to only certain users based on an ID established when they login. 
    // Parse the strings into arrays. 
    $arrUsers = Explode(",", $strUsers); 
    $arrGroups = Explode(",", $strGroups); 
    if (in_array($UserName, $arrUsers)) { 
      $isValid = true; 
    

// Or, you may restrict access to only certain users based on their username. 
    if (in_array($UserGroup, $arrGroups)) { 
      $isValid = true; 
    

if (($strUsers == "") && true) { 
      $isValid = true; 
    

} 
  return $isValid; 
}

$MM_restrictGoTo = "../registro.php";
if (!((isset($_SESSION['MM_Username'])) && (isAuthorized("",$MM_authorizedUsers, $_SESSION['MM_Username'], $_SESSION['MM_UserGroup'])))) {   
  $MM_qsChar = "?";
  $MM_referrer = $_SERVER['PHP_SELF'];
  if (strpos($MM_restrictGoTo, "?")) $MM_qsChar = "&";
  if (isset($QUERY_STRING) && strlen($QUERY_STRING) > 0) 
  $MM_referrer .= "?" . $QUERY_STRING;
  $MM_restrictGoTo = $MM_restrictGoTo. $MM_qsChar . "accesscheck=" . urlencode($MM_referrer);
  header("Location: ". $MM_restrictGoTo); 
  exit;
}
}
}
}
?>
<?php
$colname_Recordset1 = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_Recordset1 = (get_magic_quotes_gpc()) ? $_SESSION['MM_Username'] : addslashes($_SESSION['MM_Username']);
}
mysql_select_db($database_clasificados, $clasificados);
$query_Recordset1 = sprintf("SELECT * FROM usuarios WHERE usuario = '%s'", $colname_Recordset1);
$Recordset1 = mysql_query($query_Recordset1, $clasificados) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/sistemaclasi.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Mi Cuenta || Clasificados SRL ||</title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="description" lang="es" content="Clasificados SRL :: Clasificados en San Rafael :: Estas buscando empleo, Trabajo en SAn RAfael Mendoza entonces estas en el lugar correcto... Ponemos a Tu disposicion toda la oferta laboral de san rafael y Alrrededores.. Empleos Trabajo, Laboral CLASIFICADOS EN SAN RAFAEL.. clasificados.sanrafaellate.com.ar "/>
<meta name="keywords" lang="es" content="Clasificados, San Rafael, Mendoza, Empleos, Inmubeles, Propiedades, articulos, educacionales, judiciales, legales, profesionales " />
<META NAME="Copyright" CONTENT="sanrafaellate.com.ar" />
<!-- InstanceEndEditable -->
<link href="../clasificados.css" rel="stylesheet" type="text/css" /><style type="text/css">
<script>
function abrirpopup(nombre,ancho,alto) {
dat = 'width=' + ancho + ',height=' + alto + ',left=300,top=100,scrollbars=no,resize=no';
window.open(nombre,'',dat)
}
</script>
<!--
body {
	margin-left: 5px;
	margin-top: 0px;
	margin-right: 0px;
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
.style1 {font-size: 14px}
-->
</style>
<!-- InstanceBeginEditable name="head" --><!-- InstanceEndEditable -->
</head>

<body>
<table width="859" border="0" align="left" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="400" height="100" valign="middle"><div><a href="http://srlclasificados.com.ar"><img src="../imagenes/cabecera2.jpg" alt="SRL CLASIFICADOS :: Clasificados en San Rafael :: " width="350" height="78" border="0" align="middle" /><br />
            </a>
                <div>
                  <div align="center"><a href="http://srlclasificados.com.ar"><span class="texto_negro"><strong>www.</strong></span><span class="titulo_anuncios style1"><strong>srl</strong></span><span class="texto_negro"><strong>clasificados.com.ar</strong></span></a></div>
                </div>
          <a href="http://srlclasificados.com.ar"> </a> </div></td>
        <td><div align="center">
          <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="400" height="80" align="middle">
            <param name="movie" value="../publicidad/sistema-top.swf" />
            <param name="quality" value="high" />
            <embed src="../publicidad/sistema-top.swf" width="400" height="80" align="middle" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash"></embed>
          </object>
        </div></td>
      </tr>
    </table>
    </td>
  </tr>
  <tr>
    <td bgcolor="#F90000"><table width="97%" height="15" border="0" cellpadding="0" cellspacing="0" class="menu_superior">
      <tr>
        <td width="15%"><div align="center"> <a href="http://clasificados.sanrafaellate.com.ar">Inicio</a> </div></td>
        <td width="28%"><div align="center"><a href="../../Templates/registro.php">Contacto</a> </div></td>
        <td><div align="center"><a href="../publicidad.php"></a>Bienvenido, <?php echo $_SESSION['MM_Username'] ;?>, <a href="<?php echo $logoutAction ?>" class="texto_verde">SALIR</a></div>          </td>
        </tr>
    </table></td>
    <td height="24" bgcolor="#F90000" class="titulos_fecha">
    <div align="center" class="titulos_fecha">
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

	var dayarray=new Array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","S&aacute;bado");
	var montharray=new Array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
	document.write("<small><font color='000000' face='Arial'><b>"+ dayarray[day] + " " + daym + " de " + montharray[month] + " de " + year + "</b></font></small>");

          </script>
     
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
          <td width="100%">&nbsp;</td>
        </tr>
        <tr>
          <td class="titulos_seccion">AYUDA DEL SISTEMA </td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
      </table>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="23%" height="77"><a href="publique_anuncio.php"><img src="../iconos/escribir-anuncio.jpg" alt="Escribir Anuncio" width="50" height="50" border="0" /></a></td>
              <td width="77%"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td class="texto_panel">Escribir   Anuncio </td>
                </tr>
                <tr>
                  <td height="50" class="texto_opciones">En esta seccion podras escribir tus anuncios clasificados ya sea de inmubles, autos, profesionales, servicios, etc. Mediante el llenado de formularios especificos de los rubros. </td>
                </tr>
              </table></td>
            </tr>
            <tr>
              <td height="69"><a href="mis_anuncios.php"><img src="../iconos/Avisos-publicados.jpg" alt="Mis anuncios" width="50" height="50" border="0" /></a></td>
              <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td class="texto_panel">Mis Anuncios </td>
                </tr>
                <tr>
                  <td height="42" class="texto_opciones">Aqui se guardaran todos sus anuncios clasificados que publiques en nuestro portal separados por rubros para tener control de los productos que promocionas o vendes. </td>
                </tr>
              </table></td>
            </tr>
            <tr>
              <td height="61"><a href="mis_datos.php"><img src="../iconos/mis-datos.png" alt="Modificar Datos" width="50" height="50" border="0" /></a></td>
              <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td class="texto_panel">Mis Datos </td>
                </tr>
                <tr>
                  <td class="texto_opciones">En esta seccion estan sus datos referedidos a su registracion en <span class="sos_nuevo"><strong>SRL</strong></span><strong> CLASIFICADOS </strong>puediendo modificarlos si asi lo deseea. </td>
                </tr>
              </table></td>
            </tr>
            <tr>
              <td height="100"><a href="anuncios_guadados.php"><img src="../iconos/favoritos.jpg" alt="Avisos Favoritos" width="50" height="50" border="0" /></a></td>
              <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td class="texto_panel">Anuncios Guardados </td>
                </tr>
                <tr>
                  <td class="texto_opciones">En esta seccion se guardaran todos los anuncios que a ud le interese seguir, ver en otro momento, guardar para enviar a un amigo, etc. Esto lo realiza haciendo clic en este econo <img src="../iconos/agrega_favoritos.jpg" width="25" height="25" border="0" title="Agregue Anuncio a Anuncios Guardados" /> en los anuncios publicados </td>
                </tr>
              </table></td>
            </tr>
            <tr>
              <td height="96"><a href="agregar_curriculum.php"><img src="../iconos/curriculum.png" alt="Envianos Tu Curriculum" width="50" height="50" border="0" /></a></td>
              <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td class="texto_panel">Redacta tu curriculum </td>
                </tr>
                <tr>
                  <td class="texto_opciones">Aqui podras redactar tu curriculum vitae para que otras personas puedar verlo sin necesidad de papeles ni de carpetas, pudiendo dar enviar tu curriculum a cosillas de correos o referenciar  mediante el envio del link  de tu curriculum viate donde podran imprmirlo. </td>
                </tr>
              </table></td>
            </tr>

            <tr>
              <td><a href="<?php echo $logoutAction ?>"><img src="../iconos/salir.png" alt="Salir" width="50" height="50" border="0" /></a></td>
              <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td class="texto_panel">Salir</td>
                </tr>
                <tr>
                  <td class="texto_opciones">Salir de tu cuenta em <span class="sos_nuevo"><strong>SRL</strong></span><strong> CLASIFICADOS </strong></td>
                </tr>
              </table></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td colspan="2">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="2">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="2">&nbsp;</td>
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
            <td width="14%" align="left" valign="middle"><img src="../imagenes/automotores.jpg" alt="automotores en san rafael" width="40" height="40" border="0" /></td>
            <td width="27%" align="left" valign="middle" class="rubros"><a href="../autos_san_rafael/autos_san_rafael.php">Automotores</a> </td>
            <td width="13%"><img src="../imagenes/propiedades.jpg" alt="propiedades en san rafael" width="40" height="40" /></td>
            <td width="46%" class="rubros"><a href="../propiedades_san_rafael/inmuebles_san_rafael.php">Inmuebles</a></td>
          </tr>
          <tr>
            <td><img src="../imagenes/empleos.jpg" alt="EMPLEOS EN SAN RAFAEL" width="40" height="40" /></td>
            <td class="rubros"><a href="../empleos/empleos.php">Empleo</a></td>
            <td width="13%"><img src="../imagenes/profesionales.jpg" alt="profesionales en san rafael" width="40" height="40" /></td>
            <td class="rubros"><a href="../profesionales/profesionales.php">Guia de Profesionales </a></td>
          </tr>
          <tr>
            <td><img src="../imagenes/judiciales.jpg" alt="Judiciales, legales en san rafael" width="40" height="40" /></td>
            <td class="rubros"><a href="../legales/legales.php">Legales</a></td>
            <td><img src="../imagenes/educacionales.jpg" alt="educaconales en san rafael" width="40" height="40" /></td>
            <td class="rubros"><a href="../educacionales/educacionales.php">Educacionales</a></td>
          </tr>
          <tr>
            <td height="45"><img src="../imagenes/articulos.jpg" alt="Judiciales, legales en san rafael" width="40" height="40" /></td>
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
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="15" colspan="3" bgcolor="#FFFFFF" class="menu_superior">&nbsp;</td>
          </tr>
          <tr>
            <td height="28" colspan="3" bgcolor="#FF0000" class="menu_superior"><div align="center">Herramientas PANEL CONTROL </div></td>
            </tr>
          <tr>
            <td width="29%" height="25" class="rubros"><div align="center"><a href="index.php"></a><a href="index.php"><img src="../iconos/panel_control.jpg" alt="pANE cONTROL" width="30" height="30" border="0" /></a></div>
              <div align="center"><a href="index.php">Inicio Panel </a></div></td>
            <td width="44%" class="rubros"><div align="center"><a href="index.php"><img src="../iconos/panel_escribir.jpg" alt="eSCRIBIR TU ANUNCIO CLASIFICADOS" width="30" height="30" border="0" /></a></div>
              <div align="center"><a href="publique_anuncio.php">escribir anuncio </a></div></td>
            <td width="27%" class="rubros">
              <div align="center"><img src="../iconos/Avisos-publicados-c.jpg" alt="Mis anuncios Publicados" width="30" height="30" /></div>
              <div align="center"><a href="mis_anuncios.php">mis anuncios </a></div></td>
          </tr>
          <tr>
            <td class="rubros"><div align="center"><a href="mis_datos.php"><img src="../iconos/mis-datos-C.png" alt="mis datos " width="30" height="30" border="0" /></a></div>
              <div align="center"><a href="mis_datos.php">mis datos </a></div></td>
            <td class="rubros"><div align="center"><a href="anuncios_guadados.php"><img src="../iconos/anuncio-guardados.jpg" width="30" height="30" border="0" /></a></div>
              <div align="center"><a href="anuncios_guadados.php">anuncios guardados </a></div></td>
            <td class="rubros"><div align="center"><a href="agregar_curriculum.php"><img src="../iconos/curriculum-C.png" alt="redata tu curriculum" width="30" height="30" border="0" /></a></div>
              <div align="center"><a href="agregar_curriculum.php">redactar curriculum </a></div></td>
          </tr>
        </table>
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
        <td width="28%"><div align="center"><a href="../../Templates/registro.php">Registrate GRATIS!!</a> </div></td>
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
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
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
