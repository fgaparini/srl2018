<?php require_once('Connections/linksnot.php'); ?>
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

$colname_Recordset1 = "-1";
if (isset($_GET['id_publicidad'])) {
  $colname_Recordset1 = $_GET['id_publicidad'];
}
if (isset($_GET['publicidad_id'])) {
  $colname_Recordset1 = $_GET['publicidad_id'];
}
mysql_select_db($database_linksnot, $linksnot );
$query_Recordset1 = sprintf("SELECT * FROM contador WHERE id_publicidad = %s", GetSQLValueString($colname_Recordset1, "int"));
$Recordset1 = mysql_query($query_Recordset1, $linksnot) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
if ( $_GET['publicidad_id'] != NULL) {$id_publi =  $_GET['publicidad_id'];} 
if ( $_GET['id_publicidad'] != NULL) {$id_publi =  $_GET['id_publicidad'];} 
$visitas = $row_Recordset1['visitas'] + 1;
$sql1 = "UPDATE contador SET visitas = '$visitas' WHERE id_publicidad = '$id_publi'"; 
mysql_query($sql1,  $linksnot) or die ("No se pudo insertar los datos en la base de datos 1"); 
$pagina = $row_Recordset1['url'];
header("Location: $pagina"); 


?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>redireccionar</title>
</head>

<body>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
