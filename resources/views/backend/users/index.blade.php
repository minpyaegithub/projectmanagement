@extends('layout.master')
@section('title','View Users')

@section('content')
    <div class="container">
        <div class="well" style="overflow-x:auto;">
            <legend>Users Table</legend>
            <table class="table table-bordered">
                <thead>
                    <th>Name</th>
                    <th>Email</th>

                    <th>Actions</th>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                           
                            <td>
                                <button class="btn btn-info button-style" onclick="fun_view('{{$user -> id}}')" id="btnView" data-toggle="modal" data-target="#viewModal">View</button>
                                <a href="{{action('admin\UserController@edit',$user->id)}}">
                                <button class="btn btn-warning button-style" id="btnEdit" name="edit">Edit</button>
                                </a>
                                <button class="btn btn-danger button-style" id="btnDelete" onclick="__delete('{{$user->id}}')">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <input type="hidden" name="hidden_view" id="hidden_view" value="{{url('users/view')}}">
            <input type="hidden" name="hidden_delete" id="hidden_delete" value="{{url('users/delete')}}">
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
                            <p><b>User Name : </b><span id="view_name" class="text-success"></span></p>
                            <p><b>Email : </b><span id="view_email" class="text-success"></span></p>
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

        });

        function fun_view(id)
        {
            var view_url = $("#hidden_view").val();
            $.ajax({
                url: view_url,
                type:"GET",
                data: {"id":id},
                success: function(result){
                    $("#view_name").text(result.name);
                    $("#view_email").text(result.email);
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