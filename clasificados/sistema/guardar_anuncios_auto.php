<?php require_once('../../Connections/clasificados.php'); ?>
<?php
if (!isset($_SESSION)) {
  session_start();
}
$MM_authorizedUsers = "Usuarios";
$MM_donotCheckaccess = "true";

// *** Restrict Access To Page: Grant or deny access to this page
function isAuthorized($strUsers, $strGroups, $UserName, $UserGroup) { 
  // For security, start by assuming the visitor is NOT authorized. 
  $isValid = False; 

  // When a visitor has logged into this site, the Session variable MM_Username set equal to their username. 
  // Therefore, we know that a user is NOT logged in if that Session variable is blank. 
  if (!empty($UserName)) { 
    // Besides being logged in, you may restrict access to only certain users based on an ID established when they login. 
    // Parse the strings into arrays. 
    $arrUsers = Explode(",", $strUsers); 
    $arrGroups = Explode(",", $strGroups); 
    if (in_array($UserName, $arrUsers)) { 
      $isValid = true; 
    } 
    // Or, you may restrict access to only certain users based on their username. 
    if (in_array($UserGroup, $arrGroups)) { 
      $isValid = true; 
    } 
    if (($strUsers == "") && true) { 
      $isValid = true; 
    } 
  } 
  return $isValid; 
}

$MM_restrictGoTo = "no_login.php";
if (!((isset($_SESSION['MM_Username'])) && (isAuthorized("",$MM_authorizedUsers, $_SESSION['MM_Username'], $_SESSION['MM_UserGroup'])))) {   
  $MM_qsChar = "?";
  $MM_referrer = $_SERVER['PHP_SELF'];
  if (strpos($MM_restrictGoTo, "?")) $MM_qsChar = "&";
  if (isset($QUERY_STRING) && strlen($QUERY_STRING) > 0) 
  $MM_referrer .= "?" . $QUERY_STRING;
  $MM_restrictGoTo = $MM_restrictGoTo. $MM_qsChar . "accesscheck=" . urlencode($MM_referrer);
  header("Location: ". $MM_restrictGoTo); 
  exit;
}
?>
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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO anuncios_guardados (anuncio_id, anuncio_nombre, anuncio_rubro, anuncio_texto, anuncio_fecha, usuario_id, categoria, subrubro, base) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['anuncio_id'], "text"),
                       GetSQLValueString($_POST['titulo'], "text"),
                       GetSQLValueString($_POST['rubro'], "text"),
                       GetSQLValueString($_POST['anuncio'], "text"),
                       GetSQLValueString($_POST['fecha'], "text"),
                       GetSQLValueString($_POST['usuario_id'], "text"),
                       GetSQLValueString($_POST['categoria'], "text"),
                       GetSQLValueString($_POST['subrubro'], "text"),
                       GetSQLValueString($_POST['base'], "text"));

  mysql_select_db($database_clasificados, $clasificados);
  $Result1 = mysql_query($insertSQL, $clasificados) or die(mysql_error());

  $insertGoTo = "guadar_confirmacion.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

mysql_select_db($database_clasificados, $clasificados);
$query_Recordset1 = "SELECT * FROM anuncios_guardados, usuarios WHERE anuncios_guardados.usuario_id = usuarios.id_usuario";
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
$query_Recordset2 = sprintf("SELECT * FROM autos WHERE autos_id = %s", $colname_Recordset2);
$Recordset2 = mysql_query($query_Recordset2, $clasificados) or die(mysql_error());
$row_Recordset2 = mysql_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysql_num_rows($Recordset2);

$colname_Recordset3 = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_Recordset3 = (get_magic_quotes_gpc()) ? $_SESSION['MM_Username'] : addslashes($_SESSION['MM_Username']);
}
mysql_select_db($database_clasificados, $clasificados);
$query_Recordset3 = sprintf("SELECT * FROM usuarios WHERE usuario = '%s'", $colname_Recordset3);
$Recordset3 = mysql_query($query_Recordset3, $clasificados) or die(mysql_error());
$row_Recordset3 = mysql_fetch_assoc($Recordset3);
$totalRows_Recordset3 = mysql_num_rows($Recordset3);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Guardar Anuncio</title>
<link href="../clasificados.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="350" border="0" align="left" cellpadding="0" cellspacing="0">
  <tr>
    <td width="367" class="texto_opciones">Ud va a guardar en su archivos de<br/> 
    <span class="titulo_anuncios">Anuncios Guardados</span> el anuncio:</td>
  </tr>
  <tr>
    <td width="350"><form id="form1" name="form1" method="POST" action="<?php echo $editFormAction; ?>">
      <table width="350" border="0" align="left" cellpadding="0" cellspacing="0">
        <tr>
          <td width="80" bgcolor="#FFFFCC" class="chamullo_guias"><div align="right"><strong>Titulo</strong></div></td>
          <td width="265" valign="middle" bgcolor="#FFFFCC" class="texto_opciones">
            
              <div align="left">
                <input name="titulo" type="text" id="titulo" value="<?php echo $row_Recordset2['nombre']; ?>" />
                </label>
            </div></td>
        </tr>
        <tr>
          <td width="80" bgcolor="#FFFFCC" class="chamullo_guias"><div align="right"><strong>Tipo</strong></div></td>
          <td valign="middle" bgcolor="#FFFFCC" class="texto_opciones">
            <div align="left">
              <input name="categoria" type="text" id="categoria" value="<?php echo $row_Recordset2['tipo']; ?>" />
              </div></td>
        </tr>
        <tr>
          <td bgcolor="#FFFFCC" class="chamullo_guias"><div align="right"><strong>Marca</strong></div></td>
          <td valign="middle" bgcolor="#FFFFCC" class="texto_opciones"><div align="left">
              <input name="rubro" type="text" id="rubro" value="<?php echo $row_Recordset2['marca']; ?>" />
          </div></td>
        </tr>
        <tr>
          <td width="80" bgcolor="#FFFFCC" class="chamullo_guias"><div align="right"><strong>Modelo</strong></div></td>
          <td valign="middle" bgcolor="#FFFFCC" class="texto_opciones">
            <div align="left">
              <input name="subrubro" type="text" id="subrubro" value="<?php echo $row_Recordset2['modelo']; ?>" />
              </div></td>
        </tr>
        <tr>
          <td width="80" bgcolor="#FFFFCC" class="chamullo_guias"><div align="right"><strong>anuncio</strong></div></td>
          <td valign="middle" bgcolor="#FFFFCC" class="texto_opciones">
            <div align="left">
              <textarea name="anuncio" cols="23" rows="7" id="anuncio"><?php echo ucfirst($row_Recordset2['anuncio']); ?></textarea>
              </div></td>
        </tr>
        <tr>
          <td bgcolor="#FFFFCC" class="chamullo_guias"><div align="right"><strong>Precio</strong></div></td>
          <td valign="middle" bgcolor="#FFFFCC" class="texto_opciones"><div align="left">
              <input name="precio" type="text" id="precio" value="<?php echo $row_Recordset2['precio']; ?>" />
          </div></td>
        </tr>
        <tr>
          <td colspan="2" bgcolor="#FFFFCC"><div align="center">
            <input name="base" type="hidden" id="base" value="auto" />
            <input name="fecha" type="hidden" id="fecha" value="<?php echo $row_Recordset2['fecha']; ?>" />
            <input name="anuncio_id" type="hidden" id="anuncio_id" value="<?php echo $anuncio_id ; ?>" />
            <input name="usuario_id" type="hidden" id="usuario_id" value="<?php echo $row_Recordset3['id_usuario']; ?>" />
            <input type="submit" name="Submit" value="Guardar" />
          </div></td>
          </tr>
      </table>
        
        <div align="center"></div>
       
        <div align="center"></div>
        <input type="hidden" name="MM_insert" value="form1">
    </form>
    </td>
  </tr>
  <tr>
    <td><span class="titulo_anuncios"></span></td>
  </tr>
</table>
<div align="left"></div>
</body>
</html>
<?php
mysql_free_result($Recordset1);

mysql_free_result($Recordset2);

mysql_free_result($Recordset3);
?>
