<?php
use phpGrid\C_DataGrid;

require_once("../conf.php");      
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>A Basic PHP Datagrid for Microsoft Access | phpGrid</title>
</head>
<body>

<h1>phpGrid for Microsoft Acceess (Requires local read permission)</h1>

<div><span class="fa fa-download"> </span>  <a href="SampleDB/QrySampl.mdb">Access sample database</a> for this demo</div><br />

<?php
$dg = new C_DataGrid("SELECT * FROM Suppliers", "supplierCode", "Suppliers");
$dg -> display();
?>

</body>
</html>