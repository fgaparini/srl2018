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
$fecha = date ('j/m/y');
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

mysql_select_db($database_clasificados, $clasificados);
$query_Recordset2 = "SELECT * FROM autos";
$Recordset2 = mysql_query($query_Recordset2, $clasificados) or die(mysql_error());
$row_Recordset2 = mysql_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysql_num_rows($Recordset2);
//dsadas
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

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "frm")) {
  $insertSQL = sprintf("INSERT INTO inmuebles (nombre, operacion, tipo_inmueble, usuario_id, anuncio, fecha) VALUES (%s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['titulo'], "text"),
                       GetSQLValueString($_POST['operacion'], "text"),
                       GetSQLValueString($_POST['tipo'], "text"),
                       GetSQLValueString($_POST['usuario_id'], "text"),
                       GetSQLValueString($_POST['anuncio'], "text"),
                       GetSQLValueString($_POST['fecha'], "text"));

  mysql_select_db($database_clasificados, $clasificados);
  $Result1 = mysql_query($insertSQL, $clasificados) or die(mysql_error());


?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/sistemaclasi.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Confirmacion Publicacion Autos</title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="description" lang="es" content="Clasificados SRL :: Clasificados en San Rafael :: Estas buscando empleo, Trabajo en SAn RAfael Mendoza entonces estas en el lugar correcto... Ponemos a Tu disposicion toda la oferta laboral de san rafael y Alrrededores.. Empleos Trabajo, Laboral CLASIFICADOS EN SAN RAFAEL.. clasificados.sanrafaellate.com.ar "/>
<meta name="keywords" lang="es" content="Clasificados, San Rafael, Mendoza, Empleos, Inmubeles, Propiedades, articulos, educacionales, judiciales, legales, profesionales " />
<META NAME="Copyright" CONTENT="sanrafaellate.com.ar" />
  <script language="JavaScript">
//seleccion categoria
   function addOpt(oCntrl, iPos, sTxt, sVal){
     var selOpcion=new Option(sTxt, sVal);
     eval(oCntrl.options[iPos]=selOpcion);
   }

   function cambia(oCntrl){
    while (oCntrl.length) oCntrl.remove(0);
    switch (document.frm.categoria.selectedIndex){
     case 0: 
      addOpt(oCntrl,  0, "Domesticos", "domesticos");
      addOpt(oCntrl,  1, "profesionales", "profesionales");
      addOpt(oCntrl,  2, "vendedores-pormotores", "vendedores");
	  addOpt(oCntrl,  3, "Capacitacion", "capacitacion");
	  addOpt(oCntrl,  4, "Varios", "varios");
      break;
     case 1: 
      addOpt(oCntrl,  0, "Ciencias Exactas", "exactas");
      addOpt(oCntrl,  1, "Ciencia Medicas", "medicas");
      addOpt(oCntrl,  2, "Ciencias Economicas", "economicas");
	  addOpt(oCntrl,  3, "Ciencias Humanas", "humanas");
	  addOpt(oCntrl,  4, "Ciencias juridicas", "juridicas");
	  break;
     case 2: 
      addOpt(oCntrl,  0, "Judiciales", "judiciales");
      addOpt(oCntrl,  1, "Sucesorios", "sucesorios");
      addOpt(oCntrl,  2, "Remates", "remates");
      addOpt(oCntrl,  3, "Quiebras", "quiebras");
	  addOpt(oCntrl,  4, "Citaciones - Notificaciones", "citaciones");
	  addOpt(oCntrl,  5, "Mensuras", "mensuaras");
      break;
	     case 3: 
      addOpt(oCntrl,  0, "Citaciones", "citaciones");
      addOpt(oCntrl,  1, "Laboral", "laboral");
      addOpt(oCntrl,  2, "Especialidades", "especialidades");
      addOpt(oCntrl,  3, "Comunicados", "comunicados");
	  addOpt(oCntrl,  4, "Cursos y Conferencias", "cursos");
	  addOpt(oCntrl,  5, "Informacion General", "info-general");
	  addOpt(oCntrl,  5, "universitarias", "universitarias");
      break;
	     case 4: 
      addOpt(oCntrl,  0, "Electrodomesticos", "electrodomesticos");
      addOpt(oCntrl,  1, "Celulares", "Celulares");
      addOpt(oCntrl,  2, "Tv-Audio-Video", "tv-audio-video");
      addOpt(oCntrl,  3, "muebles-hogar", "Muebles-Hogar");
	  addOpt(oCntrl,  4, "Computacion", "computacion");
	  addOpt(oCntrl,  5, "animales", "animales");
	   addOpt(oCntrl, 6, "Ropa", "ropa");
      addOpt(oCntrl,  7, "Deportes", "deportes");
	  addOpt(oCntrl,  8, "Antiguedades", "antiguedades");
	  addOpt(oCntrl,  9, "Juguetes", "Juguetes");
	  addOpt(oCntrl, 10, "Joyas y Relojes", "joyasyrelojes");
      addOpt(oCntrl, 11, "Varios", "Varios");
	      break;
	     case 5: 
      addOpt(oCntrl,  0, "Hogar	", "hogar");
      addOpt(oCntrl,  1, "Esteticos", "esteticos");
      addOpt(oCntrl,  2, "Salud", "salud");
      addOpt(oCntrl,  3, "Industria", "industria");
	    addOpt(oCntrl, 4, "Educacion", "educacion");
	  addOpt(oCntrl,  5, "Social", "social");
	   addOpt(oCntrl, 6, "Fiesta y Eventos", "fiestas");
      addOpt(oCntrl,  7, "Varios", "varios");
	  break;
    }
   }
   
   //cambiante rubro servicio
     function addOpt2(oCntrl, iPos, sTxt, sVal){
     var selOpcion=new Option(sTxt, sVal);
     eval(oCntrl.options[iPos]=selOpcion);
   }

   function cambia2(oCntrl){
    while (oCntrl.length) oCntrl.remove(0);
    switch (document.frm.rubro.selectedIndex){
     case 0: 
      addOpt2(oCntrl,  0, "Carpinteria", "carpinteria");
      addOpt2(oCntrl,  1, "Plomeria-Gasista", "plomeria");
      addOpt2(oCntrl,  2, "construccion", "jardineria");
	  addOpt2(oCntrl,  3, "electricidad", "electricidad");
	  addOpt2(oCntrl,  4, "Herreria Artistica", "hartistica");
	   addOpt2(oCntrl, 5, "Mudanza", "mudanza");
      addOpt2(oCntrl,  6, "Reparacion Electrodomesticos", "reparaelectro");
	  addOpt2(oCntrl,  7, "techos", "techos");
	  addOpt2(oCntrl,  8, "Pintureria", "pintureria");
	  addOpt2(oCntrl,  9, "Otros", "otros");
      break;
     case 1: 
      addOpt2(oCntrl,  0, "Cosmetica", "comestica");
      addOpt2(oCntrl,  1, "Spa", "spa");
      addOpt2(oCntrl,  2, "Centro Esteticos", "centroestetico");
	  addOpt2(oCntrl,  3, "Otros", "otros");
	 
	  break;
	    case 2: 
      addOpt(oCntrl,  0, "Cuidado de Enfermos", "cuidado-emfermo");
      addOpt(oCntrl,  1, "Centro Geriatricos", "geriatricos");
      addOpt(oCntrl,  2, "especialistas", "especialistas");
      addOpt(oCntrl,  3, "Varios Salud", "varios");
	      break;
	     case 3: 
      addOpt(oCntrl,  0, "Diseño Web / Grafica", "diseno-web");
      addOpt(oCntrl,  1, "Contenedores", "contenedores");
      addOpt(oCntrl,  2, "Limpieza", "limpieza");
      addOpt(oCntrl,  3, "Desifeccion", "desifeccion");
	  addOpt(oCntrl,  4, "Imprenta", "imprenta");
	  addOpt(oCntrl,  5, "Informatica", "informatica");
	  
      break;
	     case 4: 
      addOpt(oCntrl,  0, "Preparacion Alumnos", "preparacion-alumnos");
      addOpt(oCntrl,  1, "Academias Institutos", "academias");
      addOpt(oCntrl,  2, "Otros", "otros");
 
	      break;
		   case 5: 
      addOpt(oCntrl,  0, " Extravios", "extravios");
      addOpt(oCntrl,  1, "matrimonios", "matrimonios");
      addOpt(oCntrl,  2, "Otros", "otros");

	      break;
	     case 6: 
      addOpt(oCntrl,  0, "Empresa de Organizacion	", "emp-org");
      addOpt(oCntrl,  1, "Salones", "salones");
      addOpt(oCntrl,  2, "infantiles", "infantiles");
      addOpt(oCntrl,  3, "Catering", "catering");
	    addOpt(oCntrl, 4, "Cotillon", "cotillon");
	  addOpt(oCntrl,  5, "Musica e Iluminacion", "musica-iluminacion");
	   addOpt(oCntrl, 6, "filmaciones y fotos", "filmacionesyfotos");
      addOpt(oCntrl,  7, "Varios", "varios");
	  break;
	  	   case 7: 
      addOpt(oCntrl,  0, " Astrologia", "astrologia");
      addOpt(oCntrl,  1, "Sauna", "sauna");
      addOpt(oCntrl,  2, "Varios", "varios");

	      break;
       }
   }
   
function activaOtro(){
with (document.frm){
otro.disabled = (categoria[categoria.selectedIndex].value != "servicios");
if (!otro.disabled)
otro.focus();
}
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
          <td class="titulos_seccion">MI CUENTA &gt;&gt;<br/>
          <span class="RUBRO_TITULOS">Confirmar Publicacion Inmuebles </span></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td class="texto_opciones">Su anuncio clasificado de Inmuebles se publico correctamente. Gacias por confiar en <span class="sos_nuevo">SRL CLASIFICADOS. </span></td>
        </tr>
        <tr>
          <td><div align="center"><span class="rubros_articulos"><a href="index.php">Ir a panel de control</a> -<a href="publique_anuncio.php"> Agregar nuevo Anuncio</a></span> </div></td>
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

mysql_free_result($Recordset2);
?>
