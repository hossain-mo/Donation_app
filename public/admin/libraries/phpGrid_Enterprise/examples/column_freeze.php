<?php
use phpGrid\C_DataGrid;

require_once("../conf.php");
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>phpGrid - Column Freeze</title>
</head>
<body>
<style type="text/css">
    .ui-jqgrid tr.jqgrow td {
        white-space:nowrap;
    }
</style>
<?php
$dg = new C_DataGrid("SELECT * FROM orders", "orderNumber", "orders");
$dg->set_dimension(500, 400, false);
$dg->set_col_frozen('orderNumber');
$dg->enable_search(true);
$dg->enable_autoresizeOnLoad(false);
$dg -> display();
?>

</body>
</html>