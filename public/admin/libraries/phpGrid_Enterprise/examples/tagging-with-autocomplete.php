<?php
use phpGrid\C_DataGrid;

require_once("../conf.php");
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Editing tags with Autocomplete | phpGrid</title>
</head>
<body> 

<h2>Editing tags with Autocomplete</h2>
<p>
	Edit <strong>Office Code</strong> in the pop-up form to see the tagging feature.
</p>


<?php
$dg = new C_DataGrid("select employeeNumber, lastName, firstName, isActive, officeCode, extension from employees", "employeeNumber", "employees");
$dg -> set_col_title("lastName", "Last Name");
$dg -> set_col_title("firstName", "First Name");
$dg -> set_col_title("isActive", "Active?");
$dg -> set_col_title("officeCode", "Office Code")->set_col_width("officeCode", 300);
$dg -> set_col_format("email", "email");
$dg -> set_col_format("isActive", "checkbox");
$dg -> enable_edit("FORM", "CRUD");
$dg -> set_row_color("","");
$dg -> set_col_hidden('employeeNumber',true);

$dg -> set_col_edittype("isActive", "checkbox","1:0");
$dg -> set_col_edittype("reportsTo", "select", "Select employeeNumber, concat(firstName, ' ', lastName) from employees",true);
$dg -> set_col_edittype("officeCode", "autocomplete", "Select officeCode,city from offices",true);
$dg->enable_search(true);
$dg -> display();
?>

</body>
</html>
</html>