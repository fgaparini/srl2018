<?php require_once('../../Connections/clasificados.php'); ?>
<?php
if (!isset($_SESSION)) {
  session_start();
}
$currentPage = $_SERVER["PHP_SELF"];

$colname_Recordset4 = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_Recordset4 = (get_magic_quotes_gpc()) ? $_SESSION['MM_Username'] : addslashes($_SESSION['MM_Username']);
}
mysql_select_db($database_clasificados, $clasificados);
$query_Recordset4 = sprintf("SELECT * FROM usuarios WHERE usuario = '%s'", $colname_Recordset4);
$Recordset4 = mysql_query($query_Recordset4, $clasificados) or die(mysql_error());
$row_Recordset4 = mysql_fetch_assoc($Recordset4);
$totalRows_Recordset4 = mysql_num_rows($Recordset4);

$maxRows_Recordset2 = 10;
$pageNum_Recordset2 = 0;
if (isset($_GET['pageNum_Recordset2'])) {
  $pageNum_Recordset2 = $_GET['pageNum_Recordset2'];
}
$startRow_Recordset2 = $pageNum_Recordset2 * $maxRows_Recordset2;

$colname_Recordset2 = "-1";
if (isset($_GET['curriculum_id'])) {
  $colname_Recordset2 = (get_magic_quotes_gpc()) ? $_GET['curriculum_id'] : addslashes($_GET['curriculum_id']);
}
mysql_select_db($database_clasificados, $clasificados);
$query_Recordset2 = sprintf("SELECT * FROM curriculum WHERE id_curriculum = %s", $colname_Recordset2);
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

$queryString_Recordset2 = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_Recordset2") == false && 
        stristr($param, "totalRows_Recordset2") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_Recordset2 = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_Recordset2 = sprintf("&totalRows_Recordset2=%d%s", $totalRows_Recordset2, $queryString_Recordset2);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/empleos.dwt.php" codeOutsideHTMLIsLocked="false" -->

<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Empleos en San Rafael :: Curriculum de Postulantes || Clasificados SRL || San Rafael || </title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="description" lang="es" content="Clasificados SRL :: Clasificados en San Rafael :: Seccion de curriculum de pòstulante para diferentes empleos en San Rafael, dejanos tu curriculum.. Empleos Trabajo, Laboral CLASIFICADOS EN SAN RAFAEL.. clasificados.sanrafaellate.com.ar "/>
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
<script>
function abrirpopup2(nombre,ancho,alto) {
dat = 'width=' + ancho + ',height=' + alto + ',left=50,top=50,scrollbars=yes,resize=no';
window.open(nombre,'',dat)
}
</script>
<style type="text/css">
<!--
.titulo_curriculum {
	font-family: Geneva, Arial, Helvetica, sans-serif;
	font-size: 22px;
	font-weight: bold;
	color: #0099FF;
	text-decoration: none;
}
.linea_inf {
	border-top-width: thin;
	border-right-width: thin;
	border-bottom-width: 1px;
	border-left-width: thin;
	border-bottom-style: dashed;
	border-top-color: #DBF0DE;
	border-right-color: #DBF0DE;
	border-bottom-color: #AEDDB6;
	border-left-color: #DBF0DE;
}
.style5 {color: #006699}
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
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td colspan="3"><div align="right">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="66%"><div align="center" class="RUBRO_TITULOS">CURRICULUM VITAES </div></td>
                <td width="18%"><div align="center"><img src="../iconos/email.png" alt="ENVIAR POR EMAIL" width="50" height="50" /></div></td>
                <td width="16%"><div align="center"><a  href="#" onclick="abrirpopup2('../sistema/imprimir_curriculum.php?curriculum_id=<?php echo $row_Recordset2['id_curriculum']; ?>',600,700)"><img src="../iconos/imprimir.jpg" alt="IMPRIMIR CURRICULUM" width="50" height="50" border="0" longdesc="imrpimir curriculum vitae" /></a></div></td>
              </tr>
              <tr>
                <td></td>
                <td class="texto_panel"><div align="center">Enviar a email </div></td>
                <td class="texto_panel"><div align="center"><a  href="#" onclick="abrirpopup2('../sistema/imprimir_curriculum.php?anuncio_id=<?php echo $row_Recordset2['id_curriculum']; ?>',600,700)">Imprimir</a></div></td>
              </tr>
            </table>
          </div></td>
        </tr>
        <tr>
          <td colspan="3">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="3" class="titulo_curriculum"><span class="RUBRO_TITULOS style1"><span class="style5">CurriCulum Vitae de</span></span> <br/>
            <?php echo $row_Recordset2['apellido']; ?>, <?php echo $row_Recordset2['nombre']; ?></td>
        </tr>
        <tr>
          <td colspan="3" bgcolor="#FFFFFF">&nbsp;</td>
        </tr>
        <tr>
          <td width="37%" rowspan="6" bgcolor="#FFFFFF" class="texto_verde"><span class="division_detalles_fotos">
            <?php if ($row_Recordset2['foto'] != NULL) { ?>
            <strong>Foto </strong><img src="../fotos-clasificados/curriculum/<?php echo $row_Recordset2['id_curriculum']; ?>.jpg" width="180" height="180" hspace="10" vspace="2" />
            <?php } else {?>
            <img src="../fotos-clasificados/sinfoto.jpg" width="200" height="200" hspace="2" vspace="2" />
            <?php }  ?>
          </span></td>
          <td height="27" colspan="2" bgcolor="#FFFFFF" class="-linea_inf_verde"><strong>DATOS PERSONALES </strong></td>
        </tr>
        <tr>
          <td width="51%" height="25" bgcolor="#FFFFFF" class="texto_negro"><strong>Direecion:</strong> <?php echo $row_Recordset2['direccion']; ?></td>
          <td width="12%" bgcolor="#FFFFFF" class="texto_negro">&nbsp;</td>
        </tr>
        <tr>
          <td height="25" bgcolor="#FFFFFF" class="texto_negro"><strong>Telefono:</strong> <?php echo $row_Recordset2['telefono']; ?></td>
          <td bgcolor="#FFFFFF" class="texto_negro">&nbsp;</td>
        </tr>
        <tr>
          <td height="25" bgcolor="#FFFFFF" class="texto_negro"><strong>Edad</strong>: <?php echo $row_Recordset2['edad']; ?> A&ntilde;os </td>
          <td bgcolor="#FFFFFF" class="texto_negro">&nbsp;</td>
        </tr>
        <tr>
          <td height="25" valign="top" bgcolor="#FFFFFF" class="texto_negro"><strong>Email</strong>: <?php echo $row_Recordset2['email']; ?></td>
          <td bgcolor="#FFFFFF" class="texto_negro">&nbsp;</td>
        </tr>
        <tr>
          <td valign="top" bgcolor="#FFFFFF" class="texto_negro">&nbsp;</td>
          <td bgcolor="#FFFFFF" class="texto_negro">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="3" bgcolor="#FFFFFF" class="linea_inf">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="3" bgcolor="#F4F3E8" class="texto_verde">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="3" bgcolor="#F4F3E8" class="texto_verde"><strong>Carta Presentacion </strong></td>
        </tr>
        <tr>
          <td colspan="3" bgcolor="#F4F3E8" class="texto_negro"><?php echo nl2br($row_Recordset2['carta_presentacion']); ?></td>
        </tr>
        <tr>
          <td colspan="3" bgcolor="#F4F3E8" class="linea_inf">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="3" bgcolor="#FFFFFF" >&nbsp;</td>
        </tr>
        <tr>
          <td colspan="3" bgcolor="#FFFFFF" class="-linea_inf_verde"><strong>Estudios Primarios </strong></td>
        </tr>
        <tr>
          <td colspan="3" class="texto_negro"><?php echo $row_Recordset2['estudios_primarios']; ?></td>
        </tr>
        <tr>
          <td colspan="3" bgcolor="#FFFFFF">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="3" bgcolor="#FFFFFF" class="-linea_inf_verde"><strong>Estudios Secundarios </strong></td>
        </tr>
        <tr>
          <td colspan="3" class="texto_negro"><?php echo $row_Recordset2['estudios_secundarios']; ?></td>
        </tr>
        <tr>
          <td colspan="3" bgcolor="#FFFFFF" class="texto_verde">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="3" bgcolor="#FFFFFF" class="-linea_inf_verde"><strong>Estudios Terciarios </strong></td>
        </tr>
        <tr>
          <td colspan="3" class="texto_negro"><?php echo $row_Recordset2['estudios_secundarios']; ?></td>
        </tr>
        <tr>
          <td colspan="3" bgcolor="#FFFFFF">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="3" bgcolor="#FFFFFF" class="-linea_inf_verde"><strong>Cursos Realizados </strong></td>
        </tr>
        <tr>
          <td colspan="3" class="texto_negro"><?php echo nl2br($row_Recordset2['cursos']); ?></td>
        </tr>
        <tr>
          <td colspan="3" bgcolor="#FFFFFF" class="linea_inf">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="3" bgcolor="#FFFFFF" class="texto_verde">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="3" bgcolor="#FFFFFF" class="-linea_inf_verde"><strong class="-linea_inf_verde">Experiencia Laboral </strong></td>
        </tr>
        <tr>
          <td colspan="3" class="texto_negro"><?php echo nl2br($row_Recordset2['experiencia_laboral']); ?></td>
        </tr>
        <tr>
          <td colspan="3" bgcolor="#FFFFFF" class="texto_verde">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="3" bgcolor="#FFFFFF" class="-linea_inf_verde"><strong class="-linea_inf_verde">Referencias</strong></td>
        </tr>
        <tr>
          <td colspan="3" class="texto_negro"><?php echo $row_Recordset2['referencias']; ?></td>
        </tr>
        <tr>
          <td colspan="3" bgcolor="#FFFFFF" class="texto_verde">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="3" bgcolor="#FFFFFF" class="texto_verde"><strong>Informacion Adicional </strong></td>
        </tr>
        <tr>
          <td colspan="3" class="texto_negro"><?php echo $row_Recordset2['experiencia_laboral']; ?></td>
        </tr>
        <tr>
          <td colspan="3">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="3"><div align="center" class="rubros"><a href="curriculum.php">&lt;&lt; Volver a curriculum</a>s</div></td>
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
mysql_free_result($Recordset4);

mysql_free_result($Recordset2);
?>
