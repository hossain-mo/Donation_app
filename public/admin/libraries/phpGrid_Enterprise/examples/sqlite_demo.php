<?php
use phpGrid\C_DataGrid;
require_once("../conf.php");      
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>phpGrid | Sqlit Demo</title>
</head>
<body>
<?php
$dg = new C_DataGrid("SELECT * FROM Album", "AlbumId", "Album");
$dg->enable_edit();
$dg -> display();
?>


</body>
</html>