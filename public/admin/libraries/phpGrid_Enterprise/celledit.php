<?php
use phpGrid\C_DataBase as C_DataBase;
use phpGrid\C_DataGrid as C_DataGrid;
use phpGrid\C_Utility as C_Utility;
use phpGrid\C_SessionMaker as C_SessionMaker;

require_once("phpGrid.php");

$session = C_SessionMaker::getSession(FRAMEWORK);

$gridName   = isset($_GET['gn']) ? $_GET['gn'] : die('PHPGRID_ERROR: URL parameter "gn" is not defined');

$grid_sql    = $session->get(GRID_SESSION_KEY.'_'.$gridName.'_sql');
// $sql_key    = unserialize($session->get(GRID_SESSION_KEY.'_'.$gridName.'_sql_key'));

$parser = new \PHPSQLParser($grid_sql, true);

// print_r($sql_key);
print_r($parser);