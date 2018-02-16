<?php require_once('../Connections/noticias.php'); ?>
<?php
$colname_Recordset1 = "-1";
if (isset($_GET['noticias_id'])) {
  $colname_Recordset1 = (get_magic_quotes_gpc()) ? $_GET['noticias_id'] : addslashes($_GET['noticias_id']);
}
mysql_select_db($database_noticias, $noticias);
$query_Recordset1 = sprintf("SELECT * FROM noticias WHERE noticias_id = %s", $colname_Recordset1);
$Recordset1 = mysql_query($query_Recordset1, $noticias) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>San Rafael LAte Noticias :: <?php echo $row_Recordset1['titulo']; ?></title>
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
.datos_noticia {
	font-family: Tahoma;
	font-size: 9px;
	color: #000000;
}
.titulo_noticias {
	font-family: Geneva, Arial, Helvetica, sans-serif;
	font-weight: bold;
	color: #FF6600;
	background-color: #FFFFFF;
	font-size: 21px;
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
.noticiaCopia {
	font-family: Geneva, Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #333333;
	font-weight: normal;
	line-height: 18px;
	text-indent: 10px;
	white-space: normal;
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
.linea_inferior {
	border-top-width: 1px;
	border-right-width: 1px;
	border-bottom-width: 1px;
	border-left-width: 1px;
	border-top-color: #E0E0E0;
	border-right-color: #E0E0E0;
	border-bottom-color: #E0E0E0;
	border-left-color: #E0E0E0;
	font-family: Geneva, Arial, Helvetica, sans-serif;
	font-size: 12px;
	font-weight: bold;
	color: #333333;
	line-height: 17px;
}
.Estilo1 {font-family: Geneva, Arial, Helvetica, sans-serif; font-size: 12px; color: #333333; font-weight: bold; }
-->
</style>
<link href="clasificados.css" rel="stylesheet" type="text/css" />
</head>

<body class="titulo_noticia">
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
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="700">
      <div><br/><span class="tituloCopia">NOTICIAS SAN RAFAEL LATE </span>  <br/>
      </div>
    
  <div class="titulo_noticias"><br/><?php echo $row_Recordset1['titulo']; ?></div>
  
  <div class="linea_inferior">
    <br/>
    <span class="linea_inferior">
    <?php if ($row_Recordset1['subtitulo']!= 'null'){
   echo $row_Recordset1['subtitulo']; } else {
   } ?>
    </span>  </div>
  <div class="noticia">
    <div><br/><span class="noticiaCopia"><?php echo html_entity_decode($row_Recordset1['nota']); ?></span> </div>
  </div>
  <div class="datos_noticia">
    <p align="left">
      
      Fuente: <?php echo $row_Recordset1['fuente']; ?> <br/> 
      Autor: <?php echo $row_Recordset1['autor']; ?> <br/> 
      Fecha: <?php echo $row_Recordset1['fecha']; ?></p>
    <p align="right"><a href="todas_noticias.php" target="_top"><span class="menusup">ver todas las noticias >></span></a><br/>
    </a></p>
  </div></td>
    <td width="10">&nbsp;</td>
    <td class="LINEA">&nbsp;</td>
  </tr>
</table>

</body>
</html>
<?php
mysql_free_result($Recordset1);
?>