<?php
// Obtain selected row ID for demo file 'select_multiple_rows.php'
if(isset($_POST['selectedRows'])){

    $selectedRows = $_POST['selectedRows'];
    
    foreach($selectedRows as $key => $value){
    
        // entire row
        if(is_array($value)) {

            print_r($value);
            // do something here such as loop each field and save it to database
            // foreach($value as $key => $val){
            // .....
            // }

        // id only
        } else {

            echo $value .',';
            // do something here such as update records by id

        }
    }
}
?>