<?php
use phpGrid\C_DataGrid;

require_once("../conf.php");      
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Summary Row</title>
</head>
<body>

<?php
$dg = new C_DataGrid('SELECT customerName, city, state, creditLimit FROM customers', 'customerName', 'customers'); // Basic
$dg -> set_caption('phpGrid Summary Row');
$dg -> set_query_filter("state is not null"); // Where clause
$dg -> set_col_format('creditLimit','integer', array('thousandsSeparator'=>',', 'defaultValue'=>'0'));
$dg->set_pagesize('100000');
$dg->set_scroll(true);
$dg->set_grid_property(array("footerrow"=>true));
$loadComplete = <<<LOADCOMPLETE
function ()
{
    var colSum = $('#customers').jqGrid('getCol', 'creditLimit', false, 'sum');
    var reccount = jQuery("#customers").jqGrid('getGridParam', 'reccount');
    var avg = Math.round(colSum/reccount * 100/100);

    $('#customers').jqGrid('footerData', 'set', { state: 'Avg:', 'creditLimit': avg });
}
LOADCOMPLETE;
$dg->add_event("jqGridLoadComplete", $loadComplete);

$dg -> display();

?>
</body>
</html>