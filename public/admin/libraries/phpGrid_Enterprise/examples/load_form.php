<?php
use phpGrid\C_DataGrid;

require_once("../conf.php");      
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Enable Datagrid Edit - Form only  - Load form</title>
</head>
<body> 

<?php
$dg = new C_DataGrid("select * from employees", "employeeNumber", "employees");
$dg -> set_col_title("employeeNumber", "Emp No.");
$dg -> set_col_title("lastName", "Last Name");
$dg -> set_col_title("firstName", "First Name");
$dg -> set_col_title("isActive", "Active?");
$dg -> set_col_format("email", "email");
$dg -> set_col_format("isActive", "checkbox");
$dg -> enable_edit("FORM");
// $dg -> set_col_hidden('employeeNumber',true);

$dg -> set_col_edittype("isActive", "checkbox","1:0");
$dg -> set_col_edittype("reportsTo", "select", "Select employeeNumber, concat(firstName, ' ', lastName) from employees",true);
$dg -> set_col_edittype("officeCode", "autocomplete", "Select officeCode,city from offices",false);
// - or -
//$dg -> set_col_edittype("officeCode", "autocomplete", "1:San Francisco;2:Boston;3:NYC;4:Paris;5:Tokyo;6:Sydney;7:London");

$dg->form_only()->load_form(1002)
  //->redirect_after_submit('http://php.net')
  ->add_form_group_header('employeeNumber', 'Employee Info')->add_form_group_header('email', 'Other Info')
  ->add_form_tooltip('email', 'Got mail?');//->set_form_dimension('600px');

$dg -> set_theme('lux');
$dg -> display();
?>


</body>
</html>