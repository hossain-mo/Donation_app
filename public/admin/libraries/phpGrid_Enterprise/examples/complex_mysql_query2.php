
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Demonstration of afterSaveCell Issue</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

</head>

<body>
    <style type="text/css">
    #suppliers .ui-priority-secondary{background-image: none;background:#F5FAFF;}
    #suppliers .ui-state-hover{background-image: none;background:#F2FC9C;color:black}
    #suppliers .ui-state-highlight{background-image: none;background:yellow !important;}
    table#suppliers tr{ opacity: 1}
    #_fileLink > img {width:120px;}
    </style>

    <div id="_phpgrid_script_includeonce" style="display:inline">
    <link rel="stylesheet" type="text/css" media="screen" href="/phpGridx/css/cobalt-flat/jquery-ui.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="/phpGridx/css/ui.jqgrid.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="/phpGridx/css/cobalt-flat/cobalt-flat_fix.css" />
    <script type="text/javascript">
                        if (typeof jQuery == "undefined"){document.write("<script src='/phpGridx/js/jquery-2.1.4.min.js' type='text/javascript'><\/script>");}
                      </script>
    <script src="/phpGridx/js/jquery-ui-1.11.2.min.js" type="text/javascript"></script>
    <script src="/phpGridx/js/i18n/grid.locale-en.js" type="text/javascript"></script>
    <script src="/phpGridx/js/jquery.jqgrid.min.js" type="text/javascript"></script>
    <script src="/phpGridx/js/grid.import.fix.js" type="text/javascript"></script>
    <!-- script src="/phpGridx/js/jquery-migrate-1.2.1.min.js" type="text/javascript"></script -->
    <script src="/phpGridx/js/datetimepicker/jquery.datetimepicker.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="/phpGridx/js/datetimepicker/jquery.datetimepicker.css" />
    </div>


    <script type="text/javascript">
    //<![CDATA[
        $(document).ready(function () {
            grid = $("#suppliers"),

            grid.jqGrid({
                url:"/phpGridx/data.php?dt=json&gn=suppliers",
                //cellsubmit: 'clientArray',
                cellsubmit: 'remote',
                cellurl: '/phpGridx/celledit.php',
                datatype:"json",
                mtype:"GET",

                colNames:["supplierCode","supplierName","supplierAddress","supplierState","supplierZip","supplierPhoneNumber"],
                colModel:[{"autoResizable":true,"name":"supplierCode","index":"supplierCode","hidden":false,"headerTitle":"supplierCode","edittype":"text","editable":true,"editoptions":{"size":"30"},"editrules":{"edithidden":false,"required":false,"number":true}},{"autoResizable":true,"name":"supplierName","index":"supplierName","hidden":false,"headerTitle":"supplierName","edittype":"text","editable":true,"editoptions":{"size":"30"},"editrules":{"edithidden":false,"required":false}},{"autoResizable":true,"name":"supplierAddress","index":"supplierAddress","hidden":false,"headerTitle":"supplierAddress","edittype":"text","editable":true,"editoptions":{"size":"30"},"editrules":{"edithidden":false,"required":false}},{"autoResizable":true,"name":"supplierState","index":"supplierState","hidden":false,"headerTitle":"supplierState","edittype":"text","editable":true,"editoptions":{"size":"30"},"editrules":{"edithidden":false,"required":false}},{"autoResizable":true,"name":"supplierZip","index":"supplierZip","hidden":false,"headerTitle":"supplierZip","edittype":"text","editable":true,"editoptions":{"size":"30"},"editrules":{"edithidden":false,"required":false}},{"autoResizable":true,"name":"supplierPhoneNumber","index":"supplierPhoneNumber","hidden":false,"headerTitle":"supplierPhoneNumber","edittype":"text","editable":true,"editoptions":{"size":"30"},"editrules":{"edithidden":false,"required":false}}],
                
                rowNum: 1000,
                gridview:true,
                pager: '#pager',
                viewrecords: true,
                sortorder: "desc",
                caption: "afterSaveCell Issue",
                height: "100%",
                cellEdit: true,
                footerrow:true,
                pager: "#suppliers_pager1",
                rowNum:20,
                rowList:[10,20,30,50,100,"10000:All"],
                sortname:"1",
                sortorder:"asc",
                viewrecords:true,
                multiselect:false,
                multiPageSelection:true,
                multiselectPosition:"right",
                caption:"suppliers&nbsp;",
                altRows:true,
                scrollOffset:0,
                rownumbers:false,
                shrinkToFit:true,
                autowidth:false,
                hiddengrid:false,
                scroll:false,
                height:"auto",
                autoresizeOnLoad:true,
                singleSelectClickMode:"selectonly",
                widthOrg:"100%",
                sortable:true,
                loadError:
                    function(xhr,status, err) {
                        try{
                            jQuery.jgrid.info_dialog(
                                jQuery.jgrid.errors.errcap,
                                "<div style=\"font-size:10px;text-align:left;width:300px;;height:150px;overflow:auto;color:red;\">"+ xhr.responseText +"</div>",
                                jQuery.jgrid.edit.bClose,{buttonalign:"center"});
                        }
                        catch(e) { alert(xhr.responseText)};
                    }
                
            });
        });
    //]]>
    </script>

<table id="suppliers"><tr><td/></tr></table>
<div id="suppliers_pager1"/>
</body>
</html>