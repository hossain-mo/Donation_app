<?php
use phpGrid\C_DataBase as C_DataBase;
use phpGrid\C_DataGrid as C_DataGrid;
use phpGrid\C_Utility as C_Utility;
use phpGrid\C_SessionMaker as C_SessionMaker;

require_once("phpGrid.php");

$session = C_SessionMaker::getSession(FRAMEWORK);

if (!isset($HTTP_POST_VARS) && isset($_POST)){ $HTTP_POST_VARS = $_POST;}  // backward compability when register_long_arrays = off in config 
$col_fileupload  = isset($_GET['col']) ? $_GET['col'] : die('phpGrid fatal error: URL parameter "col" for file upload is not defined');
$upload_folder	 = isset($_GET['folder']) ? urldecode($_GET['folder']) : '';

$msg = "";
$error = "";

$gridName   = isset($_GET['gn']) ? $_GET['gn'] : die('phpGrid fatal error: URL parameter "gn" is not defined');
$grid_sql	= $session->get(GRID_SESSION_KEY.'_'.$gridName.'_sql');
$sql_key	= unserialize($session->get(GRID_SESSION_KEY.'_'.$gridName.'_sql_key'));
$sql_fkey	= $session->get(GRID_SESSION_KEY.'_'.$gridName.'_sql_fkey');
$sql_table	= $session->get(GRID_SESSION_KEY.'_'.$gridName.'_sql_table');  
$sql_filter	= $session->get(GRID_SESSION_KEY.'_'.$gridName.'_sql_filter');       
$db_connection = unserialize($session->get(GRID_SESSION_KEY.'_'.$gridName.'_db_connection'));  
// $is_debug		= $session->get(GRID_SESSION_KEY.'_'.$gridName.'_is_debug');

//establish db connection
$cn = $db_connection;
if(empty($cn)){
	$db = new C_DataBase(PHPGRID_DB_HOSTNAME, PHPGRID_DB_USERNAME, PHPGRID_DB_PASSWORD, PHPGRID_DB_NAME, PHPGRID_DB_TYPE, PHPGRID_DB_CHARSET);
}
else {       
	$db = new C_DataBase($cn["hostname"],$cn["username"],$cn["password"],$cn["dbname"],$cn["dbtype"],$cn["dbcharset"]);        
}

$rs			= $db->select_limit($grid_sql, 1, 1);
$pk			= $sql_key; // $dg->get_sql_key();      // primary key
$pk_val     = explode(",", $_POST[JQGRID_ROWID_KEY]);   // e.g. "10104---141,10103---14111", convert to Array
$pk_val_new = $db->quote_fields($rs, $sql_key, $pk_val);
$sql_where = ' ('. implode(',', $sql_key) .') IN ('. implode(',', $pk_val_new) .') ';

$all_columns = $db->get_columns($rs);
// run the m_key through the whitelist or die to avoid SQL injection
if (in_array($col_fileupload, $all_columns)) {
	$select_query = "SELECT ". $col_fileupload ." FROM ". $sql_table ." WHERE ". $sql_where;
} else {
    if(C_Utility::is_debug()){
        echo 'Possible SQL injection detected!' ."\n";
        echo 'Failed SQL: '. $select_query ."\n";
    }
    die('PEC_ERROR: Could not execute query. Error 103.');
}

$result = $db->query_then_fetch_array_first($select_query);
$file_name = (!empty($result)) ? $result[$col_fileupload] : null;

// ----------- delete file from file system -----------
$is_deleted = @unlink($upload_folder . $file_name);
if(C_Utility::is_debug())
	$msg .= ' SQL SELECT: '. $select_query;
if(!$is_deleted)
	$error .= 'File remove failed.';

// ----------- update file name to empty string -----------
$update_query = "UPDATE ". $sql_table ." SET ". $col_fileupload ."=''  WHERE ". $sql_where;
$db->db_query($update_query);
if(C_Utility::is_debug())
	$msg .= ' | SQL UPDATE: '. $update_query;
else
	$msg .= ' OK. ';


// ----------- json return -----------
echo '{"error": "' . $error . '", 
	   "msg": "'   . $msg . '"}';