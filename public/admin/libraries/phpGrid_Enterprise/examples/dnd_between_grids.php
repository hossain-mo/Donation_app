<?php
use phpGrid\C_DataGrid;

require_once("../conf.php");      
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Drag and Drop Between Grids</title>
<style>
    div#bigcontainer{
        min-width: 2000px;
        width: 100%;
    }
    div#dg1, div#dg2, div#dg3{
        float:left;
        margin-right:15px;
    }
</style>
</head>
<body> 


<div id="bigcontainer">
  <div id="dg1">
    <h2>Drag a row from the orders table</h2>
    <?php
    $dg = new C_DataGrid("SELECT * FROM orders", "orderNumber", 'orders');
    $dg->enable_edit("FORM", "CRUD"); 
    $dg->set_col_hidden('requiredDate, shippedDate, customerNumber, contractDateTime');
    $dg->display();
    ?>
  </div>

  <div id="dg2">
    <h2>Drop the row here</h2>
    <?php
    $dg2 = new C_DataGrid("select * from employees", "employeeNumber", "employees");
    $dg2->enable_edit("FORM", "CRUD"); 
    $dg2->set_col_hidden('firstName, officeCode, reportsTo, isActive');
    $dg2->display();
    ?>
  </div>
</div>

<script>
$(function(){
  jQuery("#orders").jqGrid("sortableRows", {});
  jQuery("#employees").jqGrid("sortableRows", {});

  // ref: http://www.trirand.com/jqgridwiki/doku.php?id=wiki:jquery_ui_methods#drag_and_drop_rows_between_grids
  jQuery("#orders").jqGrid('gridDnD',{
    connectWith:'#employees',
    /*
    onstart: function(){},
    onstop: function(){},
    beforedrop: function(){},
    ondrop: function(){},
    drop_opts: {}, // http://jqueryui.com/droppable/
    drag_opts: {},  // http://jqueryui.com/draggable/
    dropbyname: true,
    autoid: true,
    dragcopy, false,
    */
    drop_opts:{
      hoverClass: "ui-state-active",
    },
    ondrop: function(evt, obj, data){
      console.log(data);
      $.ajax({
          method: "POST",
          url: "save_dropped_row.php",
          data: data,
        }).done(function( msg ) {
            console.log( "Data Saved: " + msg );
        })
    },

  });  
})
</script>
</body>
</html>