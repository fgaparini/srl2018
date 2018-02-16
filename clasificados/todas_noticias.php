<?php require_once('../Connections/noticias.php'); ?>
<?php
$currentPage = $_SERVER["PHP_SELF"];

$maxRows_Recordset1 = 10;
$pageNum_Recordset1 = 0;
if (isset($_GET['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $_GET['pageNum_Recordset1'];
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;

mysql_select_db($database_noticias, $noticias);
$query_Recordset1 = "SELECT * FROM noticias ORDER BY noticias_id DESC";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $noticias) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);

if (isset($_GET['totalRows_Recordset1'])) {
  $totalRows_Recordset1 = $_GET['totalRows_Recordset1'];
} else {
  $all_Recordset1 = mysql_query($query_Recordset1);
  $totalRows_Recordset1 = mysql_num_rows($all_Recordset1);
}
$totalPages_Recordset1 = ceil($totalRows_Recordset1/$maxRows_Recordset1)-1;

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
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Noticias en San Rafael :: San Rafael Late</title>
<meta name="description" lang="es" content="San Rafael Late:: Noticias en San Rafael.. Toda la actualidad economica, turistica, politica y social del departamento de san rafael, el sur mendocino, mendoza y toda la argentina..sanrafaellate.comar" />
<style type="text/css">
<!--
.titulo_noticia {
	font-family: Geneva, Arial, Helvetica, sans-serif;
	font-size: 16px;
	font-weight: bold;
	color: #FF6600;
	border-top-width: 1px;
	border-right-width: 1px;
	border-bottom-width: 1px;
	border-left-width: 1px;
	border-bottom-style: solid;
	border-bottom-color: #FF6600;
}
.noticia {
	font-family: Geneva, Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #333333;
}
.tituloCopia {
	font-family: Geneva, Arial, Helvetica, sans-serif;
	font-size: 36px;
	font-weight: bold;
	color: #006600;
	border-top-width: 1px;
	border-right-width: 1px;
	border-bottom-width: 1px;
	border-left-width: 1px;
	border-bottom-style: none;
	border-bottom-color: #FF6600;
}
.datos_noticia {
	font-family: Tahoma;
	font-size: 9px;
	color: #000000;
}
.titulo_noticias {	font-family: Geneva, Arial, Helvetica, sans-serif;
	font-weight: bold;
	color: #000000;
	background-color: #FFF4E6;
}
.contenedor_noticia {
	padding: 10px;
	border-top-width: 1px;
	border-right-width: 1px;
	border-bottom-width: 1px;
	border-left-width: 1px;
	border-top-style: none;
	border-bottom-style: solid;
	border-top-color: #DFEFDA;
	border-right-color: #DFEFDA;
	border-bottom-color: #DFEFDA;
	border-left-color: #DFEFDA;
}
.vernota {
	font-family: Tahoma;
	font-size: 10px;
	color: #666666;
}
.vernota a {
	font-family: Tahoma;
	font-size: 10px;
	color: #666666;
}
.vernota a:hover {
	font-family: Tahoma;
	font-size: 10px;
	color: #FF6600;
}
.menusup {
	font-family: Tahoma;
	font-size: 12px;
	color: #666666;
}
.menusup a {
	font-family: Tahoma;
	font-size: 12px;
	color: #666666;
}
.menusup a:hover {
	font-family: Tahoma;
	font-size: 12px;
	color: #FF6600;
	text-decoration:underline
}
.noticiaCopia {
	font-family: Geneva, Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #666666;
	font-weight: normal;
}
.LINEA {
	border-top-width: 1px;
	border-right-width: 1px;
	border-bottom-width: 1px;
	border-left-width: 1px;
	border-left-style: dashed;
	border-top-color: #CCCCCC;
	border-right-color: #CCCCCC;
	border-bottom-color: #CCCCCC;
	border-left-color: #CCCCCC;
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
.titulos_noti_todas {
	font-family: Geneva, Arial, Helvetica, sans-serif;
	font-size: 16px;
	color: #000066;
	font-weight: bold;
}

-->
</style>
<link href="clasificados.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div class="titulo_noticia">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td colspan="2" align="center" valign="middle"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="400" height="100" valign="middle"><div><a href="http://srlclasificados.com.ar"><img src="imagenes/cabecera2.jpg" alt="SRL CLASIFICADOS :: Clasificados en San Rafael :: " width="350" height="78" border="0" align="middle" /><br />
                </a>
                    <div>
                      <div align="center"><a href="http://srlclasificados.com.ar"><span class="texto_negro"><strong>www.</strong></span><span class="titulo_anuncios style1"><strong>srl</strong></span><span class="texto_negro"><strong>clasificados.com.ar</strong></span></a></div>
                    </div>
              <a href="http://srlclasificados.com.ar"> </a> </div></td>
            <td><div align="center">
                <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="400" height="80" title="San Rafael Hoteles">
                  <param name="movie" value="publicidad/home-top.swf" />
                  <param name="quality" value="high" />
                  <embed src="publicidad/home-top.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="400" height="80"></embed>
                </object>
            </div></td>
          </tr>
        </table>
        <a href="http://clasificados.sanrafaellate.com.ar"></a></td>
    </tr>
    <tr>
      <td bgcolor="#F90000"><table width="86%" height="15" border="0" cellpadding="0" cellspacing="0" class="menu_superior">
          <tr>
            <td width="15%"><div align="center"> <a href="http://clasificados.sanrafaellate.com.ar">Inicio</a> </div></td>
            <td width="28%"><div align="center"><a href="registro_usuarios.php">Registrate GRATIS!!</a> </div></td>
            <td width="26%"><div align="center">
                <?php 	if (isset( $_SESSION['MM_Username'])) { ?>
                <a href="../clasificados/sistema/">Mi Cuenta</a>
                <?php } else { ?>
                <a href="../clasificados/publique_anuncio.php">Publique Anuncio</a>
                <?php } ?>
            </div></td>
            <td width="16%"><div align="center"><a href="../clasificados/ayuda.php"></a><a href="publicidad.php">Publicidad</a></div></td>
            <td width="15%"><div align="center"><a href="contacto.php">Contacto</a></div></td>
          </tr>
      </table></td>
      <td height="24" bgcolor="#F90000" class="fecha"><div align="center" class="titulos_fecha"> <font color="#FFFFFF">
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
      </font> San Rafael Mendoza </div></td>
    </tr>
  </table>
</div>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="651"><br/><span class="tituloCopia">NOTICIAS SAN RAFAEL LATE </span>
	<?php do { ?>
      <div class="contenedor_noticia" onmouseover='this.style.background=#FFFFFF'; onmouseout='this.style.background=#FFFFFF'>
          <br/>
          <div class="titulos_noti_todas"><?php echo $row_Recordset1['titulo']; ?></div>
        <div class="noticia">
            <span class="noticias_nota">
              <?php
$cadena = substr(html_entity_decode($row_Recordset1['subtitulo']), 0, 250);
$cadena .= "...";
echo $cadena; 
?>
            </span>        </div>
        <div class="datos_noticia">
            <dic align="right" class="vernota">
            <div align="right" class="vernota"><a href="ver_noticia.php?noticias_id=<?php echo $row_Recordset1['noticias_id']; ?>" target="_top">Leer Nota &gt;&gt;</a><br/>
            </div>
        </div>
        </div>
      </div>
    <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?></td>
    <td width="10"><p>&nbsp;</p>
    <p>&nbsp;</p>
    <p class="LINEA">&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p></td>
    <td width="291" rowspan="2" class="LINEA">&nbsp;</td>
  </tr>
  <tr>
    <td width="651"><div align="center"> 
      <p class="vernota">Registros <?php echo ($startRow_Recordset1 + 1) ?> a <?php echo min($startRow_Recordset1 + $maxRows_Recordset1, $totalRows_Recordset1) ?> de <?php echo $totalRows_Recordset1 ?> </p>
      <table width="50%" border="0" align="center" class="vernota">
        <tr>
          <td width="23%" align="center"><?php if ($pageNum_Recordset1 > 0) { // Show if not first page ?>
                <span class="vernota"><a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, 0, $queryString_Recordset1); ?>">Primero</a>
            <?php } // Show if not first page ?></td>
          <td width="31%" align="center"><?php if ($pageNum_Recordset1 > 0) { // Show if not first page ?>
                <span class="vernota"><a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, max(0, $pageNum_Recordset1 - 1), $queryString_Recordset1); ?>">Anterior</a>
            <?php } // Show if not first page ?></td>
          <td width="23%" align="center"><?php if ($pageNum_Recordset1 < $totalPages_Recordset1) { // Show if not last page ?>
                <span class="vernota"><a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, min($totalPages_Recordset1, $pageNum_Recordset1 + 1), $queryString_Recordset1); ?>">Siguiente</a>
            <?php } // Show if not last page ?></td>
          <td width="23%" align="center"><?php if ($pageNum_Recordset1 < $totalPages_Recordset1) { // Show if not last page ?>
                <span class="vernota"><a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, $totalPages_Recordset1, $queryString_Recordset1); ?>">&Uacute;ltimo</a>
            <?php } // Show if not last page ?></td>
        </tr>
      </table>
      </p>
</div></td>
    <td width="10">&nbsp;</td>
  </tr>
</table>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
