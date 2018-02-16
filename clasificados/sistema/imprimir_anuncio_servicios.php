<?php require_once('../../Connections/clasificados.php'); ?>
<?php require_once('../../Connections/clasificados.php'); ?><?php
$session_Recordset1 = "-1";
if (isset($_SESSION['MM_Username'])) {
  $session_Recordset1 = (get_magic_quotes_gpc()) ? $_SESSION['MM_Username'] : addslashes($_SESSION['MM_Username']);
}
mysql_select_db($database_clasificados, $clasificados);
$query_Recordset1 = sprintf("SELECT * FROM anuncios_guardados, usuarios WHERE anuncios_guardados.usuario_id =usuarios.id_usuario AND usuarios.nombre = %s", $session_Recordset1);
$Recordset1 = mysql_query($query_Recordset1, $clasificados) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

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
<title>Imprimir Anuncio Servicios</title>
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
-->
</style>
</head>

<body>
<table width="430" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td class="texto_opciones">&nbsp;</td>
  </tr>
  <tr>
    <td class="texto_opciones"><div align="center">
      <p> <span class="texto_negro">estas buscando algo? </span><span class="titulo"><span class="Estilo2"><br/>
        SRL CLASIFICADOS</span><br/>
        </span><span class="Estilo4">Anuncios Clasificados de San Rafael</span><span class="titulo"><br/>
        <br/>
          </span>www.srlclasificados.com.ar<br/> 
        www.clasificados.sanrafaellate.com.ar </p>
      </div></td>
  </tr>
  <tr>
    <td><table width="350" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td height="10"></td>
        <td height="10"></td>
      </tr>
      <tr>
        <td width="114" height="35" class="texto"><strong>Titulo Anuncio : </strong></td>
        <td width="236" height="35" class="texto"><?php echo $row_Recordset2['nombre']; ?></td>
      </tr>
      <tr>
        <td height="35" class="Estilo1">Categoria:</td>
        <td height="35" class="texto">Servicios</td>
      </tr>
      <tr>
        <td height="35" class="Estilo1">Rubro:</td>
        <td height="35" class="texto"><?php echo $row_Recordset2['rubro']; ?></td>
      </tr>
      <tr>
        <td height="35" class="Estilo1">subrubro:</td>
        <td height="35" class="texto"><?php echo $row_Recordset2['subrubro']; ?></td>
      </tr>
      <tr>
        <td height="26" colspan="2" class="Estilo1">Descripcion Servicio</td>
      </tr>
      <tr>
        <td height="26" colspan="2"><span class="texto"><?php echo ucfirst($row_Recordset2['anuncio']); ?></span></td>
      
      ><tr>
       </tr> <td height="33" bgcolor="#F0F0F0"><strong class="Estilo1">Precio</strong></td>
        <td bgcolor="#F0F0F0" class="texto"><b><?php echo $row_Recordset2['precio']; ?></b></td>
      </tr>
      
    </table></td>
  </tr>
  <tr>
    <td><div align="center"><span class="titulo_anuncios"><a href="javascript:print()" class="texto_mediano">Imprimir Anuncio </a></span></div></td>
  </tr>
  <tr>
    <td height="79"><div align="center" class="texto_opciones"><strong>San rafael Late Clasificados  :: SRL Clasificados :: </strong><br/>
    Oficinas : Almafuerte 239 :: Telefono : 02627 - 15694195 </div></td>
  </tr>
</table>
</body>
</html>
<?php
mysql_free_result($Recordset1);

mysql_free_result($Recordset2);
?>
