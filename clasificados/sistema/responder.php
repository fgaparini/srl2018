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

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE preguntas SET respuesta=%s, fecha_respuesta=%s WHERE pregunta_id=%s AND clasificado_id=%s",
                       GetSQLValueString($_POST['responder'], "text"),
                       GetSQLValueString($_POST['fecha'], "text"),
                       GetSQLValueString($_POST['preg_id'], "int"),
                       GetSQLValueString($_POST['clasi_id'], "text"));

  mysql_select_db($database_clasificados, $clasificados);
  $Result1 = mysql_query($updateSQL, $clasificados) or die(mysql_error());

  $updateGoTo = "confirmar_responder.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

//datos Preuntas
$fecha = date('d/m/y');
$tipo_clasi = $_GET['tipo_clasi'];
$clasi_id = $_GET['pregunta_id'];
$rubro =  $clasi_id.'_id' ;
$usuario_art_id = $_GET['usuario_art_id'];
$colname_Recordset2 = "-1";
if (isset($_GET['pregunta_id'])) {
  $colname_Recordset2 = $_GET['pregunta_id'];
}
$user_Recordset2 = "-1";
if (isset($_SESSION ['MM_Username'])) {
  $user_Recordset2 = $_SESSION ['MM_Username'];
}
mysql_select_db($database_clasificados, $clasificados);
$query_Recordset2 = sprintf("SELECT * FROM preguntas, usuarios WHERE preguntas.pregunta_id = %s AND usuarios.usuario=%s", GetSQLValueString($colname_Recordset2, "int"),GetSQLValueString($user_Recordset2, "text"));
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
<style type="text/css">
<!--
body {
	background-color: #FFF7F0;
	margin-top: 20px;
	margin-left: 25px;
}
-->
</style></head>

<body>
<table width="389" border="0" align="left" cellpadding="0" cellspacing="0">
  <tr>
    <td width="389" class="texto_opciones"><strong>Responder Consulta</strong></td>
  </tr>
  <tr>
    <td width="389"><form action="<?php echo $editFormAction; ?>" id="form1" name="form1" method="POST">
      <table width="365" border="0" align="left" cellpadding="0" cellspacing="0">
        <tr>
          <td width="99" bgcolor="#FF3300" class="menu_superior"><div align="center"><strong>Respuesta</strong></div></td>
          <td width="266" valign="middle" bgcolor="#FF3300" class="texto_opciones">
            <div align="left">
              <textarea name="responder" cols="40" rows="7" id="responder"></textarea>
            </div></td>
        </tr>
        <tr>
          <td width="99" bgcolor="#FF3300">&nbsp;</td>
          <td valign="middle" bgcolor="#FF3300">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="2" bgcolor="#FFFFCC"><div align="center">
            <input name="preg_id" type="hidden" id="preg_id" value="<?php echo $row_Recordset2['pregunta_id']; ?>" />
            <input name="clasi_id" type="hidden" id="clasi_id" value="<?php echo $row_Recordset2['clasificado_id']; ?>" />
            <input name="fecha" type="hidden" id="fecha" value="<?php echo $fecha; ?>" />
            <input type="submit" name="Submit" value="Guardar" />
          </div></td>
          </tr>
      </table>
        
        <div align="center"></div>
       
        <div align="center"></div>
        
        
        <input type="hidden" name="MM_update" value="form1" />
    </form>      </td>
  </tr>
  <tr>
    <td><?PHP echo $clasi_id  ;?>&nbsp;<?php echo $row_Recordset2['usuario_pregunta']; ?></td>
  </tr>
</table>
<div align="left"></div>
</body>
</html>
<?php
mysql_free_result($Recordset2);

mysql_free_result($Recordset3);
?>
