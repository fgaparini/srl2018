<?php require_once('../../Connections/clasificados.php'); ?>
<?php require_once('../../Connections/clasificados.php'); ?><?php
//Anuncio a Guardar
$anuncio_id = $_GET[anuncio_id];
$base_datos = $_GET[base_datos];
$rubro =  $base_datos.'_id' ;
mysql_select_db($database_clasificados, $clasificados);
$query_Recordset2 = "SELECT * FROM $base_datos WHERE $rubro = $anuncio_id   ";
$Recordset2 = mysql_query($query_Recordset2, $clasificados) or die(mysql_error());
$row_Recordset2 = mysql_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysql_num_rows($Recordset2);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Imprimir Anuncio</title>
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
-->
</style>
</head>

<body>
<table width="400" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td class="texto_opciones">&nbsp;</td>
  </tr>
  <tr>
    <td class="texto_opciones"><div align="center"><span class="titulo"> SRL CLASIFICADOS<br/>
      Clasificados de San Rafael </span><span class="titulo"><br/>
      </span>www.srlclasificados.com.ar www.clasificados.sanrafaellate.com.ar </div></td>
  </tr>
  <tr>
    <td><table width="350" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="10"></td>
        <td height="10"></td>
      </tr>
      <tr>
        <td width="114" height="25" class="texto"><strong>Titulo Anuncio : </strong></td>
        <td width="236" height="25" class="texto"><?php echo $row_Recordset2['nombre']; ?></td>
      </tr>
      <tr>
        <td height="25" class="Estilo1">Categoria:</td>
        <td height="25" class="texto"><?php echo $base_datos ; ?></td>
      </tr>
      <tr>
        <td height="25" class="Estilo1">Rubro:</td>
        <td height="25" class="texto"><?php echo $row_Recordset2['rubro']; ?></td>
      </tr>
      <tr>
        <td height="25" colspan="2" class="Estilo1">Descripcion Anuncio</td>
        </tr> 
		<?php if ($base_datos==articulos) {?> 
      <tr>
        <td height="33" colspan="2" bgcolor="#FFFFFF"><span class="texto"><?php echo ucfirst($row_Recordset2['anuncio']); ?></span></td>
        </tr>
      <td height="33" bgcolor="#F0F0F0"><strong class="Estilo1">Precio</strong></td>
        <td bgcolor="#F0F0F0" class="texto"><b><?php echo $row_Recordset2['precio']; ?></b></td>
      </tr><?php }?>
    </table></td>
  </tr>
  <tr>
    <td><div align="center"><span class="titulo_anuncios"><a href="javascript:print()" class="texto_mediano">Imprimir Anuncio </a></span></div></td>
  </tr>
  <tr>
    <td height="79"><div align="center" class="texto_opciones">San rafael Late Clasificados  :: SRL Clasificados :: <br/>
    Oficinas : Almafuerte 239 :: Telefono : 02627 - 15694195 </div></td>
  </tr>
</table>
</body>
</html>
<?php
mysql_free_result($Recordset2);
?>
