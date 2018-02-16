<?php require_once('../../Connections/clasificados.php'); ?>
<?php
mysql_select_db($database_clasificados, $clasificados);
$query_Recordset1 = "SELECT * FROM anuncios_guardados, usuarios WHERE anuncios_guardados.usuario_id =usuarios.id_usuario ";
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
$query_Recordset2 = sprintf("SELECT * FROM inmuebles WHERE inmuebles_id = %s", $colname_Recordset2);
$Recordset2 = mysql_query($query_Recordset2, $clasificados) or die(mysql_error());
$row_Recordset2 = mysql_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysql_num_rows($Recordset2);
?>
<%@LANGUAGE="JAVASCRIPT" CODEPAGE="1252"%>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Enviar  Anuncio por email</title>
<link href="../clasificados.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.titulos {
	font-family: Geneva, Arial, Helvetica, sans-serif;
	font-size: 14px;
	font-weight: bold;
	color: #000000;
}
-->
</style>
</head>

<body>
<table width="350" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td class="texto_opciones">&nbsp;</td>
  </tr>
  <tr>
    <td height="95" class="texto_opciones">Envie este anuncio Clasificado de SRL CLASIFICADOS a una direccion de email que desee.<br/>
    El Anuncio qu va enviar tiene los siguiente datos  si son correctos , rellene los datos de email destinatario y su nombre. </td>
  </tr>
  <tr>
    <td><form id="form1" name="form1" method="POST" action="envio-anuncio_servicios.php">
      <table width="350" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td bgcolor="#FFCC66" class="titulos">Datos Anuncio </td>
          <td valign="middle" bgcolor="#FFCC66" class="titulos">&nbsp;</td>
        </tr>
        <tr>
          <td width="129" bgcolor="#FFFFCC"  class="chamullo_guias"><div align="right"><strong>Titulo: </strong></div></td>
          <td width="221" valign="middle" bgcolor="#FFFFCC" class="texto_opciones">
            <div align="left"><?php echo $row_Recordset2['nombre']; ?>
              </label>
            </div></td>
        </tr>
        <tr>
          <td bgcolor="#FFFFCC" class="chamullo_guias"><div align="right"><strong>Tipo: </strong></div></td>
          <td valign="middle" bgcolor="#FFFFCC" class="texto_opciones">
            <div align="left"><?php echo $row_Recordset2['tipo_inmueble']; ?> </div></td></tr>
        <tr>
          <td bgcolor="#FFFFCC" class="chamullo_guias"><div align="right"><strong>Operacion: </strong></div></td>
          <td valign="middle" bgcolor="#FFFFCC" class="texto_opciones"><div align="left"><?php echo $row_Recordset2['operacion']; ?> </div></td>
        </tr>
        <tr>
          <td bgcolor="#FFFFCC" class="chamullo_guias"><div align="right"><strong>Descripcion: </strong></div></td>
          <td valign="middle" bgcolor="#FFFFCC" class="texto_opciones">
            <div align="left"></div></td></tr>
        <tr>
          <td colspan="2" bgcolor="#FFFFCC" class="chamullo_guias"><?php echo ucfirst($row_Recordset2['anuncio']); ?></td>
          </tr>
        <tr>
          <td bgcolor="#FFFFCC" class="chamullo_guias"><div align="right"><strong>Precio: </strong></div></td>
          <td valign="middle" bgcolor="#FFFFCC" class="texto_opciones"><?php echo ucfirst($row_Recordset2['precio']); ?> </td>
        </tr>
        <tr>
          <td bgcolor="#FFCC66" class="titulos">Datos Email </td>
          <td valign="middle" bgcolor="#FFCC66" class="texto_opciones">&nbsp;</td>
        </tr>
        <tr>
          <td bgcolor="#FFFFCC" class="chamullo_guias"><div align="right"><strong>Tu Nombre: </strong></div></td>
          <td valign="middle" bgcolor="#FFFFCC" class="texto_opciones"><div align="center">
              <input name="nombre" type="text" id="nombre" />
          </div></td>
        </tr>
        <tr>
          <td bgcolor="#FFFFCC" class="chamullo_guias"><div align="right"><strong>Tu Email:  </strong></div></td>
          <td valign="middle" bgcolor="#FFFFCC" class="texto_opciones"><div align="center">
              <input name="email2" type="text" id="email2" />
          </div></td>
        </tr>
        <tr>
          <td bgcolor="#FFFFCC" class="chamullo_guias"><div align="right"><strong>Email destinatarior: </strong></div></td>
          <td valign="middle" bgcolor="#FFFFCC" class="texto_opciones"><div align="center">
              <input name="email" type="text" id="email" />
          </div></td>
        </tr>
        <tr>
          <td bgcolor="#FFFFCC">&nbsp;</td>
          <td valign="middle" bgcolor="#FFFFCC">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="2" bgcolor="#FFFFCC"><div align="center">
            <input name="titulo" type="hidden" id="titulo" value="<?php echo $row_Recordset2['nombre']; ?>" />
            <input name="categoria" type="hidden" id="categoria" value="<?php echo $row_Recordset2['tipo_inmueble']; ?>" />
            <input name="rubro" type="hidden" id="rubro" value=" <?php echo $row_Recordset2['operacion']; ?>" />
            <input name="subrubro" type="hidden" id="subrubro" value="nada" />
            <input name="anuncio" type="hidden" id="anuncio" value=" <?php echo ucfirst($row_Recordset2['anuncio']); ?>" />
            <input name="precio" type="hidden" id="precio" value="<?php echo $row_Recordset2['precio']; ?>" />
            <input name="asunto" type="hidden" id="asunto" value="Anuncio Clasificado de SRL Clasificado" />
            <input type="submit" name="Submit" value="enviar" />
          </div></td>
          </tr>
      </table>
        
        <div align="center"></div>
       
        <div align="center"></div>
        
    </form>    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>
<?php
mysql_free_result($Recordset1);

mysql_free_result($Recordset2);
?>
