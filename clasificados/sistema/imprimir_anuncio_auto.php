<?php require_once('../../Connections/clasificados.php'); ?><?php
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
if (isset($_GET['anuncio_id'])) {
  $colname_Recordset2 = $_GET['anuncio_id'];
}
mysql_select_db($database_clasificados, $clasificados);
$query_Recordset2 = sprintf("SELECT * FROM autos WHERE autos_id = %s", GetSQLValueString($colname_Recordset2, "int"));
$Recordset2 = mysql_query($query_Recordset2, $clasificados) or die(mysql_error());
$row_Recordset2 = mysql_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysql_num_rows($Recordset2);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Imprimir Anuncio Autos</title>
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
        <td height="35" class="Estilo1">Tipo:</td>
        <td height="35" class="texto"><?php echo $row_Recordset2['tipo']; ?></td>
      </tr>
      <tr>
        <td height="35" class="Estilo1">Marca:</td>
        <td height="35" class="texto"><?php echo $row_Recordset2['marca']; ?></td>
      </tr>
      <tr>
        <td height="35" class="Estilo1">Modelo:</td>
        <td height="35" class="texto"><?php echo $row_Recordset2['modelo']; ?></td>
      </tr>
      <tr>
        <td height="26" colspan="2" class="Estilo1">Descripcion Auto</td>
      </tr>
      <tr>
        <td height="26" colspan="2"><span class="texto"><?php echo ucfirst($row_Recordset2['anuncio']); ?></span></td>
      </tr>
      <tr>
        <td height="33" bgcolor="#F0F0F0"><strong class="Estilo1">Precio</strong></td>
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
