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
                    User Listing
                </h3>
            </div>
        </div>
        <div class="m-portlet__head-tools">
            <ul class="m-portlet__nav">
                @can('create_users')
                <li class="m-portlet__nav-item">
                    <a href="#" class="btn btn-accent m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air" data-toggle="modal" data-target="#create_user_modal">
                                    <span>
                                            <i class="la la-plus"></i>
                                            <span>Add User</span>
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

@can('create_users')
<!--begin::Modal-->
<div class="modal fade" id="create_user_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="model-title">Create User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="add" action="javascript:create_user();">
                    <div class="m-portlet__body">
                        <div class="row">
                            <div class="form-group m-form__group col-md-6">
                                <label for="name">Name</label>
                                <input type="text" class="form-control m-input" id="name" placeholder="Enter  Name">
                            </div>
                            <div class="form-group m-form__group col-md-6">
                                <label for="name">Email</label>
                                <input type="email" class="form-control m-input" id="email" placeholder="Enter Email">
                            </div>
                        </div>

                        
                        <div class="row">
                            <div class="form-group m-form__group col-md-6">
                                <label for="name">Password</label>
                                <input type="password" class="form-control m-input" id="password"
                                    placeholder="Enter password">
                            </div>
                        </div>
                        <div class = "row">
                            <div class="form-group m-form__group col-md-6">
                                <label for="permissions">Permissions</label>
                                <select id="permissions" class="form-control select2picker" value="" multiple="multiple"
                                    style="width:100%;">
                                    <option value=""></option>
                                    @if(count($permissions))
                                    @foreach($permissions as $permission)
                                    <option value="{{$permission->id}}">{{$permission->name}}</option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                        <div class="form-group m-form__group col-md-6">
                            <label for="roles">Roles</label>
                            <select id="roles" class="form-control select2picker" value="" style="width:100%;">
                                <option value=""></option>
                                @if(count($roles))
                                @foreach($roles as $role)
                                <option value="{{$role->role_id}}">{{$role->name}}</option>
                                @endforeach
                                @endif
                            </select>
                        </div>
                        </div>
                    </div>
                    <div class="m-portlet__foot m-portlet__foot--fit">
                        <div class="m-form__actions">
                            <button type="submit" id="create_user" class="btn btn-primary">Submit</button>
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
@can('update_users')
<!--begin::Modal-->
<div class="modal fade" id="update_user_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="model-title">Update User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="add" action="javascript:update_user();">
                    <div class="row">
                        <div class="form-group m-form__group col-md-6">
                            <label for="edit_name">Name</label>
                            <input type="text" class="form-control m-input" id="edit_name" placeholder="Enter  Name">
                            <input hidden id="update_id">
                        </div>
                        <div class="form-group m-form__group col-md-6">
                            <label for="edit_email">Email</label>
                            <input type="email" class="form-control m-input" id="edit_email" placeholder="Enter Email">
                        </div>
                    </div>


                    <div class="row">
                        <div class="form-group m-form__group col-md-6">
                            <label for="edit_password">Password</label>
                            <input type="password" class="form-control m-input" id="edit_password"
                                placeholder="Enter password">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group m-form__group col-md-6">
                            <label for="edit_permissions">Permissions</label>
                            <select id="edit_permissions" class="form-control select2picker" value=""
                                multiple="multiple" style="width:100%;">
                                <option value=""></option>
                                @if(count($permissions))
                                @foreach($permissions as $permission)
                                <option value="{{$permission->id}}">{{$permission->name}}</option>
                                @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="form-group m-form__group col-md-6">
                            <label for="edit_roles">Roles</label>
                            <select id="edit_roles" class="form-control select2picker" value="" style="width:100%;">
                                <option value=""></option>
                                @if(count($roles))
                                @foreach($roles as $role)
                                <option value="{{$role->role_id}}">{{$role->name}}</option>
                                @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="m-portlet__foot m-portlet__foot--fit">
                        <div class="m-form__actions">
                            <button type="submit" id="edit_user" class="btn btn-primary">Submit</button>
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
@can('delete_users')
<!--begin::Modal-->
<div class="modal fade" id="delete_user_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title delete" id="model-title">Delete User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
            </div>
            <div class="modal-body">
                <input hidden id="delete_id">
                <h4 id="delete"> Do You Sure You Want To Delete This User</h4>
            </div>
            <form class="m-form m-form--fit m-form--label-align-right">
                <div class="m-portlet__foot m-portlet__foot--fit">

                    <div class="m-form__actions">
                        <button type="button" id="user_button_delete" class="btn btn-primary">DELETE</button>
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

<!--end::Modal-->
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
                        url: "{{route('user-list')}}",
                        type: "GET",
                        data: function (d) {
                            d.date      = $("#date").val()
                        },
                    },

                    "columns": [
                        {
                            filter: "actions",
                            title: 'Actions',
                            render: function (data, type, row, meta) {
                            return "<a  data-toggle='modal' onClick='edit_modal(" + JSON.stringify(row) + ")' data-target='#update_user_modal'  id='test_click' class='m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill'><i class='la la-edit'></i></a>" +
                             "<a  data-toggle='modal' onClick='delete_modal(" + JSON.stringify(row) + ")' data-target='#delete_user_modal'  id='test_click' class='m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill'><i class='flaticon-delete-1'></i></a>";                            }
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
                        data: "email",
                        title: "Email",
                    },
                    {
                        data : "created_by",
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
        @can('read_users')
        datatable = datatableInit.init();
        @endcan
        $('#user_button_delete').click(function(){
                delete_user();
        });
});

function edit_modal(row){
    $("#update_id").val(row["id"]);
    $("#edit_name").val(row["name"]);
    $("#edit_email").val(row["email"]);
    $("#edit_roles").val(row["roles"]).change();
    $("#edit_permissions").val(row["permissions"]).change();
}
function delete_modal(row){
    $("#delete_id").val(row["id"]);
}
@can('update_users')
function update_user(){
    
    $.ajax({
                type: "PUT",
                url: "{{URL::to('/admin/users/')}}" +"/" + $("#update_id").val(),
                data: {
                    name     : $("#edit_name").val(),
                    email    : $("#edit_email").val(),
                    password : $("#edit_password").val(),
                    roles    : $("#edit_roles").val(),
                    permissions : $("#edit_permissions").val(),
                },
                dataType: "JSON",
                success: function (data) {
                    $.notify({
	                // options
	                message: "update user successfully"
                    },{
	                // settings
	                type: "success"
                    });
                    $("#update_user_modal .close").click()
                    datatable.ajax.reload()
                }
            });
}
@endcan
@can('create_users')
function create_user(){
    $.ajax({
                type: "POST",
                url: "{{route('add-user')}}",
                data: {
                    name     : $("#name").val(),
                    email    : $("#email").val(),
                    password : $("#password").val(),
                    roles    : $("#roles").val(),
                    permissions : $("#permissions").val(),
                },
                dataType: "JSON",
                success: function (data) {
                    $.notify({
	                // options
	                message: "user created successfully"
                    },{
	                // settings
	                type: "success"
                    });
                    $("#create_user_modal .close").click()
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
@can('delete_users')
function delete_user(){
    var userId = $("#delete_id").val();
    $.ajax({
                type: "DELETE",
                url: "{{URL::to('/admin/users/')}}" +"/" + userId,
                data: {
                },
                dataType: "JSON",
                success: function (data) {
                    $.notify({
	                // options
	                message: "user Deleted successfully"
                    },{
	                // settings
	                type: "success"
                    });
                    $("#delete_user_modal .close").click()
                    datatable.ajax.reload()

                }
    });   
}
@endcan
</script>




@stop