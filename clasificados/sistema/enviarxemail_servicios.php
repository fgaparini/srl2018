<?php require_once('../../Connections/clasificados.php'); ?>
<?php
$session_Recordset1 = "-1";
if (isset($_SESSION['MM_Username'])) {
  $session_Recordset1 = (get_magic_quotes_gpc()) ? $_SESSION['MM_Username'] : addslashes($_SESSION['MM_Username']);
}
mysql_select_db($database_clasificados, $clasificados);
$query_Recordset1 = sprintf("SELECT * FROM anuncios_guardados, usuarios WHERE anuncios_guardados.usuario_id =usuarios.id_usuario AND usuarios.nombre_usuario = %s", $session_Recordset1);
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
          <td bgcolor="#FFFFCC" class="chamullo_guias"><div align="right"><strong>Categoria: </strong></div></td>
          <td valign="middle" bgcolor="#FFFFCC" class="texto_opciones">
            <div align="left"><?php echo $base_datos ; ?>            </div></td></tr>
        <tr>
          <td bgcolor="#FFFFCC" class="chamullo_guias"><div align="right"><strong>Rubro: </strong></div></td>
          <td valign="middle" bgcolor="#FFFFCC" class="texto_opciones"><div align="left"><?php echo $row_Recordset2['rubro']; ?> </div></td>
        </tr>
        <tr>
          <td bgcolor="#FFFFCC" class="chamullo_guias"><div align="right"><strong>Subrubro: </strong></div></td>
          <td valign="middle" bgcolor="#FFFFCC" class="texto_opciones">
                <div align="left"><?php echo $row_Recordset2['subrubro']; ?>                </div></td></tr>
        <tr>
          <td bgcolor="#FFFFCC" class="chamullo_guias"><div align="right"><strong>anuncio: </strong></div></td>
          <td valign="middle" bgcolor="#FFFFCC" class="texto_opciones">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="2" bgcolor="#FFFFCC" class="chamullo_guias"><span class="texto_opciones"><?php echo ucfirst($row_Recordset2['anuncio']); ?></span></td>
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
            <input name="categoria" type="hidden" id="categoria" value="<?php echo $base_datos ; ?>" />
            <input name="rubro" type="hidden" id="rubro" value=" <?php echo $row_Recordset2['rubro']; ?>" />
            <input name="subrubro" type="hidden" id="subrubro" value=" <?php echo $row_Recordset2['subrubro']; ?>" />
            <input name="anuncio" type="hidden" id="anuncio" value=" <?php echo ucfirst($row_Recordset2['anuncio']); ?>" />
            <input name="asunto" type="hidden" id="asunto" value="Anuncio Clasificado de SRL Clasificado" />
            <input name="precio" type="hidden" id="precio" value="<?php echo $row_Recordset2['precio']; ?>" />
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
