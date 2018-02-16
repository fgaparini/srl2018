<?php require_once('../../Connections/clasificados.php'); ?>
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

$currentPage = $_SERVER["PHP_SELF"];

$colname_Recordset2 = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_Recordset2 = $_SESSION['MM_Username'];
}
mysql_select_db($database_clasificados, $clasificados);
$query_Recordset2 = sprintf("SELECT * FROM usuarios WHERE usuario = %s", GetSQLValueString($colname_Recordset2, "text"));
$Recordset2 = mysql_query($query_Recordset2, $clasificados) or die(mysql_error());
$row_Recordset2 = mysql_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysql_num_rows($Recordset2);

$maxRows_usuario_pregunta = 5;
$pageNum_usuario_pregunta = 0;
if (isset($_GET['pageNum_usuario_pregunta'])) {
  $pageNum_usuario_pregunta = $_GET['pageNum_usuario_pregunta'];
}
$startRow_usuario_pregunta = $pageNum_usuario_pregunta * $maxRows_usuario_pregunta;

$user_usuario_pregunta = "-1";
if (isset($_SESSION['MM_Username'])) {
  $user_usuario_pregunta = $_SESSION['MM_Username'];
}
mysql_select_db($database_clasificados, $clasificados);
$query_usuario_pregunta = sprintf("SELECT * FROM preguntas, usuarios WHERE usuarios.usuario=%s AND  preguntas.usuario_art_id=usuarios.id_usuario  ", GetSQLValueString($user_usuario_pregunta, "text"));
$query_limit_usuario_pregunta = sprintf("%s LIMIT %d, %d", $query_usuario_pregunta, $startRow_usuario_pregunta, $maxRows_usuario_pregunta);
$usuario_pregunta = mysql_query($query_limit_usuario_pregunta, $clasificados) or die(mysql_error());
$row_usuario_pregunta = mysql_fetch_assoc($usuario_pregunta);

if (isset($_GET['totalRows_usuario_pregunta'])) {
  $totalRows_usuario_pregunta = $_GET['totalRows_usuario_pregunta'];
} else {
  $all_usuario_pregunta = mysql_query($query_usuario_pregunta);
  $totalRows_usuario_pregunta = mysql_num_rows($all_usuario_pregunta);
}
$totalPages_usuario_pregunta = ceil($totalRows_usuario_pregunta/$maxRows_usuario_pregunta)-1;

$queryString_usuario_pregunta = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_usuario_pregunta") == false && 
        stristr($param, "totalRows_usuario_pregunta") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_usuario_pregunta = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_usuario_pregunta = sprintf("&totalRows_usuario_pregunta=%d%s", $totalRows_usuario_pregunta, $queryString_usuario_pregunta);

$queryString_Recordset1 = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_Recordset1") == false && 
        stristr($param, "totalRows_Recordset1") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_Recordset1 = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_Recordset1 = sprintf("&totalRows_Recordset1=%d%s", $totalRows_Recordset1, $queryString_Recordset1);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/sistemaclasi.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Clasificados San Rafael Mi Cuenta</title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="description" lang="es" content="Clasificados SRL :: Clasificados en San Rafael :: Estas buscando empleo, Trabajo en SAn RAfael Mendoza entonces estas en el lugar correcto... Ponemos a Tu disposicion toda la oferta laboral de san rafael y Alrrededores.. Empleos Trabajo, Laboral CLASIFICADOS EN SAN RAFAEL.. clasificados.sanrafaellate.com.ar "/>
<meta name="keywords" lang="es" content="Clasificados, San Rafael, Mendoza, Empleos, Inmubeles, Propiedades, articulos, educacionales, judiciales, legales, profesionales " />
<META NAME="Copyright" CONTENT="sanrafaellate.com.ar" />
<script>
function abrirpopup (nombre,ancho,alto) {
dat = 'width=' + ancho + ',height=' + alto + ',left=300,top=100,scrollbars=no,resize=no';
window.open(nombre,'',dat)
}
</script>
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
    </table>    </td>
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
      <table width="100%" border="0" cellspacing="0" cellpadding="0"><tr><td class="texto_link_chico"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="100%"><a href="index.php">mi cuenta</a> &gt;&gt; <a href="preguntas.php">pregusntas</a> &gt;&gt; preguntas a tus avisos</td>
        </tr>
        <tr>
          <td class="titulos_seccion">MI CUENTA &gt;&gt; <span class="RUBRO_TITULOS">Preguntas a tus avisos</span></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td class="rubros_articulos_seleccionado">Preguntas a tus Articulos</td>
        </tr>
        <tr>
          <td class="rubros_articulos_seleccionado">&nbsp;</td>
        </tr>
        <tr>
          <td class="texto_negro"><?php if ($totalRows_usuario_pregunta == NULL ) {
		  echo ' No tienes preguntas realizadas a tus anuncios clasificados'; } else {?>
              <?php do { ?>
              <table width="100%" border="0" cellpadding="0" cellspacing="0" class="-linea_inf_verde">
                <tr>
                  <td><table width="547" border="0" cellpadding="0" cellspacing="0" bordercolor="#ECE9D8" bgcolor="#FFFFFF" class="recuadro_1"><tr bgcolor="#F7F7F7"></tr>
                  </table></td>
                </tr>
                <tr>
                  <td><table width="547" border="0" cellpadding="0" cellspacing="0" bordercolor="#ECE9D8" bgcolor="#FFFFFF">
                    <tr>
                      <td height="20px" colspan="4" align="left" valign="middle" bgcolor="#000066" class="texto_blanco"><p class="texto_blanco">Clasificado</p></td>
                    </tr>
                    <tr>
                      <td height="25" colspan="4" align="left" valign="top" bgcolor="#E8E8FF" class="texto_negro"><div align="left">
                        <table width="100%" border="0" cellspacing="1" cellpadding="0">
                            <tr>
                              <td width="54" height="25" align="left" bgcolor="#E8E8FF" class="texto_negro"><strong>
                                <?php $tipo_clasi = $row_usuario_pregunta['tipo_clasi'] ;
			$clasi_id=$row_usuario_pregunta['clasificado_id'];
			$rubro =  $tipo_clasi.'_id';
			mysql_select_db($database_clasificados, $clasificados);
$query_clasificado_pregunta = "SELECT * FROM $tipo_clasi WHERE $rubro = $clasi_id ORDER BY fecha 
ASC";
$clasificado_pregunta = mysql_query($query_clasificado_pregunta, $clasificados) or die(mysql_error());
$row_clasificado_pregunta = mysql_fetch_assoc($clasificado_pregunta);
$totalRows_clasificado_pregunta = mysql_num_rows($clasificado_pregunta);
?>
                                Titulo:</strong></td>
                              <td width="302" height="25" align="left" bgcolor="#E8E8FF" class="texto_negro"><strong class="sos_nuevo"><?php echo $row_clasificado_pregunta['nombre']; ?></strong></td>
                              <td width="36" height="25" align="left" bgcolor="#E8E8FF" class="texto_negro"><div align="center"><strong>Id n&ordm;</strong></div></td>
                              <th width="150" height="25" align="left" bgcolor="#E8E8FF" class="sos_nuevo"><?php echo $clasi_id; ?></th>
                            </tr>
                          </table>
                      </div></td>
                    </tr>
                    <tr bgcolor="#F7F7F7">
                      <td height="24" colspan="4" align="left" valign="top" bgcolor="#E8E8FF" class="texto_negro"><strong>Anuncio:</strong> <?php echo $row_clasificado_pregunta['anuncio']; ?></td>
                    </tr>
                    <tr bgcolor="#F7F7F7">
                      <td colspan="4" align="left" bgcolor="#E8E8FF" class="texto_negro"><div align="left"><strong>Fecha: </strong><strong class="fecha_anuncio"><?php echo $row_clasificado_pregunta['fecha']; ?></strong></div>
                          <div align="left"></div></td>
                    </tr>
                    <tr>
                      <td width="40" height="10" align="left" bgcolor="#FFFFFF" class="texto_negro"><div align="left"></div></td>
                      <td width="428" height="10" align="left" bgcolor="#FFFFFF" class="textoguias"><div align="left"></div></td>
                      <td width="47" height="10" align="left" bgcolor="#FFFFFF" class="texto_negro"><div align="left"></div></td>
                      <td width="33" height="10" align="left" bgcolor="#FFFFFF" class="textoguias"><div align="left"></div></td>
                    </tr>
                    <tr bgcolor="#F7F7F7">
                      <td height="20px" colspan="4" valign="middle" bgcolor="#003300" class="texto_blanco"><p>Pregunta</p></td>
                    </tr>
                    <tr bgcolor="#F7F7F7">
                      <td height="26" colspan="4" bgcolor="#DFFFDF" class="texto_negro"><?php echo $row_usuario_pregunta['pregunta']; ?></td>
                    </tr>
                    <tr>
                      <td colspan="4" bgcolor="#DFFFDF"><strong>Pregunt&oacute;: <span class="sos_nuevo"><?php echo $row_usuario_pregunta['usuario_pregunta']; ?> </span></strong></td>
                    </tr>
                    <tr bgcolor="#F7F7F7">
                      <?php $tipo_clasi = $row_usuario_pregunta['tipo_clasi'] ;
			$clasi_id=$row_usuario_pregunta['clasificado_id'];
			$rubro =  $tipo_clasi.'_id';
			mysql_select_db($database_clasificados, $clasificados);
$query_clasificado_pregunta = "SELECT * FROM $tipo_clasi WHERE $rubro = $clasi_id ORDER BY fecha 
ASC";
$clasificado_pregunta = mysql_query($query_clasificado_pregunta, $clasificados) or die(mysql_error());
$row_clasificado_pregunta = mysql_fetch_assoc($clasificado_pregunta);
$totalRows_clasificado_pregunta = mysql_num_rows($clasificado_pregunta);
?>
                      <td colspan="4" align="left" bgcolor="#DFFFDF" class="texto_negro"><div align="left"><strong>Fecha: </strong><strong class="fecha_anuncio"><?php echo $row_usuario_pregunta['fecha_pregunta']; ?></strong></div>
                          <div align="left"></div></td>
                    </tr>
                    <tr>
                      <td height="10" colspan="4">&nbsp;</td>
                    </tr>
                    <tr>
                      <td height="22" colspan="4" valign="middle" bgcolor="#333333" class="texto_blanco"><p>Respuesta:</p></td>
                    </tr>
                    <tr>
                      <td colspan="4" bgcolor="#FFFFFF"><span>
                        <?php if ($row_usuario_pregunta['respuesta'] != NULL ) { ?>
                      </span><?php echo $row_usuario_pregunta['respuesta']; ?><span class="linea_detalles"><?php } else { echo 'no se formulo la respuesta todavia...';} ?>
                      </span> 
                        <?php if ($row_usuario_pregunta['respuesta'] == NULL ) { ?> 
                        <a href="#" onclick="abrirpopup('responder.php?pregunta_id=<?php echo $row_usuario_pregunta['pregunta_id']; ?>', 450, 300)">Responder &gt;&gt;</a>                        <?php } ?>                      </td>
                    </tr>
                    <tr>
                      <td colspan="4" bgcolor="#FFFFFF">&nbsp;</td>
                    </tr>
                    <tr></tr>
                  </table></td>
                </tr>
                <tr></tr>
              </table>
            <?php } while ($row_usuario_pregunta = mysql_fetch_assoc($usuario_pregunta)); ?>
            <?php } ?></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td class="texto_link_chico"><div align="center" class="texto_anuncio"> Registros <?php echo ($startRow_usuario_pregunta + 1) ?> a <?php echo min($startRow_usuario_pregunta + $maxRows_usuario_pregunta, $totalRows_usuario_pregunta) ?> de <?php echo $totalRows_usuario_pregunta ?> </div></td>
        </tr>
        <tr>
          <td align="center" class="texto_link_chico">&nbsp;
            <table border="0">
              <tr>
                <td><?php if ($pageNum_usuario_pregunta > 0) { // Show if not first page ?>
                    <a href="<?php printf("%s?pageNum_usuario_pregunta=%d%s", $currentPage, 0, $queryString_usuario_pregunta); ?>">Primero</a>
                    <?php } // Show if not first page ?>                </td>
                <td><?php if ($pageNum_usuario_pregunta > 0) { // Show if not first page ?>
                    <a href="<?php printf("%s?pageNum_usuario_pregunta=%d%s", $currentPage, max(0, $pageNum_usuario_pregunta - 1), $queryString_usuario_pregunta); ?>">Anterior</a>
                    <?php } // Show if not first page ?>                </td>
                <td><?php if ($pageNum_usuario_pregunta < $totalPages_usuario_pregunta) { // Show if not last page ?>
                    <a href="<?php printf("%s?pageNum_usuario_pregunta=%d%s", $currentPage, min($totalPages_usuario_pregunta, $pageNum_usuario_pregunta + 1), $queryString_usuario_pregunta); ?>">Siguiente</a>
                    <?php } // Show if not last page ?>                </td>
                <td><?php if ($pageNum_usuario_pregunta < $totalPages_usuario_pregunta) { // Show if not last page ?>
                    <a href="<?php printf("%s?pageNum_usuario_pregunta=%d%s", $currentPage, $totalPages_usuario_pregunta, $queryString_usuario_pregunta); ?>">&Uacute;ltimo</a>
                    <?php } // Show if not last page ?>                </td>
              </tr>
            </table>
            
            <div align="center"></div></td>
        </tr>
      </table></td>
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
mysql_free_result($Recordset2);

mysql_free_result($usuario_pregunta);
?>
