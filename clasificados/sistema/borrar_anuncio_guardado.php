<?php require_once('../../Connections/clasificados.php'); ?>
<?php
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

if ((isset($_POST['anuncio_id'])) && ($_POST['anuncio_id'] != "") && (isset($_POST['Submit']))) {
  $deleteSQL = sprintf("DELETE FROM anuncios_guardados WHERE anuncio_id=%s",
                       GetSQLValueString($_POST['anuncio_id'], "int"));

  mysql_select_db($database_clasificados, $clasificados);
  $Result1 = mysql_query($deleteSQL, $clasificados) or die(mysql_error());

  $deleteGoTo = "confirmar_eliminacion.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $deleteGoTo .= (strpos($deleteGoTo, '?')) ? "&" : "?";
    $deleteGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $deleteGoTo));
}
?>
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
if (isset($_GET['anuncio_id'])) {
  $colname_Recordset2 = (get_magic_quotes_gpc()) ? $_GET['anuncio_id'] : addslashes($_GET['anuncio_id']);
}
mysql_select_db($database_clasificados, $clasificados);
$query_Recordset2 = sprintf("SELECT * FROM anuncios_guardados WHERE anuncio_id = '%s'", $colname_Recordset2);
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
.Estilo3 {font-family: Geneva, Arial, Helvetica, sans-serif; font-size: 18px; font-weight: bold; color: #FF0000; }
-->
</style>
</head>

<body>
<form id="form1" name="form1" method="post" action="borrar_anuncio_guardado.php">
  <table width="400" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td class="texto_opciones"><div align="center"><span class="Estilo3">BORRAR ANUNCIO GUARDADO</span></div></td>
    </tr>
    <tr>
      <td class="texto_opciones"><div align="center">Ud quiere borrar el siguiente anuncio guardado: </div></td>
    </tr>
    <tr>
      <td><table width="350" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="10"></td>
            <td height="10"></td>
          </tr>
          <tr>
            <td width="114" height="25" class="texto"><strong>Titulo Anuncio : </strong></td>
            <td width="236" height="25" class="texto"><?php echo $row_Recordset2['anuncio_nombre']; ?></td>
          </tr>
          <tr>
            <td height="25" class="Estilo1">Id anuncio </td>
            <td height="25" class="texto"><?php echo $row_Recordset2['anuncio_id']; ?></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
      </table></td>
    </tr>
    <tr>
      <td><div align="center"><span class="titulo_anuncios"><a href="confirmar_eliminacion.php?anuncio_id=<?php echo $row_Recordset2['anuncio_id']; ?>" class="texto_mediano">
        <label class="titulo_anuncios"></label>
      </a></span>
          <label>
          <input name="anuncio_id" type="hidden" id="anuncio_id" value="<?php echo $row_Recordset2['anuncio_id']; ?>" />
          <input type="submit" name="Submit" value="borrar Anuncio"  />
          </label>
      </div></td>
    </tr>
    <tr>
      <td height="79"><div align="center" class="texto_opciones">San rafael Late Clasificados  :: SRL Clasificados :: <br/>
        Oficinas : Almafuerte 239 :: Telefono : 02627 - 15694195 </div></td>
    </tr>
  </table>
</form>
</body>
</html>
<?php
mysql_free_result($Recordset1);

mysql_free_result($Recordset2);
?>
