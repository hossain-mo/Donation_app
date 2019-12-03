<?php
use phpGrid\C_DataGrid;

require_once("../conf.php");      
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Large database| phpGrid</title>
</head>
<body>
<h1>Large dataset (salaries) with 3 million records!</h1>
<p>
	The <code>salaries</code> table still has excellent performance with nearly 3 million records!  
</p>

<?php
$dg = new C_DataGrid("SELECT * FROM salaries", "emp_no", "salaries",
												array("hostname"=>"localhost",
												"username"=>"root",
												"password"=>"",
												"dbname"=>"employees", 
												"dbtype"=>"mysql", 
												"dbcharset"=>"utf8"));
$dg->enable_edit('INLINE')->set_dimension('800px');
$dg->enable_pagecount(false);
$dg->enable_export(true);
$dg -> display();
?>


</body>
</html>