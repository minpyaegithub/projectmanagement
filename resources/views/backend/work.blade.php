@extends('layout.master')

@section('title','Work Form')
@section('content')
    <div class="container">
        <div class="well" style="overflow-x: auto">
            @if ($message = Session::get('success'))
            @section('scripts')<script>__show_success_alert('Save Successfully Sir!')</script>@endsection
            @endif
            <legend>Work Form</legend>
            <button type="button" class="btn btn-info btn-sm pull-right button-style" id="btnAdd" data-toggle="modal" data-target="#addModal">Add</button>
            <table class="table table-bordered" id="employee">
                <thead>
                <tr>
                    <th>User Name</th>
                    <th>Date</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $x)

                    <tr>
                        @foreach($users as $user)
                            @if($user->id === $x->user_id)
                                <td id="txtuser">{{$user->name}}</td>
                            @endif
                        @endforeach
                        <td>{{$x -> date}}</td>
                        <td>{{$x -> description}}</td>
                        <td><button class="btn btn-info button-style" onclick="fun_view('{{$x -> id}}')" id="btnView" data-toggle="modal" data-target="#viewModal">View</button>
                                <button class="btn btn-warning button-style" id="btnEdit" data-toggle="modal" data-target="#addModal" onclick="fun_edit('{{$x -> id}}')">Edit</button>
                                <button class="btn btn-danger button-style confirm" id="btnDelete" onclick="__delete('{{$x->id}}')">Delete</button>
                                <input type="hidden" id="txtid" value="{{$x->id}}">
                            </td>
                    </tr>

                @endforeach
                </tbody>
            </table>
            <input type="hidden" name="hidden_view" id="hidden_view" value="{{url('member/work/view')}}">
            <input type="hidden" name="hidden_delete" id="hidden_delete" value="{{url('member/work/delete')}}">
            <input type="hidden" name="hidden_select" id="hidden_select" value="{{url('member/work/select')}}">
            <!-- Add Modal start -->
            <div class="modal fade" id="addModal" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header btn-primary">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Add Record</h4>
                            </div>

                            <form action="{{url('member/work')}}" method="post">
                                <div class="modal-body">
                                    <div class="form-horizontal">
                                        {{csrf_field()}}
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="col-sm-7">

                                                    <div class="form-group">
                                                        <div class="control-label col-sm-5">
                                                            <div style="float: left">
                                                                <Label ID="lblDate">
                                                                    Date:
                                                                </Label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-7 text-group float-left">
                                                            <input class="form-control" id="txtDate" enabled="false" name="date" tabindex="1" 
                                                                placeholder="DD/MM/YYYY" type="text" />
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="control-label col-sm-5">
                                                            <div style="float: left">
                                                                <Label ID="lblUserName"  Style="width: 100%;">
                                                                    User Name:
                                                                </Label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-7 text-group float-left">
                                                            <select class="form-control" name="username" id="txtUserName" tabindex="2">
                                                                @foreach($users as $user)
                                                                    <option value="{{$user->id}}">
                                                                        {{$user->name}}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="control-label col-sm-5">
                                                            <div style="float: left">
                                                                <Label ID="lblPosition"  Style="width: 100%;">
                                                                    Position:
                                                                </Label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-7 text-group float-left">
                                                            <select class="form-control" name="position" id="txtPosition" tabindex="3">
                                                                @foreach($roles as $role)
                                                                    <option value="{{$role->id}}">
                                                                        {{$role->name}}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="control-label col-sm-5">
                                                            <div style="float: left">
                                                                <Label ID="lblDepartment"  Style="width: 100%;">
                                                                    Department:
                                                                </Label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-7 text-group float-left">
                                                            <select class="form-control" name="department" id="txtDepartment" tabindex="4" >
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
                                                            <div style="float: left">
                                                                <Label ID="lblProject"  Style="width: 100%;">
                                                                    Project:
                                                                </Label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-7 text-group float-left">
                                                            <select class="form-control" name="project" id="txtProject" tabindex="5">
                                                                @foreach($projects as $project)
                                                                    <option value="{{$project->id}}">
                                                                        {{$project->name}}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="control-label col-sm-5">
                                                            <div style="float: left">
                                                                <Label ID="lblDescription"  Style="width: 100%;">
                                                                    Description:
                                                                </Label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-7 text-group float-left">
                                                            <textarea id="txtDescription" name="description" rows="3" class="form-control" tabindex="6" autocomplete="off" required></textarea>
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
                                <p><b>Date : </b><span id="view_date" class="text-success"></span></p>
                                <p><b>User Name : </b><span id="view_username" class="text-success"></span></p>
                                <p><b>Position : </b><span id="view_position" class="text-success"></span></p>
                                <p><b>Department : </b><span id="view_department" class="text-success"></span></p>
                                <p><b>Project : </b><span id="view_project" class="text-success"></span></p>
                                <p><b>Description : </b><span id="view_description" class="text-success"></span></p>
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
        $(document).ready(function () {

            __dataTable();

            /*$('#txtDate').mask('00/00/0000');*/
            $('#txtDate').datepicker({
                format: 'yyyy-mm-dd',
                autoclose: true
            }).on('change', function (selected) {
                $('#txtUserName').focus();
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

            $('#txtDate').datepicker('setDate', _dateNow());

        });

        function clear(){
            __disable(false);
            $('#txtDate').datepicker('setDate', _dateNow());
            $('#txtUserName').val('');
            $('#txtPosition').val('');
            $('#txtDepartment').val('');
            $('#txtProject').val('');
            $('#txtDescription').val('');
            $('#txtDate').focus();
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
                    $("#view_date").text(result.date);
                    $("#view_position").text(result.role.name);
                    $("#view_username").text(result.user.name);
                    $("#view_department").text(result.department.name);
                    $("#view_project").text(result.project.name);
                    $("#view_description").text(result.description);
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
                    $("#txtDate").val(_getDateDMY(result.date));
                    $("#txtUserName").val(result.user_id);
                    $("#txtPosition").val(result.role_id);
                    $("#txtDepartment").val(result.department_id);
                    $("#txtProject").val(result.project_id);
                    $("#txtDescription").val(result.description);

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