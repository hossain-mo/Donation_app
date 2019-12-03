<?php
// companion loader file for tabbed_grid.php (Tabbed datagrid)

use phpGrid\C_DataGrid;
require_once("../conf.php");      

$tableName = (isset($_GET['gn']) && isset($_GET['gn']) !== '') ? $_GET['gn'] : 'orders';

// SECURITY CHECK
$tablesWhitelist = array('employees', 'products', 'customers', 'suppliers', 'orders');

if(!in_array($tableName, $tablesWhitelist))
	die("The table $tableName is not whitelisted.");

$dg = new C_DataGrid("SELECT * FROM ". $tableName);
$dg->enable_edit()->set_dimension('1100');
$dg -> display();
