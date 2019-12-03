<?php 
use phpGrid\C_DataBase as C_DataBase;
use phpGrid\C_DataGrid as C_DataGrid;
use phpGrid\C_Utility as C_Utility;
use phpGrid\C_SessionMaker as C_SessionMaker;

require_once('phpGrid.php');

$session = C_SessionMaker::getSession(FRAMEWORK);

$gridName   = isset($_GET['gn']) ? $_GET['gn'] : die('PHPGRID_ERROR: ULR parameter "gn" is not defined.');
$data_type  = isset($_GET['dt']) ? $_GET['dt']:'json';

$grid_sql	= $session->get(GRID_SESSION_KEY.'_'.$gridName.'_sql');
$sql_key	= unserialize($session->get(GRID_SESSION_KEY.'_'.$gridName.'_sql_key'));
$sql_fkey	= $session->get(GRID_SESSION_KEY.'_'.$gridName.'_sql_fkey');
$sql_table	= $session->get(GRID_SESSION_KEY.'_'.$gridName.'_sql_table');
$sql_filter	= $session->get(GRID_SESSION_KEY.'_'.$gridName.'_sql_filter');
$db_connection = unserialize($session->get(GRID_SESSION_KEY.'_'.$gridName.'_db_connection'));
$has_pagecount  = $session->get(GRID_SESSION_KEY.'_'.$gridName.'_pagecount');


//establish db connection
$cn = $db_connection;
if(empty($cn)){  // PHPGRID_DB_OPTIONS is DB2 specific
    if(PHPGRID_DB_TYPE == 'db2' || PHPGRID_DB_TYPE == 'db2_dsn'){
        $db = new C_Database(PHPGRID_DB_HOSTNAME, PHPGRID_DB_USERNAME, PHPGRID_DB_PASSWORD, PHPGRID_DB_NAME, PHPGRID_DB_TYPE, PHPGRID_DB_CHARSET, unserialize(PHPGRID_DB_OPTIONS), $sql_table);
    } else {
        $db = new C_DataBase(PHPGRID_DB_HOSTNAME, PHPGRID_DB_USERNAME, PHPGRID_DB_PASSWORD, PHPGRID_DB_NAME, PHPGRID_DB_TYPE, PHPGRID_DB_CHARSET, $sql_table);
    }
}
else { // multiple database support
    $db = new C_DataBase($cn["hostname"],$cn["username"],$cn["password"],$cn["dbname"],$cn["dbtype"],$cn["dbcharset"], $sql_table);
}

//print_r($dg->col_hiddens);

$page = $_GET['page'];
$limit = $_GET['rows'];  // get how many rows we want to have into the grid - rowNum parameter in the grid
$sidx = $_GET['sidx'];  // get index row - i.e. user click to sort. At first time sortname parameter - // after that the index from colModel
$sord = $_GET['sord'];  // sorting order - at first time sortorder
   
$rs     = $db->select_limit($grid_sql, 1, 0);

// prepare sql where statement.
$sqlWhere = "";
$searchOn = (isset($_REQUEST['_search']) && $_REQUEST['_search'] =='true')?true:false;
if($searchOn) {
    $col_dbnames = array();
    $col_dbnames = $db->get_col_dbnames($rs);        

	//print_r($col_dbnames);
	// check if the key is actual a database field. If true, add it to SQL Where (sqlWhere) statement
    foreach($_REQUEST as $key=>$value) {
		//echo 'key:'. $key ."\n";
        if(in_array($key, $col_dbnames)){
            $fm_type = $db->field_metatype($rs, $db->field_index($rs, $key));
            switch ($fm_type) {
                case 'I':
                case 'N':
                case 'R': case 'SERIAL':
                case 'L':
                    $sqlWhere .= " AND ".$key." = ".$value;
                    break;
                default:
                    $sqlWhere .= " AND ".$key." LIKE '".$value."%'";
                    break;
            }			
        }
        
    }

    //integrated toolbar and advanced search    
    if(isset($_REQUEST['filters']) && $_REQUEST['filters'] !=''){
        $operation = array("eq"=>" ='%s' ","ne"=>" !='%s' ","lt"=>" < %s ",
            "le"=>" <= %s ","gt"=>" > %s ","ge"=>" >= %s ",
            "bw"=>" like '%s%%' ","bn"=>" not like '%s%%' " ,
            "in"=> " in (%s) ","ni"=> " not in (%s) ",
            "ew"=> " like '%%%s' ","en"=> " not like '%%%s' ",
            "cn"=> " like '%%%s%%' ","nc"=> " not like '%%%s%%' ");
            
        $filters = json_decode($_REQUEST['filters']);
        $groupOp = $filters->groupOp;	// AND/OR
        $rules = $filters->rules;
		        
        for( $i=0; $i<count($rules); $i++ ){       

            $filter = $operation[$rules[$i]->op];

            // surround date fields with quotes for SQL date comparison
            $fm_type = $db->field_metatype($rs, $db->field_index($rs, $rules[$i]->field));  
            if( $fm_type == 'D' ){

                $dateOps = array('eq', 'ne', 'lt', 'le', 'gt', 'ge');                
                $op = $rules[$i]->op;                
                if( in_array( $op, $dateOps ) ){
                    $filter = str_replace("%s", "'%s'", $filter);
                } 

            }
            
            // apply filter finally
            $sqlWhere .=  $groupOp . " ". $rules[$i]->field .
                sprintf($filter, C_Utility::add_slashes($rules[$i]->data));
        }
    }
}

// remove leading sql AND/OR
$pos = strpos($sqlWhere,'AND ');
if ($pos !== false) {
	$sqlWhere = substr_replace($sqlWhere,'',$pos,strlen('AND '));
}
$pos = strpos($sqlWhere,'OR ');
if ($pos !== false) {
	$sqlWhere = substr_replace($sqlWhere,'',$pos,strlen('OR '));
}

/* (MySql only) Allow reserved keywords (hyphen) in column names for sorting */
if(PHPGRID_DB_TYPE == 'mysql' || PHPGRID_DB_TYPE == 'mysql_dsn'){
    if(strpos($sidx, '-') !== false){  // only escape column name contains '-'
        $sidx = '`'.strtoupper($sidx).'`';
    }
}
// set ORDER BY. Don't use if user hasn't select a sort
$sqlOrderBy = (!$sidx) ? "" : " ORDER BY $sidx $sord";



// ********* prepare the final query ***********************
if($sql_filter != '' && $searchOn){
	$SQL = $grid_sql .' WHERE '. $sql_filter .' AND '. $sqlWhere . $sqlOrderBy;
}elseif($sql_filter != '' && !$searchOn){
	$SQL = $grid_sql .' WHERE '. $sql_filter . $sqlOrderBy;
}elseif($sql_filter == '' && $searchOn){
	$SQL = $grid_sql .' WHERE '. $sqlWhere . $sqlOrderBy;
}else{ // if($sql_filter == '' && !$searchOn){
	$SQL = $grid_sql . $sqlOrderBy;
}

// ******************* execute query finally *****************
// calculate the starting position of the rows 
$start = $limit*$page - $limit;
// if for some reasons start position is negative set it to 0. typical case is that the user type 0 for the requested page 
if($start <0) $start = 0; 
if(PHPGRID_DB_TYPE != 'pdo_odbc_db2'){ $db->db->SetFetchMode(ADODB_FETCH_BOTH); }
$result = $db->select_limit($SQL, $limit, $start);

//print_r($result);
/*
echo 'sql_filter: '. $sql_filter;
echo 'searchOn: '. $searchOn;
echo $SQL . '; LIMIT: '. $limit .'; START: '. $start;
echo '<pre>';
print_r($result);
echo '<pre>';
*/
// ************************ pagination ************************
$count = ($has_pagecount) ? $db->num_rows($db->db_query($SQL)) : 1000000000; // total record count used for pagination (unfortunate performance penality).
// calculate the total pages for the query 
if( $count > 0 && $limit > 0) { 
	$total_pages = ceil($count/$limit); 
}else{ 
	$total_pages = 0; 
} 
// if for some reasons the requested page is greater than the total set the requested page to total page 
if ($page > $total_pages) $page=$total_pages;



// *************** return results in XML or JSON ************
// $data_type = $dg->get_jq_datatype();
switch($data_type)
{
    // render xml. Must set appropriate header information. 
    case "xml":
        $data = "<?xml version='1.0' encoding='utf-8'?>";
        $data .=  "<rows>";
        $data .= "<page>".$page."</page>";
        $data .= "<total>".$total_pages."</total>";
        $data .= "<records>".$count."</records>"; 
        while($row = $db->fetch_array_assoc($result)) {
            $data .= "<row id='". gen_rowids($row, $sql_key) ."'>";
            for($i = 0; $i < $db->num_fields($result); $i++) {
                $col_name = $db->field_name($result, $i);             
                    $data .= "<cell>". $row[$col_name] ."</cell>";    
            }  
            $data .= "</row>";       
        }
        $data .= "</rows>";    

        header("Content-type: text/xml;charset=utf-8");
        echo $data;   
        break;
                 
    case "json":
        $response = new stdClass();   // define anonymous objects
        $response->page = $page;
        $response->total = $total_pages;
        $response->records = $count;
        $i=0;
        $data = array();              
        while($row = $db->fetch_array_assoc($result)) {
            unset($data);
            $response->rows[$i]['id']=C_Utility::gen_rowids($row, $sql_key); //$row[$sql_key];
            for($j = 0; $j < $db->num_fields($result); $j++) {
                $col_name = $db->field_name($result, $j);    
                    if(PHPGRID_DB_TYPE == 'odbc_mssql_native' || PHPGRID_DB_TYPE == 'odbc_mssql'){
                        $data[] = utf8_encode($row[$col_name]);    
                    } else {
                        $data[] = $row[$col_name];    
                    }
            }            
            $response->rows[$i]['cell'] = $data;
            $data = array();    // reset array

            $i++;
        }        
        echo json_encode($response);  
        break;
} 
          
// free resource       
$db = null;