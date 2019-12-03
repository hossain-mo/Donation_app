<?php
use phpGrid\C_DataGrid;

require_once("../conf.php");      
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Excel Edit Mode</title>
</head>
<body>

<h2>Excel mode - How to use</h2>

<ul>
	<li>Use keyboard arrow keys to navigate the table cell like Excel. 
	<li>Press Enter key to edit a cell. Enter again to save. 
	<li>While editing, press Tab key to move the next adjacent cell. 
</ul>

<div id="mydiv" style="width:600px">
<?php
$dg = new C_DataGrid("SELECT * FROM orders", "orderNumber", "orders");
$dg->enable_autowidth(true)->enable_autoheight(true);//->set_col_hidden('comments');
$dg->set_pagesize(100); // need to be a large number
$dg->set_scroll(true);
$dg->enable_kb_nav(true);
$dg->enable_edit('CELL');
$dg -> display();
?>
</div>

<script>
// hide horizontal scroll bar 
$(function($){
	$('.ui-jqgrid .ui-jqgrid-bdiv').css('overflow-x', 'hidden');
});
</script>

</body>
</html>