@extends('templates.admin.index') 
@section('content')


<div class="m-portlet" id="m_portlet">
    <div class="m-portlet__head">
        <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">
                <span class="m-portlet__head-icon">
                        <i class="flaticon-map-location"></i>
                    </span>
                <h3 class="m-portlet__head-text">
                    Project Listing
                </h3>
            </div>
        </div>
        <div class="m-portlet__head-tools">
            <ul class="m-portlet__nav">
                @can('create_projects')
                <li class="m-portlet__nav-item">
                    <a href="#" class="btn btn-accent m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air" data-toggle="modal" data-target="#create_project_modal">
                                    <span>
                                            <i class="la la-plus"></i>
                                            <span>Add Project</span>
                                        </span>
                            </a>
                </li>
                @endcan
            </ul>
        </div>
    </div>
    <div class="m-portlet__body">
        <div class="col-sm-12">
            <table class="table table-striped- table-bordered table-hover table-checkable dataTable dtr-inline"
                id="m_datatable" role="grid" aria-describedby="m_table_1_info" style="width: 1045px;"> </table>
        </div>
    </div>
</div>

@can('create_projects')
<!--begin::Modal-->
<div class="modal fade" id="create_project_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="model-title">Create Project</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="add" action="javascript:create_project();">
                    <div class="m-portlet__body">
                        <div class="row">
                            <div class="form-group m-form__group col-md-6">
                                <label for="name">Name</label>
                                <input type="text" class="form-control m-input" id="name" placeholder="Enter  Name">
                            </div>
                            <div class="form-group m-form__group col-md-6">
                                <label for="description">Description</label>
                                <input type="text" class="form-control m-input" id="description"
                                    placeholder="Enter  Description">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group m-form__group col-md-6">
                                <label for="village_id">Villages</label>
                                <select id="village_id" class="form-control select2picker" value="" style="width:100%;">
                                    <option value=""></option>
                                    @if(count($villages))
                                    @foreach($villages as $village)
                                    <option value="{{$village->id}}">{{$village->name}}</option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="form-group m-form__group col-md-6">
                                <label for="project_category_id">Project Categories</label>
                                <select id="project_category_id" class="form-control select2picker" value=""
                                    style="width:100%;">
                                    <option value=""></option>
                                    @if(count($project_categories))
                                    @foreach($project_categories as $project_category)
                                    <option value="{{$project_category->id}}">{{$project_category->name}}</option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group m-form__group col-md-6">
                                <label for="cost">Cost</label>
                                <input type="number" class="form-control m-input" id="cost" placeholder="Enter  cost">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group m-form__group col-md-6">
                                <label for="cause">Cause</label>
                                <input type="text" class="form-control m-input" id="cause" placeholder="Enter  cause">
                            </div>
                            <div class="form-group m-form__group col-md-6">
                                <label for="execution_period">Execution Period</label>
                                <input type="text" class="form-control m-input" id="execution_period"
                                    placeholder="Enter  execution period">
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet__foot m-portlet__foot--fit">
                        <div class="m-form__actions">
                            <button type="submit" id="create_project" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!--end::Modal-->
@endcan
@can('update_projects')
<!--begin::Modal-->
<div class="modal fade" id="update_project_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="model-title">Update Project</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="add" action="javascript:update_project();">
                    <div class='row'>
                        <div class="form-group m-form__group col-md-6">
                            <label for="edit_name">Name</label>
                            <input type="text" class="form-control m-input" id="edit_name" placeholder="Enter Name">
                            <input hidden id="update_id">
                        </div>
                        <div class="form-group m-form__group col-md-6">
                            <label for="edit_description">Description</label>
                            <input type="text" class="form-control m-input" id="edit_description" placeholder="Enter Description">
                        </div>
                    </div>
                    <div class='row editable_data' style="display:none;">
                        <div class="form-group m-form__group col-md-6">
                            <label for="edit_cost">Cost</label>
                            <input type="number" class="form-control m-input" id="edit_cost" placeholder="Enter Cost">
                        </div>
                        <div class="form-group m-form__group col-md-6">
                            <label for="edit_cause">Cause</label>
                            <input type="text" class="form-control m-input" id="edit_cause" placeholder="Enter Cause">
                        </div>
                    </div>
                    <div class="form-group m-form__group editable_data" style="display:none;">
                            <label for="edit_execution_period">Execution Period</label>
                            <input type="number" class="form-control m-input" id="edit_execution_period" placeholder="Enter Execution Period">
                        </div>
                       
                    <div class="m-portlet__foot m-portlet__foot--fit">
                        <div class="m-form__actions">
                            <button type="submit" id="edit_project" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
        </div>
    </div>
</div>
@endcan
@can('delete_projects')
<!--begin::Modal-->
<div class="modal fade" id="delete_project_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title delete" id="model-title">Delete Project</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
            </div>
            <div class="modal-body">
                <input hidden id="delete_id">
                <h4 id="delete"> Do You Sure You Want To Delete This Project</h4>
            </div>
            <form class="m-form m-form--fit m-form--label-align-right">
                <div class="m-portlet__foot m-portlet__foot--fit">

                    <div class="m-form__actions">
                        <button type="button" id="project_button_delete" class="btn btn-primary">DELETE</button>
                    </div>
                </div>
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endcan
<div class="modal fade" id="end_execute_project_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="model-title">End Execute Project</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="add" action="javascript:end_execution();">
                       
                    <div class="form-group m-form__group">
                        <label for="resault">Resault</label>
                        <input type="text" class="form-control m-input" id="resault" placeholder="Enter Resault">
                        <input id="end_execution_row_id" hidden>
                    </div>
                       
                    <div class="m-portlet__foot m-portlet__foot--fit">
                        <div class="m-form__actions">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
        </div>
    </div>
</div>
<!--end::Modal-->
@can('create_project_assets')
<!--begin::Modal-->
<div class="modal fade" id="upload_assets_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title delete" id="model-title">Upload Asset</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="m-form__group form-group" id="assets_type" style="display:none;">
                    <label for="">Asset Type</label>
                    <div class="m-radio-inline">
                        <label class="m-radio">
                            <input type="radio" name="asset_type" value="cover"> Cover
                            <span></span>
                        </label>
                        <label class="m-radio">
                            <input type="radio" name="asset_type" value="galary" checked="checked"> Galary
                            <span></span>
                        </label>
                    </div>
                    <span class="m-form__help">Some help text goes here</span>
                </div>
                <form action="upload-project-assets" class="dropzone">{{csrf_field()}}
                    <input name="project_id" id="project_id" hidden />
                    <input name="type" id="type" hidden />
                    <div class="fallback">
                        <input name="content" type="file" multiple />
                    </div>
                </form>
                <form  action="javascript:add_video();">
                       
                    <div class="form-group m-form__group">
                        <label for="video_url">Video Url</label>
                        <input type="text" class="form-control m-input" id="video_url" placeholder="Enter Url">
                    </div>
                    <div class="m-portlet__foot m-portlet__foot--fit">
                        <div class="m-form__actions">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
                </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endcan
@stop 
@section('js_script')
<script type="text/javascript">
var state, datatable, searching;
var datatableInit = function () {
        $.fn.dataTable.Api.register("column().title()", function () {
            return $(this.header()).text().trim()
        });
        $.fn.dataTable.Api.register("column().filter()", function () {
            return this.settings()[0].aoColumns[this.index()].filter
        });
        $.fn.dataTable.Api.register("column().columnId()", function () {
            return 'datatable_' + this.settings()[0].aoColumns[this.index()].data
        });
        return {
            init: function () {
                var t;
                t = $("#m_datatable").DataTable({
                    scrollX: true,
                    stateSave: true,
                    @can('datatables_export')
                    dom: "<'row'<'col-sm-6 text-left'><'col-sm-6 text-right'B>>\n\t\t\t<'row'<'col-sm-12'tr>>\n\t\t\t<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>",
                    buttons: ["print", "copyHtml5", "excelHtml5", "csvHtml5", "pdfHtml5"],
                    @else
                    dom: "<'row'<'col-sm-12'tr>>\n\t\t\t<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>",
                    @endcan
                    processing: !0,
                    ajax: {
                        url: "{{route('project-list')}}",
                        type: "GET",
                        data: function (d) {
                            d.locale      = $("#locale").val()
                        },
                    },

                    "columns": [
                        {
                            filter: "actions",
                            title: 'Actions',
                            render: function (data, type, row, meta) {
                                actions = "<a  data-toggle='modal' onClick='edit_modal(" + JSON.stringify(row) + ")' data-target='#update_project_modal'  id='test_click' class='m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill'><i class='la la-edit'></i></a>" +
                                    "<a  data-toggle='modal' onClick='delete_modal(" + JSON.stringify(row) + ")' data-target='#delete_project_modal'  id='test_click' class='m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill'><i class='flaticon-delete-1'></i></a>"+
                                    "<a  data-toggle='modal' onClick='upload_image(" + JSON.stringify(row) + ")' data-target='#upload_assets_modal'  id='test_click' class='m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill'><i class='flaticon-upload-1'></i></a>";
                                title     = "disabled";
                                css_class = "btn-outline-danger";
                                disable_field_value = 1;
                                execution_type      = 0 ; // end_date
                                execution_title     = "End";
                                execution_css_class = "btn-danger";
                                if (row.disabled == 'Yes') {
                                    title = "enabled";
                                    css_class = "btn-outline-success";
                                    disable_field_value = 0;
                                }
                                if (row.start_at == '') {
                                    execution_type      = 1; // start_date
                                    execution_title     = "Start";
                                    execution_css_class = "btn-success";
                                }
                                actions += '<button  onClick="update_disabled('+row.id+','+disable_field_value+')" class="btn '+css_class+' m-btn m-btn--icon m-btn--icon-only" title='+title+' ><i class="fa 	fa-exclamation-triangle"></i></button> ';
                                if(row.start_at == ''|| row.end_at == ''){
                                    actions += '<button  onClick="execution('+row.id+','+execution_type+')" class="btn '+execution_css_class+' title='+execution_title+' '+" Execution"+'">'+execution_title+'</button> ';
                                }
                                return actions;
                            }
                            },
                            {
                                data: "id",
                                title: "#",
                            },
                            {
                                data: "name",
                                title: "name",
                            },
                            {
                                data: "description",
                                title: "Description"
                            },
                            {
                                data: "cost",
                                title: "Cost"
                            },
                            {
                                data: "execution_period",
                                title: "Execution Duration",
                                render: function (data, type, row, meta) {
                                    return row['execution_period'] + " Days";
                                },

                            },
                            {
                                data: "cause",
                                title: "Cause"
                            },
                            {
                                data: "village",
                                title: "Village"
                            },
                            {
                                data: "project_category",
                                title: "Project Category"
                            },
                            {
                                data: "collected",
                                title: "Collected"
                            },
                            {
                                data: "start_at",
                                title: "Start At"
                            },
                            {
                                data: "end_at",
                                title: "End At"
                            },
                            {
                                data: "expected_date",
                                title: "Expected Date"
                            },
                            {
                                data: "disabled",
                                title: "Disabled"
                            },
                            {
                                data: "created_by",
                                title: "Created By"
                            },
                            {
                                data: "created_at",
                                title: "Created At",
                                name: "created_at"
                            },
                    ],
                    initComplete: function (settings, data) {
                    var selector;
                    var api = this.api();
                    var a = $('<tr class="filter"></tr>').appendTo($(t.table().header()));
                    datatable_filter = function () {
                        searching = true;
                        var n = {};
                        $(a).find(".m-input").each(function () {
                            var t = $(this).data("col-index");
                            n[t] ? n[t] += "|" + $(this).val() : n[t] = $(this).val()
                        }), $.each(n, function (a, e) {
                            t.column(a).search(e || "", !1, !1)
                        }), t.table().draw()
                    };
                    api.columns().every(function () {
                        var e;
                        switch (this.filter()) {
                            case "actions":
                                var s = $('<button class="btn btn-secondary m-btn btn-sm m-btn--icon">\n\t\t\t\t\t\t\t  <span>\n\t\t\t\t\t\t\t    <i class="la la-close"></i>\n\t\t\t\t\t\t\t    <span>Reset</span>\n\t\t\t\t\t\t\t  </span>\n\t\t\t\t\t\t\t</button>');
                                $("<th>").append(s).appendTo(a), $(s).on("click", function (e) {
                                    e.preventDefault(), $(a).find(".m-input").each(function (a) {
                                        $(this).val(""), t.column($(this).data("col-index")).search("", !1, !1)
                                    }), t.table().draw()
                                })
                                break;

                            case "select":
                                e = $('<select id="' + this.columnId() + '" class="form-control form-control-sm form-filter m-input column-filter" title="Select" data-col-index="' + this.index() + '">\n\t\t\t\t\t\t\t\t\t\t<option value="">Select</option></select>'), this.data().unique().sort().each(function (t, a) {
                                    $(e).append('<option value="' + t + '">' + t + "</option>")
                                });
                                $(e).appendTo($("<th>").appendTo(a)).select2().on('select2:select', datatable_filter);
                                
                                break;

                            default:
                                e = $('<input id="' + this.columnId() + '" type="text" class="form-control form-control-sm form-filter m-input" data-col-index="' + this.index() + '"/>');
                                $(e).appendTo($("<th>").appendTo(a)).on('keyup change', datatable_filter);
                        }
                    })

                    state = api.state.loaded();
                    if(state){
                        api.columns().every(function () {
                            var colSearch = state.columns[this.index()].search;
                            
                            if (colSearch.search) {
                                selector = '#'+api.table().node().id+'_wrapper .dataTables_scrollHead :input[data-col-index="'+this.index()+'"]';
                                switch (this.filter()) {
                                case "select":
                                    if ($(selector + ' option[value="'+colSearch.search+'"]').length == 0){
                                        state.columns[this.index()].search.search = "";
                                    }
                                    $(selector).val(colSearch.search).trigger('change.select2').trigger('select2:select');
                                    break;
                                
                                default:
                                    $(selector).val(colSearch.search);
                                }
                            }
                        });
                    }

                    api.on( 'draw', function () {
                        if(!searching){
                            api.columns().every(function () {
                            switch (this.filter()) {
                                case "select":
                                    selector = '#'+api.table().node().id+'_wrapper .dataTables_scrollHead :input[data-col-index="'+this.index()+'"]';

                                    var old_val = $(selector).val();
                                    $(selector).empty().select2('destroy').append('<option value="">Select</option>');

                                    this.data().unique().sort().each(function (t, a) {
                                        $(selector).append('<option value="' + t + '">' + t + "</option>")
                                    });

                                    $(selector).select2();

                                    if ($(selector + ' option[value="'+old_val+'"]').length == 0){
                                        $(selector).val(null);
                                    } else{
                                        $(selector).val(old_val);
                                    }

                                    $(selector).trigger('change.select2').trigger('select2:select');
                                    break;
                            }
                            });
                        }
                        searching = false;
                    } );
                    
                },
                })
                return t;
            }
        }
}();

    $(document).ready(function () {
        $("#type").val('galary');
        @can('read_projects')
        datatable = datatableInit.init();
        @endcan
        $('#project_button_delete').click(function(){
                delete_project();
        });
        $("input[type='radio']").click(function(){
            var radioValue = $("input[name='asset_type']:checked").val();
            $("#type").val(radioValue);
        });
});

function edit_modal(row){
    if(row['collected'] < row['cost']){
        $('.editable_data').show();
    }
    $("#update_id").val(row["id"]);
    $("#edit_name").val(row["name"]);
    $("#edit_description").val(row["description"]);
    $("#edit_cause").val(row["cause"]);
    $("#edit_cost").val(row["cost"]);
    $("#edit_execution_period").val(row["execution_period"]);
}
function delete_modal(row){
    $("#delete_id").val(row["id"]);
}
function upload_image(row){
    $("#project_id").val(row["id"]);
    if(row['cover_photo'] != ''){
    $("#type").val('galary');
    }else{
        $("#assets_type").show();
    }
}
@can('update_projects')
function update_project(){
    
    $.ajax({
                type: "PUT",
                url: "{{URL::to('/admin/projects/')}}" +"/" + $("#update_id").val(),
                data: {
                    name         : $("#edit_name").val(),
                    description  : $("#edit_description").val(),
                    cost         : $("#edit_cost").val(),
                    cause        : $("#edit_cause").val(),
                    execution_period    : $("#edit_execution_period").val(),

                },
                dataType: "JSON",
                success: function (data) {
                    $.notify({
	                // options
	                message: "update project successfully"
                    },{
	                // settings
	                type: "success"
                    });
                    $("#update_project_modal .close").click()
                    datatable.ajax.reload()
                }
            });
}
@endcan
@can('create_projects')
function create_project(){
    $.ajax({
                type: "POST",
                url: "{{route('add-project')}}",
                data: {
                    name                : $("#name").val(),
                    village_id          : $("#village_id").val(),
                    description         : $("#description").val(),
                    cost                : $("#cost").val(),
                    cause               : $("#cause").val(),
                    project_category_id : $("#project_category_id").val(),
                    execution_period    : $("#execution_period").val(),
                },
                dataType: "JSON",
                success: function (data) {
                    $.notify({
	                // options
	                message: "project created successfully"
                    },{
	                // settings
	                type: "success"
                    });
                    $("#create_project_modal .close").click()
                    datatable.ajax.reload()

                },
                error : function(data){
                    $.notify({
	                // options
	                message: "username already taken"
                    },{
	                // settings
	                type: "warning"
                    });
                }
    });
    
}
@endcan
@can('delete_projects')
function delete_project(){
    var projectId = $("#delete_id").val();
    $.ajax({
                type: "DELETE",
                url: "{{URL::to('/admin/projects/')}}" +"/" + projectId,
                data: {
                },
                dataType: "JSON",
                success: function (data) {
                    $.notify({
	                // options
	                message: "project Deleted successfully"
                    },{
	                // settings
	                type: "success"
                    });
                    $("#delete_project_modal .close").click()
                    datatable.ajax.reload()

                }
    });   
}
@endcan
@can('update_projects')
function update_disabled(id,disabled){
    $.ajax({
                type: "PUT",
                url: "{{URL::to('/admin/projects/')}}" +"/" + id,
                data: {
                    disabled       : disabled,
                },
                dataType: "JSON",
                success: function (data) {
                    $.notify({
                    // options
                    message: "update project successfully"
                    },{
                    // settings
                    type: "success"
                    });
                    $("#update_project_modal .close").click()
                    datatable.ajax.reload()
                }
    });
}
@endcan
@can('update_projects')
function execute_api(id,data){
    $.ajax({
                type: "PUT",
                url: "{{URL::to('/admin/projects/')}}" +"/" + id,
                data: data ,
                dataType: "JSON",
                success: function (data) {
                    $.notify({
                    // options
                    message: "update project successfully"
                    },{
                    // settings
                    type: "success"
                    });
                    $("#end_execute_project_modal .close").click()
                    datatable.ajax.reload()
                }
    });
}
@endcan
@can('create_project_assets')
function add_video(){
    $.ajax({
                type: "POST",
                url: "{{URL::to('/admin/upload-project-assets/')}}",
                data: {
                    type : 'video_url',
                    project_id : $('#project_id').val(),
                    content    : $('#video_url').val()
                } ,
                dataType: "JSON",
                success: function (data) {
                    $("#upload_assets_modal .close").click()
                }
    });
}
@endcan
function execution(id,type){
    date = new Date();
    date = date.toISOString();
    date = date.slice(0,10);
    data = {
            start_at : date
    }
    if(type == 1 ){
        execute_api(id,data);
    }else{
        $("#end_execute_project_modal").modal('show');
        $("#end_execution_row_id").val(id);
    }
    
    
} 
function end_execution(){
    date = new Date();
    date = date.toISOString();
    date = date.slice(0,10);
    data = {
            end_at : date,
            resault: $("#resault").val(),
            status : 'Finished'
        }
    execute_api($("#end_execution_row_id").val(),data);
}
</script>

@stop