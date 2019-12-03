<?php
use phpGrid\C_DataGrid;
use phpGrid\C_DataBase;

require_once("../conf.php");
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Complex MySQL Query</title>
</head>
<body>

<?php
$complex_query = 
       'select 
        s.supplierCode, s.supplierZip, s.supplierPhonenumber,
        spl.productLineNo, spl.productLine,
        p.productName, p.MSRP
        from suppliers s
        inner join supplierproductlines spl on s.supplierCode = spl.supplierCode
        inner join products p on s.supplierZip = p.supplierZip';


/*
-- 1
select distinct z.supplierZip from 
        (select 
        s.supplierCode, s.supplierZip, s.supplierPhonenumber,
        spl.productLineNo, spl.productLine,
        p.productName, p.MSRP
        from suppliers s
        inner join supplierproductlines spl on s.supplierCode = spl.supplierCode
        inner join products p on s.supplierZip = p.supplierZip
        ) z
        where z.productName = '1952 Alpine Renault 1300';

-- 2
select p.productCode from products p where p.supplierZip = '91801-3328' and p.productName = '1952 Alpine Renault 1300';
        
-- 3
update suppliers s    
    inner join supplierproductlines spl on s.supplierName = spl.supplierName
    inner join products p on s.supplierZip = p.supplierZip
set p.productName = '1952 Alpine Renault 1300' where p.productCode = 'S10_3000'
*/

//$complex_query = 'select * from suppliers';

$dg = new C_DataGrid($complex_query);
$dg->set_col_edittype('productLine', 'select', 'select productLine,productLine from supplierproductlines');
//$dg->set_col_readonly('productName');

// AUTO MAKE DROPDOWN FOR LOOKUP TABLE (JOINS)
$dg->enable_edit('CELL');
$dg->display();
?>

</body>
</html>