<?php require_once('../Connections/noticias.php'); ?>
<?php
mysql_select_db($database_noticias, $noticias);
$query_Recordset1 = "SELECT * FROM noticias ORDER BY noticias_id ASC";
$Recordset1 = mysql_query($query_Recordset1, $noticias) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<?php echo nl2br($row_Recordset1['nota']); ?>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
