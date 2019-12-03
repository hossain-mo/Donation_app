<?php
use phpGrid\C_DataGrid;

require_once("../conf.php");      
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Custom Datagrid Column Property</title>
</head>
<body> 
<?php
$dg = new C_DataGrid("SELECT * FROM orders", "orderNumber", "orders");
$dg -> set_row_color('yellow', '#abc123', 'lightgray');
$dg -> set_col_property("orderNumber", array("name"=> "Order Number", "width"=> 40));
// display time only
$dg -> set_col_property("orderDate",array("formatter"=>"date", "formatoptions"=>array("srcformat"=>"ISO8601Short","newformat"=>"g:i A")));

$dg->enable_edit('FORM');
$dg -> display();
?>

</body>
</html>