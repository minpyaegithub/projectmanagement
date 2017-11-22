@extends('layout.master')

@section('title','Client Form')
@section('content')
    <div class="container">
        <div class="well" style="overflow-x:auto;">
            @if ($message = Session::get('success'))
            @section('scripts')<script>__show_success_alert('Save Successfully Sir!')</script>@endsection
                @endif
                <legend>Client Form</legend>
                <button type="button" class="btn btn-info btn-sm pull-right button-style" id="btnAdd" data-toggle="modal" data-target="#addModal">Add</button>
                <table class="table table-striped table-bordered" id="table">
                    <thead>
                    <tr>
                        <th>Client ID</th>
                        <th>Client Name</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $x)
                        <tr id="{{$x -> id}}" value="{{$x -> id}}">
                            <td>{{$x -> c_id}}</td>
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
             </div>
                <input type="hidden" name="hidden_view" id="hidden_view" value="{{url('member/client/view')}}">
                <input type="hidden" name="hidden_delete" id="hidden_delete" value="{{url('client/delete')}}">
                <input type="hidden" name="hidden_select" id="hidden_select" value="{{url('client/select')}}">
                <!-- Add Modal start -->
                <div class="modal fade" id="addModal" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header btn-primary">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Add Record</h4>
                            </div>

                            <form action="{{url('client')}}" method="post">
                                <div class="modal-body">
                                    <div class="form-horizontal">
                                        {{csrf_field()}}
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="col-sm-7">

                                                    <div class="form-group">
                                                        <div class="control-label col-sm-5">
                                                            <div style="float: left">
                                                                <Label ID="lblClientID">
                                                                    Client ID:
                                                                </Label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-7 text-group float-left">
                                                            <input type="text" tabindex="1" id="txtClientID" name="client_id"
                                                                   class="form-control" required autofocus >
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="control-label col-sm-5">
                                                            <div style="float: left">
                                                                <Label ID="lblClientName"  Style="width: 100%;">
                                                                    Client Name:
                                                                </Label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-7 text-group float-left">
                                                            <input type="text" tabindex="2" id="txtClientName" name="client_name"
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
                        <p><b>Client ID : </b><span id="view_clientid" class="text-success"></span></p>
                        <p><b>Client Name : </b><span id="view_clientname" class="text-success"></span></p>
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

            $("#txtClientID").change(function () {
                var id = $("#txtClientID").val();
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

            /*$("tr").mousedown(function(event) {
                if (event.which === 3) {
                    alert($(this).attr("id"));
                }
            });*/

           /* $(function() {
                $('.table').on('contextmenu', 'tr', function(e) {
                    e.preventDefault();
                    alert(this.id);
                });
            });*/

        });


        function clear(){
            __disable(false);
            $("#txtClientID").val('');
            $("#txtClientName").val('');
            $("#txtClientID").focus();
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
                    $("#view_clientid").text(result.c_id);
                    $("#view_clientname").text(result.name);
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
                    $("#txtClientID").val(result.c_id);
                    $("#txtClientName").val(result.name);

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
                    $("#txtClientID").val(result.c_id);
                    $("#txtClientName").val(result.name);

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