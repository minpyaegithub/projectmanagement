@extends('layout.master')

@section('title','Employee')
@section('content')
    <div class="container">
        <div class="well" style="overflow-x:auto;">
        @if ($message = Session::get('success'))
        @section('scripts')<script>__show_success_alert('Save Successfully Sir!')</script>@endsection
        @endif
        <legend>Employee Form</legend>
        <button type="button" class="btn btn-info btn-sm pull-right button-style" id="btnAdd" data-toggle="modal" data-target="#addModal">Add</button>
            <table class="table table-bordered" id="employee">
                <thead>
                <tr>
                    <th>Employee ID</th>
                    <th>Employee Name</th>
                    <th>Remark</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $x)
                    <tr>
                        <td>{{$x -> e_id}}</td>
                        <td>{{$x -> name}}</td>
                        <td>{{$x -> remark}}</td>
                        <td><button class="btn btn-info button-style" onclick="fun_view('{{$x -> id}}')" id="btnView" data-toggle="modal" data-target="#viewModal">View</button>
                                <button class="btn btn-warning button-style" id="btnEdit" data-toggle="modal" data-target="#addModal" onclick="fun_edit('{{$x -> id}}')">Edit</button>
                                <button class="btn btn-danger button-style confirm" id="btnDelete" onclick="__delete('{{$x->id}}')">Delete</button>
                                <input type="hidden" id="txtid" value="{{$x->id}}">
                            </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <input type="hidden" name="hidden_view" id="hidden_view" value="{{url('member/employee/view')}}">
            <input type="hidden" name="hidden_delete" id="hidden_delete" value="{{url('member/employee/delete')}}">
            <input type="hidden" name="hidden_select" id="hidden_select" value="{{url('member/employee/select')}}">

            <!-- Add Modal start -->
                <div class="modal fade" id="addModal" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header btn-primary">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Add Record</h4>
                            </div>

                            <form action="{{url('member/employee')}}" method="post">
                                <div class="modal-body">
                                    <div class="form-horizontal">
                                        {{csrf_field()}}
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="col-sm-8">

                                                    <div class="form-group">
                                                        <div class="control-label col-sm-5">
                                                            <div style="float: left">
                                                                <Label ID="lblEmployeeID">
                                                                    Employee ID:
                                                                </Label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 text-group float-left">
                                                            <input type="text" tabindex="1" id="txtEmployeeID" name="employee_id"
                                                                   class="form-control" required autofocus >
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="control-label col-sm-5">
                                                            <div style="float: left">
                                                                <Label ID="lblEmployeeName"  Style="width: 100%;">
                                                                    Employee Name:
                                                                </Label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 text-group float-left">
                                                            <input type="text" tabindex="2" id="txtEmployeeName" name="employee_name"
                                                                   class="form-control" autocomplete="off" required >
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="control-label col-sm-5">
                                                            <div style="float: left;">
                                                                <label id="lblRemark" Style="width: 100%;"> 
                                                                    Remark:
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 text-group float-left">
                                                            <textarea id="txtRemark" name="remark" rows="2" tabindex="3" onmouseup="this.select();" class="form-control"
                                                                autocomplete="off"></textarea>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="control-label col-sm-5">
                                                            <div style="float: left;">
                                                                <label id="lblDepartment" Style="width: 100%;"> 
                                                                    Department:
                                                                </label>
                                                            </div>
                                                        </div>
                                                            <div class="col-sm-6 text-group float-left">
                                                                <select class="form-control" name="department" id="txtDepartment" required>
                                                                    @foreach($departments as $department)
                                                                        <option value="{{$department->id}}">
                                                                            {{$department->name}}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>                                                          
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="control-label col-sm-5">
                                                            <div style="float: left;">
                                                                <label id="lblPosition" Style="width: 100%;"> 
                                                                    Position:
                                                                </label>
                                                            </div>
                                                        </div>
                                                            <div class="col-sm-6 text-group float-left">
                                                                <select class="form-control" name="position" id="txtPosition" required>
                                                                    @foreach($roles as $role)
                                                                        <option value="{{$role->id}}">
                                                                            {{$role->name}}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>                                                          
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" id="btnNew" tabindex="3" class="btn btn-primary button-style pull-left">New</button>
                                    <button type="submit" id="btnSave" tabindex="4" class="btn btn-primary button-style pull-left">Save</button>
                                    <button type="submit" id="btnUpdate" tabindex="4" class="btn btn-primary button-style pull-left">Update</button>
                                    <input type="hidden" id="txtEditid" name="edit_id">
                                    <button type="button" class="btn btn-primary button-style" data-dismiss="modal">Close</button>
                                    
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            <!-- add code ends -->
            <!-- View Modal start -->
            <div class="modal fade" id="viewModal" role="alert">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header btn-primary">
                            <button type="button" class="close" data-dismiss="modal">x</button>
                            <h4 class="modal-title">View</h4>
                        </div>
                        <div class="modal-body">
                            <p><b>Employee ID : </b><span id="view_employeeid" class="text-success"></span></p>
                            <p><b>Employee Name : </b><span id="view_employeename" class="text-success"></span></p>
                            <p><b>Remark : </b><span id="view_remark" class="text-success"></span></p>
                            <p><b>Department : </b><span id="view_department" class="text-success"></span></p>
                            <p><b>Position : </b><span id="view_position" class="text-success"></span></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary button-style" data-dismiss="modal">&times;</button>
                        </div>
                    </div>

                </div>
            </div>
            <!-- view modal ends -->

        </div>
    </div>
@endsection
@section('javascript')
    <script type="text/javascript">
        $(document).ready(function(){
            __dataTable();

            $("#txtEmployeeID").change(function () {
                var id = $("#txtEmployeeID").val();
                select(id);
            });

           $("#btnAdd").click(function () {
                $("#btnUpdate").hide();
                $("#btnSave").show();
                clear();
            });

            $("#btnEdit").click(function () {
                $("#btnSave").hide();
                $("#btnUpdate").show();
                $("#txtClientName").focus();
            });

            $("#btnNew").click(function () {
                clear();
            });
        });

        function clear(){
            __disable(false);
            $('#txtEmployeeID').val('');
            $('#txtEmployeeName').val('');
            $('#txtRemark').val('');
            $('#txtDepartment').val('');
            $('#txtPosition').val('');
            $('#txtEmployeeID').focus();
            $("#btnSave").prop('disabled',false);
            $("#btnUpdate").prop('disabled',false);
        }

        function fun_view(id)
        {
            var view_url = $("#hidden_view").val();
            $.ajax({
                url: view_url,
                type:"GET",
                data: {"id":id},
                success: function(result){
                    $("#view_employeeid").text(result.e_id);
                    $("#view_employeename").text(result.name);
                    $("#view_remark").text(result.remark);
                    $("#view_department").text(result.department.name);
                    $("#view_position").text(result.role.name);
                }
            });
        }

        function select(id)
        {
            var select_url = $("#hidden_select").val();
            $.ajax({
                url: select_url,
                type:"GET",
                data:{"id":id},
                success:function(result){
                    $("#txtEmployeeID").val(result.e_id);
                    $("#txtEmployeeName").val(result.name);
                    $("#txtRemark").val(result.remark);
                    $("#txtDepartment").val(result.department_id);
                    $("#txtPosition").val(result.role_id);

                    __disable(true);
                    __button_bind();
                }
            });
        }

        function fun_edit(id)
        {
            var view_url = $("#hidden_view").val();
            $.ajax({
                url: view_url,
                type:"GET",
                data: {"id":id},
                success: function(result){
                    $("#txtEditid").val(result.id);
                    $("#txtEmployeeID").val(result.e_id);
                    $("#txtEmployeeName").val(result.name);
                    $("#txtRemark").val(result.remark);
                    $("#txtDepartment").val(result.department_id);
                    $("#txtPosition").val(result.role_id);

                    $("#btnSave").hide();
                    $("#btnUpdate").show();
                }
            });
        }

        function fun_delete(id)
        {
             var delete_url = $("#hidden_delete").val();
            $.ajax({
                url: delete_url,
                type: "POST",
                data: {"id": id, _token: "{{ csrf_token() }}"},
                success: function (response) {
                    location.reload();
                }
            });
        }


    </script>
@endsection