<?php
use phpGrid\C_DataGrid;

require_once("../conf.php");      
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>phpGrid | Rating</title>
</head>
<body>
<?php
$dg = new C_DataGrid("SELECT id, Contact_Last, Title, Company, Rating, Email FROM contact", "id", "contact");
$dg->set_col_format('Rating', 'rating');
$dg->set_dimension(800);
$dg -> display();
?>


</body>
</html>