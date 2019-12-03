<?php
use phpGrid\C_DataGrid;

require_once("../conf.php");      
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tabbed Datagrid</title>
</head>
<body>

<h1>Tabbed Datagrid</h1>

<p>The content in each tab is loaded from the loader file <code>tabbed_grid_loader.php</code>.</p>

<?php
$dg = new C_DataGrid("SELECT * FROM orders");
$dg->enable_edit()->set_dimension('1100');
$dg -> display(false);
$grid = $dg -> get_display(false);

$dg -> display_script_includeonce();
?>


<script>
  $( function() {
    $( "#tabs" ).tabs({
	    beforeLoad: function(event, ui) {
	        if(ui.panel.html() == ""){
	        	ui.panel.html('<div class="loading">Loading...</div>');
	        	return true;
	        } else {
	        	return false;
	        }
	    }
	});
  } );
</script>

 
<style>
.loading {
    position: fixed;
    top: 350px;
    left: 50%;
    margin-top: -96px;
    margin-left: -96px;
    opacity: .85;
    border-radius: 25px;
    width: 50px;
    height: 50px;
}

#tabs ul{
	width:1093px;

}
.ui-tabs-panel.ui-widget-content.ui-corner-bottom{
	padding:0;
}
</style>


<div id="tabs">
	<ul>
		<li><a href="#tabs-1">Orders</a></li>
		<li><a href="tabbed_grid_loader.php?gn=employees">Employees</a></li>
		<li><a href="tabbed_grid_loader.php?gn=products">Products</a></li>
		<li><a href="tabbed_grid_loader.php?gn=customers">Customers</a></li>
		<li><a href="tabbed_grid_loader.php?gn=suppliers">Suppliers</a></li>
	</ul>

	<div id="tabs-1" style="padding:0">
		<?php 
		echo $grid;
		?>
	</div>
</div>

</body>
</html>