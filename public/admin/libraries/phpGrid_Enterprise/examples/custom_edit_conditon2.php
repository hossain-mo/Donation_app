<?php
use phpGrid\C_DataGrid;

require_once("../conf.php");
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>phpGrid Custom Edit Condition using set_edit_condition</title>
</head>
<body>

<?php
$dg = new C_DataGrid("SELECT * FROM orders", "orderNumber", "orders");
$dg->set_col_hidden('comments');

$dg->enable_edit('INLINE', 'CRUD');
$dg -> set_edit_condition(array('status' => '=="Shipped"', '&&', 'customerNumber' => '==141' ));
$dg->set_grid_property(array('onSelectRow'=>''));
$dg -> display();

?>

        </body>
    </html>
