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
	
  $logoutGoTo = "../clasificados/index.php";
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
$colname_Recordset4 = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_Recordset4 = (get_magic_quotes_gpc()) ? $_SESSION['MM_Username'] : addslashes($_SESSION['MM_Username']);
}
mysql_select_db($database_clasificados, $clasificados);
$query_Recordset4 = sprintf("SELECT * FROM usuarios WHERE usuario = '%s'", $colname_Recordset4);
$Recordset4 = mysql_query($query_Recordset4, $clasificados) or die(mysql_error());
$row_Recordset4 = mysql_fetch_assoc($Recordset4);
$totalRows_Recordset4 = mysql_num_rows($Recordset4);
?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

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
$maxRows_Recordset2 = 10;
$pageNum_Recordset2 = 0;
if (isset($_GET['pageNum_Recordset2'])) {
  $pageNum_Recordset2 = $_GET['pageNum_Recordset2'];
}
$startRow_Recordset2 = $pageNum_Recordset2 * $maxRows_Recordset2;

mysql_select_db($database_clasificados, $clasificados);
$query_Recordset2 = "SELECT * FROM empleos GROUP BY fecha ORDER BY fecha DESC";
$query_limit_Recordset2 = sprintf("%s LIMIT %d, %d", $query_Recordset2, $startRow_Recordset2, $maxRows_Recordset2);
$Recordset2 = mysql_query($query_limit_Recordset2, $clasificados) or die(mysql_error());
$row_Recordset2 = mysql_fetch_assoc($Recordset2);

if (isset($_GET['totalRows_Recordset2'])) {
  $totalRows_Recordset2 = $_GET['totalRows_Recordset2'];
} else {
  $all_Recordset2 = mysql_query($query_Recordset2);
  $totalRows_Recordset2 = mysql_num_rows($all_Recordset2);
}
$totalPages_Recordset2 = ceil($totalRows_Recordset2/$maxRows_Recordset2)-1;

$maxRows_Recordset3 = 10;
$pageNum_Recordset3 = 0;
if (isset($_GET['pageNum_Recordset3'])) {
  $pageNum_Recordset3 = $_GET['pageNum_Recordset3'];
}
$startRow_Recordset3 = $pageNum_Recordset3 * $maxRows_Recordset3;

mysql_select_db($database_clasificados, $clasificados);
$query_Recordset3 = "SELECT * FROM empleos GROUP BY fecha ORDER BY fecha DESC";
$query_limit_Recordset3 = sprintf("%s LIMIT %d, %d", $query_Recordset3, $startRow_Recordset3, $maxRows_Recordset3);
$Recordset3 = mysql_query($query_limit_Recordset3, $clasificados) or die(mysql_error());
$row_Recordset3 = mysql_fetch_assoc($Recordset3);

if (isset($_GET['totalRows_Recordset3'])) {
  $totalRows_Recordset3 = $_GET['totalRows_Recordset3'];
} else {
  $all_Recordset3 = mysql_query($query_Recordset3);
  $totalRows_Recordset3 = mysql_num_rows($all_Recordset3);
}
$totalPages_Recordset3 = ceil($totalRows_Recordset3/$maxRows_Recordset3)-1;

$maxRows_Recordset1 = 15;
$pageNum_Recordset1 = 0;
if (isset($_GET['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $_GET['pageNum_Recordset1'];
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;

mysql_select_db($database_clasificados, $clasificados);
$rubro2 = $_GET['rubro2'] ;
$fecha1 = $_GET['fecha1'] ;
$fecha2 = $_GET['fecha2'] ;

if (isset($_GET['fecha1'])) { 
$query_Recordset1 = "SELECT * FROM empleos WHERE fecha BETWEEN '$fecha1' AND '$fecha2' ORDER BY fecha DESC" ; }
else { if (isset($_GET['rubro2'])) { 
$query_Recordset1 = "SELECT * FROM empleos WHERE rubro LIKE '%$rubro2%'  " ; }
else {
$query_Recordset1 = "SELECT * FROM empleos ORDER BY fecha ASC"; } }

$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $clasificados) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);

if (isset($_GET['totalRows_Recordset1'])) {
  $totalRows_Recordset1 = $_GET['totalRows_Recordset1'];
} else {
  $all_Recordset1 = mysql_query($query_Recordset1);
  $totalRows_Recordset1 = mysql_num_rows($all_Recordset1);
}
$totalPages_Recordset1 = ceil($totalRows_Recordset1/$maxRows_Recordset1)-1;
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/empleos.dwt.php" codeOutsideHTMLIsLocked="false" -->

<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Empleos en San Rafael || Clasificados SRL || San Rafael || </title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="description" lang="es" content="Clasificados SRL :: Clasificados en San Rafael :: Estas buscando empleo, Trabajo en SAn RAfael Mendoza entonces estas en el lugar correcto... Ponemos a Tu disposicion toda la oferta laboral de san rafael y Alrrededores.. Empleos Trabajo, Laboral CLASIFICADOS EN SAN RAFAEL.. clasificados.sanrafaellate.com.ar "/>
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
.Estilo1 {font-size: 9px}
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
          <td colspan="3">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="3" class="titulos_seccion">Empleos</td>
        </tr>
        <tr></tr>
        <tr>
          <td colspan="3" bgcolor="#FFFFFF"><table width="74%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="20%" height="25" bgcolor="#FFFFFF" class="rubros_articulos" ><div align="center" class="textoguias"><strong><a href="empleos.php" class="textoguias">Pedidos</a></strong></div></td>
              <td width="34%" bgcolor="#FFFFFF" class="rubros_articulos"><div align="center"><strong><a href="curriculum.php">Ver Curriculum </a></strong></div></td>
              <td width="46%" bgcolor="#FFFFFF" class="rubros_articulos"><div align="center"><a href="../sistema/agregar_curriculum"><strong>Carga tu CURRICULUM </strong></a></div></td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td colspan="3">&nbsp;</td>
        </tr>
        <tr>
          <td width="64%" bgcolor="#C2D1E7" class="contenedor_buscador"><form id="form1" name="form1" method="get" action="empleos.php">
              <table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0" class="texto_opciones">
                <tr>
                  <td width="64%"><strong class="texto_opciones">BUSCAR POR FECHA </strong></td>
                  <td width="36%"><label></label></td>
                </tr>
                <tr>
                  <td height="49">Fecha desde &gt;&gt;
                    <label>
<select name="fecha1" class="texto_anuncio" id="fecha1">
  <?php do { ?>
  <option value="<?php echo $row_Recordset2['fecha']; ?>"><?php echo $row_Recordset2['fecha']; ?></option>
  <?php } while ($row_Recordset2 = mysql_fetch_assoc($Recordset2)); ?>
</select>
<br/>
                    Fecha hasta &gt;&gt;
                    
                      <select name="fecha2" class="texto_anuncio" id="fecha2">                  
                     <?php do { ?>   
                     <option value="<?php echo $row_Recordset3['fecha']; ?>"><?php echo $row_Recordset3['fecha']; ?></option>   <?php } while ($row_Recordset3 = mysql_fetch_assoc($Recordset3)); ?>
                    </select>
                  </label></td>
                  <td><div align="center">
                      <input name="Submit" type="submit" class="texto_opciones" value="buscar" />
                  </div></td>
                </tr>
              </table>
          </form></td>
          <td width="36%" rowspan="5" align="center" valign="top" bgcolor="#FFFFFF"><script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0','width','190','height','190','hspace','2','vspace','2','title','San Rafael Late','src','../publicidad/publi_next_buscador','quality','high','pluginspage','http://www.macromedia.com/go/getflashplayer','movie','../publicidad/publi_next_buscador' ); //end AC code
</script><noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="190" height="190" hspace="2" vspace="2" title="San Rafael Late">
            <param name="movie" value="../publicidad/publi_next_buscador.swf" />
            <param name="quality" value="high" />
            <embed src="../publicidad/publi_next_buscador.swf" width="190" height="190" hspace="2" vspace="2" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash"></embed>
          </object></noscript></td>
        </tr>
        <tr>
          <td height="69" bgcolor="#FFFFFF"><form action="empleos.php" method="get" name="form2" class="texto_opciones" id="form2">
            <div align="left"><strong class="texto_anuncio">&nbsp; <span class="texto_opciones">Buscar por Rubros</span> <span class="texto_opciones Estilo1">&gt;&gt;</span></strong>
              <span class="texto_rubros"><?php echo $totalRows_Recordset1 ?></span>
              <select name="rubro2" class="texto_anuncio" id="rubro2">
                <option value="domesticos">Domesticos</option>
                <option value="profesionales">Profesionales</option>
                <option value="vendedores">vendedores-pormotores</option>
                <option value="varios">varios</option>
                <option value="capacitacion">Capacitacion</option>
                </select>
              
              <input name="Submit2" type="submit" class="rubros" value="buscar" />
            </div>
          </form></td>
        </tr>
        <tr>
          <td height="14" bgcolor="#FFFFFF" class="fecha_anuncio">&nbsp;</td>
        </tr>
        <tr>
          <td bgcolor="#FFFFFF"><div align="left" class="texto_rubros">Total de anuncios publicados:  </div></td>
        </tr>
        <tr>
          <td height="19" bgcolor="#FFFFFF">&nbsp;</td>
        </tr>
      </table>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><?php if ($totalRows_Recordset1 == '0') {
		  echo "<div class='texto_opciones'>No hay anuncios publicados.. intente en otro rubro.. gracias</div>" ;}
		  else { ?>
            <div class="texto_opciones"><strong> EMPLEOS PEDIDOS </strong></div>
		  <?php do { ?>
              <div class="contenedor_anuncios">
                <div><span class="fecha_anuncio"><?php echo $row_Recordset1['fecha']; ?></span><span class="texto_opciones"> -</span> <span class="titulo_anuncios"><?php echo $row_Recordset1['nombre']; ?></span> - <span class="texto_opciones">Rubro : <?php echo $row_Recordset1['rubro']; ?></span></div>
                <div class="texto_anuncio"><?php echo ucfirst($row_Recordset1['anuncio']); ?></div>
                <div class="texto_anuncio">
                  <div align="right"><a href="#" onclick="abrirpopup('../sistema/guardar_anuncio.php?anuncio_id=<?php echo $row_Recordset1['empleos_id']; ?>&&base_datos=empleos',400,600)"><img src="../iconos/agrega_favoritos.jpg" width="25" height="25" border="0" title="Agregue Anuncio a Anuncios Guardados" /></a> <a  href="#" onclick="abrirpopup('../sistema/imprimir_ficha.php?anuncio_id=<?php echo $row_Recordset1['empleos_id']; ?>&&base_datos=empleos',450,600)"><img src="../iconos/imprimir.png" alt="Imprimir anuncio" width="25" height="25" border="0"  title="Imprima Anuncio" /></a><a  href="#" onclick="abrirpopup('../sistema/enviarxemail.php?anuncio_id=<?php echo $row_Recordset1['empleos_id']; ?>&&base_datos=empleos',450,600)"><img src="../iconos/email-enviar.png" alt="Enviar por Mail " width="30" height="30" border="0" /></a></div>
                </div>
              </div>
          <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?> <?php } ?></td>
        </tr>
        <tr>
          <td><p align="center" class="texto_anuncio"><span class="texto_link_chico"> Registros <?php echo ($startRow_Recordset + 1) ?> a <?php echo min($startRow_Recordset1 + $maxRows_Recordset1, $totalRows_Recordset1) ?> de <?php echo $totalRows_Recordset1 ?> </span></p>
            <div align="center">
              <table border="0" width="50%" align="center">
                <tr>
                  <td width="23%" align="center" class="texto_link_chico"><?php if ($pageNum_Recordset2 > 0) { // Show if not first page ?>
                      <a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, 0, $queryString_Recordset1); ?><?php if (($fecha1 != NULL)&&($fecha2 !=NULL)) { ?>&amp;&amp;fecha1=<?php echo $fecha1 ; ?>&amp;&amp;fecha2=<?php echo $fecha2 ; ?> <?php } else { if ($rubro2 != NULL) {?>&amp;&amp;rubro2=<?php echo $rubro2 ; ?><?php } } ?>">Primero</a>
                      <?php } // Show if not first page ?>                  </td>
                  <td width="31%" align="center" class="texto_link_chico"><?php if ($pageNum_Recordset1 > 0) { // Show if not first page ?>
                      <a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, max(0, $pageNum_Recordset1 - 1), $queryString_Recordset1); ?><?php if (($fecha1 != NULL)&&($fecha2 !=NULL)) { ?>&amp;&amp;fecha1=<?php echo $fecha1 ; ?>&amp;&amp;fecha2=<?php echo $fecha2 ; ?> <?php } else { if ($rubro2 != NULL) {?>&amp;&amp;rubro2=<?php echo $rubro2 ; ?><?php } } ?>">Anterior</a>
                      <?php } // Show if not first page ?>                  </td>
                  <td width="23%" align="center" class="texto_link_chico"><?php if ($pageNum_Recordset1 < $totalPages_Recordset1) { // Show if not last page ?>
                      <a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, min($totalPages_Recordset1, $pageNum_Recordset1 + 1), $queryString_Recordset1); ?><?php if (($fecha1 != NULL)&&($fecha2 !=NULL)) { ?>&amp;&amp;fecha1=<?php echo $fecha1 ; ?>&amp;&amp;fecha2=<?php echo $fecha2 ; ?> <?php } else { if ($rubro2 != NULL) {?>&amp;&amp;rubro2=<?php echo $rubro2 ; ?><?php } } ?>">Siguiente</a>
                      <?php } // Show if not last page ?>                  </td>
                  <td width="23%" align="center" class="texto_link_chico"><?php if ($pageNum_Recordset1 < $totalPages_Recordset1) { // Show if not last page ?>
                      <a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, $totalPages_Recordset1, $queryString_Recordset1); ?><?php if (($fecha1 != NULL)&&($fecha2 !=NULL)) { ?>&amp;&amp;fecha1=<?php echo $fecha1 ; ?>&amp;&amp;fecha2=<?php echo $fecha2 ; ?> <?php } else { if ($rubro2 != NULL) {?>&amp;&amp;rubro2=<?php echo $rubro2 ; ?><?php } } ?>">&Uacute;ltimo</a>
                      <?php } // Show if not last page ?>                  </td>
                </tr>
                          </table>
          </div></td>
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
            <td align="left" valign="middle"><a href="../autos_san_rafael/autos_san_rafael.php"><img src="../imagenes/automotores.jpg" alt="automotores en san rafael" width="40" height="40" border="0" /></a></td>
            <td align="left" valign="middle" class="rubros"><a href="../autos_san_rafael/autos_san_rafael.php">Automotores</a> </td>
            <td><img src="../imagenes/propiedades.jpg" alt="propiedades en san rafael" width="40" height="40" /></td>
            <td class="rubros"><a href="../propiedades_san_rafael/inmuebles_san_rafael.php">Inmuebles</a></td>
          </tr>
          <tr>
            <td width="14%"><img src="../imagenes/empleos.jpg" alt="EMPLEOS EN SAN RAFAEL" width="40" height="40" /></td>
            <td width="27%" class="rubros"><a href="empleos.php">Empleo</a></td>
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
mysql_free_result($Recordset2);

mysql_free_result($Recordset3);

mysql_free_result($Recordset4);
?>
