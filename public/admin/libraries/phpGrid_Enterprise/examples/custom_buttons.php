<?php
use phpGrid\C_DataGrid;

//include('../../Glimpse/index.php');
require_once("../conf.php");      
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>A Basic PHP Datagrid</title>
</head>
<body>
<?php
$dg = new C_DataGrid("SELECT * FROM orders", "orderNumber", "orders");

// change column titles
$dg -> set_col_title("orderNumber", "Order No.");
$dg -> set_col_title("orderDate", "Order Date");
$dg -> set_col_title("shippedDate", "Shipped Date");
$dg -> set_col_title("customerNumber", "Customer No.");

$dg->set_col_hidden('comments');
$dg->set_col_edittype('orderNumber', 'select', 'select orderNumber, orderNumber from orders');

$dg->cust_prop_jsonstr = 'actionsNavOptions: {
                addUsericon: "fa-user-plus",
                addUsertitle: "Add user",
                deleteUsericon: "fa-user-times",
                deleteUsertitle: "Delete user",
                addToCarticon: "fa-cart-plus",
                addToCarttitle: "Add item to the cart",
                custom: [
                    { action: "addUser", position: "first", onClick: function (options) { alert("Add user, rowid=" + options.rowid); } },
                    { action: "addToCart", position: "first", onClick: function (options) { alert("Add to Cart, rowid=" + options.rowid); } },
                    { action: "deleteUser", onClick: function (options) { alert("Delete user, rowid=" + options.rowid); } }
                ]
            },';

$dg->add_column("actions", array('name'=>'actions',
    'index'=>'actions',
    'width'=>'150',
    'formatter'=>'actions',
    'formatoptions'=>array('keys'=>true, 'editbutton'=>true, 'delbutton'=>true)),'Actions');
$dg -> display();
?>


</body>
</html>