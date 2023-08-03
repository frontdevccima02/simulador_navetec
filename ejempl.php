<?php require_once('Connections/conexionBDVIdeo.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

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
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
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

$maxRows_Recordset1 = 10;
$pageNum_Recordset1 = 0;
if (isset($_GET['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $_GET['pageNum_Recordset1'];
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;

mysql_select_db($database_conexionBDVIdeo, $conexionBDVIdeo);
$query_Recordset1 = "SELECT * FROM videos";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $conexionBDVIdeo) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);

if (isset($_GET['totalRows_Recordset1'])) {
  $totalRows_Recordset1 = $_GET['totalRows_Recordset1'];
} else {
  $all_Recordset1 = mysql_query($query_Recordset1);
  $totalRows_Recordset1 = mysql_num_rows($all_Recordset1);
}
$totalPages_Recordset1 = ceil($totalRows_Recordset1/$maxRows_Recordset1)-1;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Reporte de Vídeos</title>
<script src="jquery-2.1.4.min.js"></script>
<script src="jspdf.debug.js"></script>
</head>

<body>
<div id="reporte">
<table border="1">
  <tr>
    <td>Clave</td>
    <td>Url</td>
    <td>Descripción</td>
  </tr>
  <?php do { ?>
    <tr>
      <td><?php echo $row_Recordset1['id']; ?></td>
      <td><?php echo $row_Recordset1['url']; ?></td>
      <td><?php echo $row_Recordset1['descripcion']; ?></td>
    </tr>
    <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
</table>
</div>
<p>
  <input name="Imprimir" onclick="DescargarPDF('reporte','Archivo')"  type="submit" id="Imprimir" value="Descargar PDF" />
</p>
<script>
DescargarPDF('reporte','Archivo');
function DescargarPDF(ContenidoID,nombre) {
	
    var pdf = new jsPDF('p', 'pt', 'letter');
	
    html = $('#'+ContenidoID).html();
	
    specialElementHandlers = {};
	
    margins = {top: 10,bottom: 20,left: 20,width: 522};
	
    pdf.fromHTML(html, margins.left, margins.top, {'width': margins.width},function (dispose) {pdf.save(nombre+'.pdf');}, margins);
	
}
</script>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>