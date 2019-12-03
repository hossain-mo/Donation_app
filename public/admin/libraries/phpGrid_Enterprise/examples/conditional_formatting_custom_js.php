<?php
use phpGrid\C_DataGrid;

require_once("../conf.php");
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>phpGrid Conditional Formatting with Custom Javascript</title>
</head>
<body>

<?php
// note this should not replace database role-based or user-based permissions.
$onGridLoadComplete = <<<ONGRIDLOADCOMPLETE
function(status, rowid)
{
    var ids = jQuery("#orders").jqGrid('getDataIDs');
    for (var i = 0; i < ids.length; i++)
    {
        var rowId = ids[i];
        var rowData = jQuery('#orders').jqGrid ('getRowData', rowId);

        var requiredDate = new Date($("#orders").jqGrid("getCell", rowId, "requiredDate"));
        var shippedDate = new Date($("#orders").jqGrid("getCell", rowId, "shippedDate"));

        // compare two dates and set custom display in another field "status" 
        if(requiredDate < shippedDate){
            
            $("#orders").jqGrid("setCell", rowId, "status", '', {'background-color':'gold'}); 
                
        }
    }

}
ONGRIDLOADCOMPLETE;


$dg = new C_DataGrid("SELECT * FROM orders", "orderNumber", "orders");
$dg->set_col_hidden('comments');
$dg->add_event("jqGridLoadComplete", $onGridLoadComplete);
$dg->enable_edit('INLINE', 'CRUD');

$dg -> display();
?>
        </body>
    </html>
