<?php
use phpGrid\C_DataGrid;

require_once("../conf.php");      
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Displaying Character Count in a Field in Edit Form</title>
</head>
<body> 

<?php
$dg = new C_DataGrid("SELECT `orderNumber`, `orderDate`, `requiredDate`, `shippedDate`, `status`, `comments`, `customerNumber` FROM `orders`", "`orderNumber`", "orders");

$dg -> enable_edit("FORM");

$afterShowForm = <<<AFTERSHOWFORM
function ()
{
    $("#tr_status > td.CaptionTD + td.DataTD").append("<span id='counter'></span>");	
	$("#status").attr("onkeyup","updateCounter()");
}
AFTERSHOWFORM;
$dg->add_event('jqGridAddEditAfterShowForm', $afterShowForm);

$dg -> display();
?>


<style>
/* move the counter atop */
#counter{
	font-size: 8px;
    position: relative;
    top: -15px;
    float: right;
    padding-right: 25px;
    display:inline-block;
}
</style>

<script>
// show how much characters in "status" field input. Max is 10
function updateCounter() {
  var maxChar = 10;
  var pCount = 0;
  var pVal = $("#tr_status > td.CaptionTD + td.DataTD  input").val();
  pCount = pVal.length;
  $("#counter").text(pCount + '/' + maxChar);
}
</script>

</body>
</html>