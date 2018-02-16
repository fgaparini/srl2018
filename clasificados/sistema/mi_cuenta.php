<?php require_once('../../Connections/clasificados.php'); ?>
<?php
mysql_select_db($database_clasificados, $clasificados);
$query_Recordset1 = "SELECT * FROM usuarios";
$Recordset1 = mysql_query($query_Recordset1, $clasificados) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
<style type="text/css">
<!--
body {
	background-color: #FFFFFF;
}
.Estilo1 {color: #FFFFFF}
.Estilo3 {color: #FFFFFF; font-weight: bold; }
-->
</style>
<link href="../clasificados.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="404" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="2"><div align="center"><span class="sos_nuevo">Para aceder a estas herramientas debes estar registrado</span></div></td>
  </tr>
  <tr>
    <td width="6" height="53">&nbsp;</td>
    <td width="398"><div align="center" class="titulo_anuncios">
      <form id="form2" name="form2" method="post" action="../clasificados/login.php">
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
            <td height="19" colspan="3" valign="top" bgcolor="#FFFFFF" class="texto_anuncio">&nbsp;</td>
          </tr>
        </table>
      </form>
      <p><a href="../registro.php" target="_blank" class="texto_mediano"></a></p>
      </div></td>
  </tr>
  <tr>
    <td height="88" colspan="2" class="opciones">&nbsp;</td>
  </tr>
</table>
<p class="Estilo1">&nbsp;</p>
<p align="center">&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
