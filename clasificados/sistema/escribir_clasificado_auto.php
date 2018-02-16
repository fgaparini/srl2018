<?php if (!isset($_SESSION)) {
  session_start();
}
?>
<?php  require_once('../../Connections/clasificados.php'); ?><?php //initialize the session

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
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/sistemaclasi.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Clasificados San Rafael Mi Cuenta:: publicacion autos</title>

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
          <td class="titulos_seccion">MI CUENTA &gt;&gt;<br/>
          <span class="RUBRO_TITULOS">Publicacion de Anuncios  Autos </span></td>
        </tr>
        <tr>
          <td valign="middle" class="texto_opciones"><div align="left"><img src="../imagenes/boton1" width="50" height="50" hspace="5" align="left" />Este paso consiste en escrbir las caracteristicas de tu anuncio.<br />
          Publique un anuncio clasificado de Automotores como autos, caminetas, motos, camiones, etc. </div></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><form action="subir_imagen_auto.php" method="POST" enctype="multipart/form-data" name="frm" id="frm">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="33%" class="textoguias"><div align="right">Seleccionar Tipo: </div></td>
                <td width="6%">&nbsp;</td>
                <td width="61%" class="texto_opciones"><span class="style6">
                  <select size="1" id="tipo" name="tipo">
                    <option value="">Selecciona Tipo</option>
                    <option value="Auto">Auto</option>
                    <option value="Moto">Moto</option>
                    <option value="Caminetas">Camionetas</option>
                    <option value="Utilitario">Utilitario</option>
                    <option value="4x4">4x4</option>
                    <option value="Camion">Camion</option>
                    <option value="Nauticos">Nuaticos</option>
                    </select>
                </span></td>
              </tr>
              <tr>
                <td height="39" class="textoguias"><div align="right">Seleccionar Marca: </div></td>
                <td>&nbsp;</td>
                <td class="texto_opciones"><span class="style6">
                  <select size="1" id="marca" name="marca" onchange="javascript:sublist(this.form, rubro.value);">
                    <option value="" selected="selected">Selecciona una Marca</option>
                    <option value="Aleko">Aleko</option>
                    <option value="Alfa Romeo">Alfa Romeo</option>
                    <option value="Antique">Antique</option>
                    <option value="Aro">Aro</option>
                    <option value="Asia">Asia</option>
                    <option value="Audi">Audi</option>
                    <option value="Austin">Austin</option>
                    <option value="Autobianchi">Autobianchi</option>
                    <option value="BMW">BMW</option>
                    <option value="Belavtomaz">Belavtomaz</option>
                    <option value="Benjamin">Benjamin</option>
                    <option value="Bentley">Bentley</option>
                    <option value="Blac">Blac</option>
                    <option value="Borgward">Borgward</option>
                    <option value="Bugatti">Bugatti</option>
                    <option value="Buick">Buick</option>
                    <option value="Cadillac">Cadillac</option>
                    <option value="Chevrolet">Chevrolet</option>
                    <option value="Chrysler">Chrysler</option>
                    <option value="Citroen">Citroen</option>
                    <option value="Continental">Continental</option>
                    <option value="DKW">DKW</option>
                    <option value="Dacia">Dacia</option>
                    <option value="Daewoo">Daewoo</option>
                    <option value="Daihatsu">Daihatsu</option>
                    <option value="Datsun">Datsun</option>
                    <option value="Deutz Agrale">Deutz Agrale</option>
                    <option value="Dimex">Dimex</option>
                    <option value="Dodge">Dodge</option>
                    <option value="Dustin">Dustin</option>
                    <option value="Essex">Essex</option>
                    <option value="Ferrari">Ferrari</option>
                    <option value="Fiat">Fiat</option>
                    <option value="Ford">Ford</option>
                    <option value="Frankling">Frankling</option>
                    <option value="GAZ">GAZ</option>
                    <option value="GMC">GMC</option>
                    <option value="Graham">Graham</option>
                    <option value="Grosspal">Grosspal</option>
                    <option value="Heibao">Heibao</option>
                    <option value="Heinkel">Heinkel</option>
                    <option value="Hillman">Hillman</option>
                    <option value="Hino">Hino</option>
                    <option value="Honda">Honda</option>
                    <option value="Hudson">Hudson</option>
                    <option value="Hummer">Hummer</option>
                    <option value="Hupmobile">Hupmobile</option>
                    <option value="Hyundai">Hyundai</option>
                    <option value="IKA">IKA</option>
                    <option value="IZH">IZH</option>
                    <option value="International">International</option>
                    <option value="Isard">Isard</option>
                    <option value="Isuzu">Isuzu</option>
                    <option value="Iveco">Iveco</option>
                    <option value="Jaguar">Jaguar</option>
                    <option value="Jeep">Jeep</option>
                    <option value="Kenworth">Kenworth</option>
                    <option value="Kia">Kia</option>
                    <option value="Lancia">Lancia</option>
                    <option value="Land Rover">Land Rover</option>
                    <option value="Leon Bolle">Leon Bolle</option>
                    <option value="Lexus">Lexus</option>
                    <option value="Lincoln">Lincoln</option>
                    <option value="Lodi">Lodi</option>
                    <option value="Lotus">Lotus</option>
                    <option value="MG">MG</option>
                    <option value="Mahindra">Mahindra</option>
                    <option value="Maserati">Maserati</option>
                    <option value="Mazda">Mazda</option>
                    <option value="Mercedes-Benz">Mercedes-Benz</option>
                    <option value="Mercuri">Mercuri</option>
                    <option value="Messermischtt">Messermischtt</option>
                    <option value="Metro">Metro</option>
                    <option value="Mini">Mini</option>
                    <option value="Mitsubishi">Mitsubishi</option>
                    <option value="Morris">Morris</option>
                    <option value="NSU">NSU</option>
                    <option value="Nakai">Nakai</option>
                    <option value="Nash">Nash</option>
                    <option value="Nissan">Nissan</option>
                    <option value="Oldsmobile">Oldsmobile</option>
                    <option value="Oltcit">Oltcit</option>
                    <option value="Opel">Opel</option>
                    <option value="Otras">Otras</option>
                    <option value="Packard">Packard</option>
                    <option value="Peugeot">Peugeot</option>
                    <option value="Plymouth">Plymouth</option>
                    <option value="Polonez">Polonez</option>
                    <option value="Pontiac">Pontiac</option>
                    <option value="Porsche">Porsche</option>
                    <option value="Proton">Proton</option>
                    <option value="Renault">Renault</option>
                    <option value="Rolls-Royce">Rolls-Royce</option>
                    <option value="Rover">Rover</option>
                    <option value="Scania">Scania</option>
                    <option value="Seat">Seat</option>
                    <option value="Siam">Siam</option>
                    <option value="Simca">Simca</option>
                    <option value="Subaru">Subaru</option>
                    <option value="Suzuki">Suzuki</option>
                    <option value="Talbot">Talbot</option>
                    <option value="Tata">Tata</option>
                    <option value="Tavria">Tavria</option>
                    <option value="Toyota">Toyota</option>
                    <option value="Triumph">Triumph</option>
                    <option value="Volkswagen">Volkswagen</option>
                    <option value="Volvo">Volvo</option>
                    <option value="Zanella">Zanella</option>
                  </select>
                </span></td>
              </tr>
              <tr>
                <td class="textoguias"><div align="right"> Modelo: </div></td>
                <td>&nbsp;</td>
                <td class="texto_opciones"><input name="modelo" type="text" id="modelo" size="30" />
                  <label></label></td></tr>
              <tr>
                <td height="40" class="textoguias"><div align="right">Titulo:</div></td>
                <td height="40">&nbsp;</td>
                <td height="40" class="texto_opciones"><label>
                  <input name="titulo" type="text" id="titulo" size="30" />
                </label></td>
              </tr>
              <tr>
                <td height="40" class="textoguias"><div align="right">Anuncio:</div></td>
                <td height="40">&nbsp;</td>
                <td height="40" class="texto_opciones"><textarea name="anuncio" cols="40" rows="8" id="anuncio"></textarea></td>
              </tr>
              <tr>
                <td height="36" class="textoguias">
                    <div align="right">Precio</div>                  </td>
                <td>&nbsp;</td>
                <td><label>
                  <input name="precio" type="text" id="precio" size="30" />
                  </label></td>
              </tr>
              <tr>
                <td><label></label></td>
                <td>&nbsp;</td>
                <td><label>
                  <input name="Submit" type="submit" class="sos_nuevo" value="Publicar Anuncio" />
                  <input name="fecha" type="hidden" id="fecha" value="<?php echo $fecha; ?>" />
                  <input name="usuario_id" type="hidden" id="usuario_id" value="<?php echo $row_Recordset1['id_usuario']; ?>" />
                  <span class="texto_link_chico"></span></label></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
            </table>
            
            <input type="hidden" name="MM_insert" value="frm" />
          </form></td>
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
?>