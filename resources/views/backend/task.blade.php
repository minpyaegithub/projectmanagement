@extends('layout.master')

@section('title','Task Form')
@section('content')
    <div class="container">
        <div class="well" style="overflow-x:auto;">
            @if ($message = Session::get('success'))
            @section('scripts')<script>__show_success_alert('Save Successfully Sir!')</script>@endsection
            @endif

            <button type="button" class="btn btn-info btn-sm pull-right button-style" id="btnAdd" data-toggle="modal" data-target="#addModal">Add</button>
            <table class="table table-bordered" id="project" bgcolor="black">
                <thead>
                <tr>
                    <th>Task ID</th>
                    <th>Task Name</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $x)
                    <tr>
                        <td>{{$x -> t_id}}</td>
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

            <input type="hidden" name="hidden_view" id="hidden_view" value="{{url('member/task/view')}}">
            <input type="hidden" name="hidden_delete" id="hidden_delete" value="{{url('member/task/delete')}}">
            <input type="hidden" name="hidden_select" id="hidden_select" value="{{url('member/task/select')}}">
        <!-- Add Modal start -->
        <div class="modal fade" id="addModal" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header btn-primary">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Add Record</h4>
                            </div>

                            <form action="{{url('member/task')}}" method="post">
                                <div class="modal-body">
                                    <div class="form-horizontal">
                                        {{csrf_field()}}
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="col-sm-7">

                                                    <div class="form-group">
                                                        <div class="control-label col-sm-5">
                                                            <div style="float: left">
                                                                <Label ID="lblTaskID">
                                                                    Task ID:
                                                                </Label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-7 text-group float-left">
                                                            <input type="text" tabindex="1" id="txtTaskID" name="task_id"
                                                                   class="form-control" required autofocus >
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="control-label col-sm-5">
                                                            <div style="float: left">
                                                                <Label ID="lblTaskName"  Style="width: 100%;">
                                                                    Task Name:
                                                                </Label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-7 text-group float-left">
                                                            <input type="text" tabindex="2" id="txtTaskName" name="task_name"
                                                                   class="form-control" autocomplete="off">
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
                        <p><b>Task ID : </b><span id="view_taskid" class="text-success"></span></p>
                        <p><b>Task Name : </b><span id="view_taskname" class="text-success"></span></p>
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

            $("#txtTaskID").change(function () {
                var id = $("#txtTaskID").val();
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
            $("#txtTaskID").val('');
            $("#txtTaskName").val('');
            $("#txtTaskID").focus();
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
                    $("#view_taskid").text(result.t_id);
                    $("#view_taskname").text(result.name);
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
                    $("#txtTaskID").val(result.t_id);
                    $("#txtTaskName").val(result.name);

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
                    $("#txtTaskID").val(result.t_id);
                    $("#txtTaskName").val(result.name);

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