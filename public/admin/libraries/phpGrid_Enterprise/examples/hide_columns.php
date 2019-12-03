<?php
use phpGrid\C_DataGrid;

require_once("../conf.php");      
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Hiden Columns</title>
</head>
<body> 

<?php
$dg = new C_DataGrid("SELECT * FROM orders", "orderNumber", "orders");

// change column titles
$dg -> set_col_title("orderNumber", "Order No.");
$dg -> set_col_title("orderDate", "Order Date");
$dg -> set_col_title("shippedDate", "Shipped Date");
$dg -> set_col_title("customerNumber",  "Customer No.");

// hide a column
$dg -> set_col_hidden("requiredDate");
$dg -> set_col_hidden("orderDate");


$dg->enable_export('HTML');
$dg -> display();
?>

</body>
</html>