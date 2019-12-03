<?php
use phpGrid\C_DataGrid;

require_once("../conf.php");      
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>A Basic PHP Datagrid</title>
</head>
<body>
<?php
$dg = new C_DataGrid("SELECT * FROM orders", "orderNumber", "orders");
$dg->set_col_headerTooltip("customerNumber", "hello from space.");
$dg -> display();
?>

<script>
// add tooltip using jQuery
jQuery(document).ready(function($){
    jQuery("tr.ui-jqgrid-labels th:eq(0)").attr("title", "Column 1 header title");
    jQuery("tr.ui-jqgrid-labels th:eq(1)").attr("title", "Column 2 header title");
    jQuery("tr.ui-jqgrid-labels th:eq(2)").attr("title", "Column 3 header title");
});
</script>
</body>
</html>