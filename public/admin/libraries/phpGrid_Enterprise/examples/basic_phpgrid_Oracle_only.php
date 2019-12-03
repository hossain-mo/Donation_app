<?php
use phpGrid\C_DataGrid;

require_once("../conf.php");      
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>A Basic PHP Datagrid</title>
</head>
<body>
<h1>phpGrid Oracle Demo (Requires Oracle on "*LOCAL")</h1>

<p>
Sample phpGrid DB2 connection setting values in conf.php.<br />
<br />
<pre>
  define('PHPGRID_DB_HOSTNAME','*LOCAL');
  define('PHPGRID_DB_USERNAME', '');
  define('PHPGRID_DB_PASSWORD', '');
  define('PHPGRID_DB_NAME', 'SAMPLE');
  define('PHPGRID_DB_TYPE', 'db2');
  define('PHPGRID_DB_OPTIONS', serialize(array('i5_lib' => 'SAMPLE', 'i5_naming' => DB2_I5_NAMING_ON)));
</pre>
<br />
PHPGRID_DB_HOSTNAME is the name of the host. PHPGRID_DB_USERNAME is the database user name PHPGRID_DB_PASSWORD is the database user password. PHPGRID_DB_NAME is the database/schema name PHPGRID_DB_TYPE can be one of the two following values:<br />
<br />

<ul>
	<li>db2
	<li>db2-dsn
</ul>

<br />
PHPGRID_DB_OPTIONS is the options parameter from <a href="http://php.net/manual/en/function.db2-connect.php" target="_new">db2_connect()</a>. This value is optional.
</p>

<hr />
<?php
$dg = new C_DataGrid("SELECT * FROM COURSE", "COURSE_NO", "COURSE");
$dg -> display();
?>
</body>
</html>