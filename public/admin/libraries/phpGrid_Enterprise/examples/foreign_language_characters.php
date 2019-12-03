<?php
use phpGrid\C_DataGrid;

require_once("../conf.php");      
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Data grid Foreign Lanugage Display</title>
</head>
<body> 

<?php
//set database name parameter
$dg1 = new C_DataGrid("SELECT * FROM names", "id", "names",
                            array("hostname"=>"localhost",
                                "username"=>"root",
                                "password"=>"",
                                "dbname"=>"utf8db",
                                "dbtype"=>"mysql",
                                "dbcharset"=>"utf8"));

$dg1->enable_edit("INLINE","CRUD")->set_dimension(600);
$dg1 -> display();
?>

</body>
</html>