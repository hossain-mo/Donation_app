<?php
use phpGrid\C_DataGrid;

require_once("../conf.php");
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>phpGrid - Persist State</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<body>



<?php
$dg = new C_DataGrid("SELECT * FROM orders", "orderNumber", "orders");
$dg->enable_edit('INLINE');
$dg->enable_search(true);
$dg->enable_persist_state(true);
$dg->display();
?>




</body>
</html>