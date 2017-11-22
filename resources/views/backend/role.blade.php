@extends('layout.master')

@section('title','Role')
@section('content')
    <div class="container">
      <div class="well" style="overflow-x:auto;">
        @if ($message = Session::get('success'))
            @section('scripts')<script>__show_success_alert('Save Successfully Sir!')</script>@endsection
        @endif
        @foreach($errors->all() as $error)
                    <strong>@section('scripts')<script>__show_danger_alert('Save fail!')</script>@endsection</strong>
        @endforeach

        <button type="button" class="btn btn-info btn-sm pull-right button-style" id="btnAdd" data-toggle="modal" data-target="#addModal">Add</button>
        <table class="table table-bordered" id="role">
            <thead>
            <tr>
                <th>Role ID</th>
                <th>Role Name</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $x)
                <tr>
                    <td>{{$x -> r_id}}</td>
                    <td>{{$x -> name}}</td>
                    <td><button class="btn btn-info button-style" onclick="fun_view('{{$x -> id}}')" id="btnView" data-toggle="modal" data-target="#viewModal">View</button>
                                <button class="btn btn-warning button-style" id="btnEdit" data-toggle="modal" data-target="#addModal" onclick="fun_edit('{{$x -> id}}')">Edit</button>
                                <button class="btn btn-danger button-style confirm" id="btnDelete" onclick="__delete('{{$x->id}}')">Delete</button>
                                <input type="hidden" id="txtid" value="{{$x->id}}">
                            </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <input type="hidden" name="hidden_view" id="hidden_view" value="{{url('role/view')}}">
        <input type="hidden" name="hidden_delete" id="hidden_delete" value="{{url('role/delete')}}">
        <input type="hidden" name="hidden_select" id="hidden_select" value="{{url('role/select')}}">

        <!-- Add Modal start -->
        <div class="modal fade" id="addModal" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header btn-primary">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Add Record</h4>
                            </div>

                            <form action="{{url('role')}}" method="post">
                                <div class="modal-body">
                                    <div class="form-horizontal">
                                        {{csrf_field()}}
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="col-sm-7">

                                                    <div class="form-group">
                                                        <div class="control-label col-sm-5">
                                                            <div style="float: left">
                                                                <Label ID="lblRoleID">
                                                                    Position ID:
                                                                </Label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-7 text-group float-left">
                                                            <input type="text" tabindex="1" id="txtRoleID" name="role_id"
                                                                   class="form-control" required autofocus >
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="control-label col-sm-5">
                                                            <div style="float: left">
                                                                <label ID="lblRoleName"  Style="width: 100%;">
                                                                    Position Name:
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-7 text-group float-left">
                                                            <input type="text" tabindex="2" id="txtRoleName" name="role_name"
                                                                   class="form-control" autocomplete="off" required >
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
                                    <button type="button" class="btn btn-primary button-style" data-dismiss="modal">Close</button>
                                    <input type="hidden" id="txtEditid" name="edit_id">
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
                        <p><b>Role ID : </b><span id="view_roleid" class="text-success"></span></p>
                        <p><b>Role Name : </b><span id="view_rolename" class="text-success"></span></p>
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

            $("#txtRoleID").change(function () {
                var id = $("#txtRoleID").val();
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

        function clear() {
            __disable(false);
            $('#txtRoleID').val('');
            $('#txtRoleName').val('');
            $("#txtRoleID").focus();
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
                    $("#view_roleid").text(result.r_id);
                    $("#view_rolename").text(result.name);
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
                    $("#txtRoleID").val(result.r_id);
                    $("#txtRoleName").val(result.name);

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
                    $("#txtRoleID").val(result.r_id);
                    $("#txtRoleName").val(result.name);

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