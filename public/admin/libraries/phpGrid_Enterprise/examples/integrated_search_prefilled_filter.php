<?php
use phpGrid\C_DataGrid;

require_once("../conf.php");
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>phpGrid - Integrated Search with Prefilled Filter</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<body onload="searchGrid()">

<?php
$dg = new C_DataGrid("SELECT * FROM orders", "orderNumber", "orders");
$dg->set_col_edittype('status', 'select', 'Open:Open;Shipped:Shipped;Cancelled:Cancelled;Disputed:Disputed;On Hold:On Hold');
$dg->enable_search(true);
$dg->display();
?>

<script>
function searchGrid(){
    var grid = jQuery("#orders");
    var gview = grid.parents("div.ui-jqgrid-view");

    grid.jqGrid('setGridParam',{
            postData: {
                filters:'{"groupOp":"AND", \
                          "rules":[{"field":"status","op":"cn","data":"Open"}, \
                                   {"field":"comments","op":"cn","data":"Customer"}]}'
            },
            "search":true,
            page:1
        }).trigger("reloadGrid");
    gview.find("#gs_status").val("Shipped");
    gview.find("#gs_comments").val("Customer");

    grid[0].toggleToolbar();

};
</script>   

</body>
</html>