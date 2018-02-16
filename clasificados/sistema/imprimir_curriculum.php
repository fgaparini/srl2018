<?php require_once('../../Connections/clasificados.php'); ?>
<?php
mysql_select_db($database_clasificados, $clasificados);
$query_Recordset1 = "SELECT * FROM anuncios_guardados, usuarios WHERE anuncios_guardados.usuario_id =usuarios.id_usuario";
$Recordset1 = mysql_query($query_Recordset1, $clasificados) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

//Anuncio a Guardar
$anuncio_id = $_GET[anuncio_id];
$base_datos = $_GET[base_datos];
$rubro =  $base_datos.'_id' ;
$colname_Recordset2 = "-1";
if (isset($_GET['curriculum_id'])) {
  $colname_Recordset2 = (get_magic_quotes_gpc()) ? $_GET['curriculum_id'] : addslashes($_GET['curriculum_id']);
}
mysql_select_db($database_clasificados, $clasificados);
$query_Recordset2 = sprintf("SELECT * FROM curriculum WHERE id_curriculum = %s", $colname_Recordset2);
$Recordset2 = mysql_query($query_Recordset2, $clasificados) or die(mysql_error());
$row_Recordset2 = mysql_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysql_num_rows($Recordset2);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Guardar Anuncio</title>
<link href="../clasificados.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.titulo {
	font-family: Geneva, Arial, Helvetica, sans-serif;
	font-size: 18px;
	font-weight: bold;
	color: #000000;
}
.texto {
	font-family: Geneva, Arial, Helvetica, sans-serif;
	font-size: 13px;
	font-weight: normal;
	color: #000000;
}
.Estilo1 {font-family: Geneva, Arial, Helvetica, sans-serif; font-size: 13px; font-weight: bold; color: #000000; }
.Estilo2 {font-size: 24px}
.Estilo4 {font-size: 18px; color: #333333; }
.linea_inf {	border-top-width: thin;
	border-right-width: thin;
	border-bottom-width: 1px;
	border-left-width: thin;
	border-bottom-style: dashed;
	border-top-color: #DBF0DE;
	border-right-color: #DBF0DE;
	border-bottom-color: #AEDDB6;
	border-left-color: #DBF0DE;
}
.style1 {font-size: 14px}
.style5 {color: #006699}
.titulo_curriculum {	font-family: Geneva, Arial, Helvetica, sans-serif;
	font-size: 22px;
	font-weight: bold;
	color: #0099FF;
	text-decoration: none;
}
.style6 {font-family: Verdana, Arial, Helvetica, sans-serif}
.style7 {color: #FF6600}
-->
</style>
</head>

<body>
<table width="600" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="2"><div align="right">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr></tr>
        <tr>
          <td><div align="center"><span class="texto_negro">estas buscando algo? </span><span class="titulo"><span class="Estilo2"><br/>
                  <span class="style6"><span class="style7">SRL</span> CLASIFICADOS</span></span><br/>
            </span><span class="Estilo4">Anuncios Clasificados de San Rafael</span><span class="titulo"><br/>
            </span><strong>www.<span class="sos_nuevo">srl</span>clasificados.com.ar<br/>
            www.<span class="sos_nuevo">clasificados</span>.sanrafaellate.com.ar </strong></div></td>
        </tr>
        <tr>
          <td width="66%"><div align="center" class="RUBRO_TITULOS">CURRICULUM VITAES </div></td>
          </tr>
        <tr></tr>
      </table>
    </div></td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" class="titulo_curriculum"><span class="RUBRO_TITULOS style1"><span class="style5">CurriCulum Vitae de</span></span> <br/>
        <?php echo $row_Recordset2['apellido']; ?>, <?php echo $row_Recordset2['nombre']; ?></td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#FFFFFF" class="texto_verde"><strong>DATOS PERSONALES </strong></td>
  </tr>
  <tr>
    <td width="48%" bgcolor="#FFFFFF" class="texto_negro"><strong>Direecion:</strong> <?php echo $row_Recordset2['direccion']; ?></td>
    <td width="52%" bgcolor="#FFFFFF" class="texto_negro"><strong>Email</strong>: <?php echo $row_Recordset2['email']; ?></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF" class="texto_negro"><strong>Telefono:</strong> <?php echo $row_Recordset2['telefono']; ?></td>
    <td bgcolor="#FFFFFF" class="texto_negro"><strong>Edad</strong>: <?php echo $row_Recordset2['edad']; ?> A&ntilde;os </td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#FFFFFF" class="linea_inf">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#F0EFE6" class="texto_verde">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#F0EFE6" class="texto_verde"><strong>Carta Presentacion </strong></td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#F0EFE6" class="texto_negro"><?php echo nl2br($row_Recordset2['carta_presentacion']); ?></td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#F0EFE6" class="linea_inf">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#FFFFFF" class="texto_verde">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#FFFFFF" class="texto_verde"><strong>Estudios Primarios </strong></td>
  </tr>
  <tr>
    <td colspan="2" class="texto_negro"><?php echo $row_Recordset2['estudios_primarios']; ?></td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#FFFFFF" class="texto_verde"><strong>Estudios Secundarios </strong></td>
  </tr>
  <tr>
    <td colspan="2" class="texto_negro"><?php echo $row_Recordset2['estudios_secundarios']; ?></td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#FFFFFF" class="texto_verde">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#FFFFFF" class="texto_verde"><strong>Estudios Terciarios </strong></td>
  </tr>
  <tr>
    <td colspan="2" class="texto_negro"><?php echo $row_Recordset2['estudios_secundarios']; ?></td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#FFFFFF" class="texto_verde"><strong>Cursos Realizados </strong></td>
  </tr>
  <tr>
    <td colspan="2" class="texto_negro"><?php echo nl2br($row_Recordset2['cursos']); ?></td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#FFFFFF" class="linea_inf">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#FFFFFF" class="texto_verde">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#FFFFFF" class="texto_verde"><strong>Experiencia Laboral </strong></td>
  </tr>
  <tr>
    <td colspan="2" class="texto_negro"><?php echo nl2br($row_Recordset2['experiencia_laboral']); ?></td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#FFFFFF" class="texto_verde">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#FFFFFF" class="texto_verde"><strong>Referencias</strong></td>
  </tr>
  <tr>
    <td colspan="2" class="texto_negro"><?php echo $row_Recordset2['referencias']; ?></td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#FFFFFF" class="texto_verde">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#FFFFFF" class="texto_verde"><strong>Informacion Adicional </strong></td>
  </tr>
  <tr>
    <td colspan="2" class="texto_negro"><?php echo $row_Recordset2['experiencia_laboral']; ?></td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2"><div align="center"><a href="javascript:print()" class="texto_mediano">Imprimir Curriculum </a></div></td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2"><div align="center" class="rubros">
      <div align="center" class="texto_opciones"><strong>San rafael Late Clasificados  :: SRL Clasificados :: </strong><br/>
        Oficinas : Almafuerte 239 :: Telefono : 02627 - 15694195 </div>
    </div></td>
  </tr>
</table>
</body>
</html>
<?php
mysql_free_result($Recordset1);

mysql_free_result($Recordset2);
?>
