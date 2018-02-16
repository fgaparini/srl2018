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
$fecha = date('d/m/y');
$tipo_clasi = $_GET['tipo_clasi'];
$clasi_id = $_GET['clasi_id'];
$usuario_art_id = $_GET['usuario_art_id'];


  
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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO preguntas (usuario_pregunta, usuario_art_id, pregunta, clasificado_id, fecha_pregunta, tipo_clasi) VALUES (%s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['usuario_pregunta'], "text"),
                       GetSQLValueString($_POST['usuario_art_id'], "text"),
                       GetSQLValueString($_POST['pregunta'], "text"),
                       GetSQLValueString($_POST['clasi_id'], "text"),
                       GetSQLValueString($_POST['fecha'], "text"),
                       GetSQLValueString($_POST['tipo_clasi'], "text"));

  mysql_select_db($database_clasificados, $clasificados);
  $Result1 = mysql_query($insertSQL, $clasificados) or die(mysql_error());

  $insertGoTo = "pregunta_confirmacion.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

//datos Preguntas

$colname_Recordset3 = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_Recordset3 = $_SESSION['MM_Username'];
}
mysql_select_db($database_clasificados, $clasificados);
$query_Recordset3 = sprintf("SELECT * FROM usuarios WHERE usuario = %s", GetSQLValueString($colname_Recordset3, "text"));
$Recordset3 = mysql_query($query_Recordset3, $clasificados) or die(mysql_error());
$row_Recordset3 = mysql_fetch_assoc($Recordset3);
$totalRows_Recordset3 = mysql_num_rows($Recordset3);

$colname_Recordset4 = "-1";
if (isset($_GET['usuario_art_id'])) {
  $colname_Recordset4 = $_GET['usuario_art_id'];
}
mysql_select_db($database_clasificados, $clasificados);
$query_Recordset4 = sprintf("SELECT * FROM usuarios WHERE id_usuario = %s", GetSQLValueString($colname_Recordset4, "int"));
$Recordset4 = mysql_query($query_Recordset4, $clasificados) or die(mysql_error());
$row_Recordset4 = mysql_fetch_assoc($Recordset4);
$totalRows_Recordset4 = mysql_num_rows($Recordset4);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Hacer Pregunta Vendedor</title>
<link href="../clasificados.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
body {
	background-color: #FFF7F0;
	margin-top: 30px;
}
-->
</style></head>

<body>
<table width="499" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFF7F0">
  <tr>
    <td width="499" class="texto_opciones"><strong>Realize una consulta al vendedor</strong></td>
  </tr>
  <tr>
    <td width="499"><form id="form1" name="form1" method="POST" action="<?php echo $editFormAction; ?>">
      <table width="494" border="0" align="left" cellpadding="0" cellspacing="0">
        <tr>
          <td width="114" height="233" bgcolor="#FF3300" class="menu_superior"><div align="center"><strong>Pregunta</strong></div></td>
          <td width="380" align="center" valign="middle" bgcolor="#FF3300" class="texto_opciones">
            <div align="left">
              <textarea name="pregunta" cols="60" rows="10" id="pregunta"></textarea>
            </div></td>
        </tr>
        <tr>
          <td width="114" bgcolor="#FF3300">&nbsp;</td>
          <td valign="middle" bgcolor="#FF3300">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="2" bgcolor="#FFFFCC"><div align="center">
            <input name="fecha" type="hidden" id="fecha" value="<?php echo $fecha; ?>" />
            <input name="clasi_id" type="hidden" id="clasi_id" value="<?php echo $clasi_id ; ?>" />
            <input name="usuario_pregunta" type="hidden" id="usuario_pregunta" value="<?php echo $row_Recordset3['usuario']; ?>" />
            <input name="usuario_art_id" type="hidden" id="usuario_art_id" value="<?php echo $usuario_art_id; ?>" />
            <input name="tipo_clasi" type="hidden" id="tipo_clasi" value="<?php echo $tipo_clasi; ?>" />
            <input type="submit" name="Submit" value="Guardar" />
          </div></td>
          </tr>
      </table>
        
        <div align="center"></div>
       
        <div align="center"></div>
        <input type="hidden" name="MM_insert" value="form1" />
    </form>    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
<div align="left"></div>
</body>
</html>
<?php
mysql_free_result($Recordset3);

mysql_free_result($Recordset4);
?>
