@extends('layout.master')
@section('title','Register Page')
@section('content')
    <div class="container">
        <div class="col-sm-8 col-sm-offset-2">
            <div class="well well bs-component">

                    <form method="post">
                        <legend>Register Form</legend>

                        @foreach($errors->all() as $error)
                            <p class="alert alert-danger">{!! $error !!}</p>
                        @endforeach

                        <input type="hidden" name="_token" value="{{csrf_token()}}">

                        <div class="form-group">
                            <label for="name">User Name</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input type="text" class="form-control" id="txtusername" name="name"
                                       placeholder="User Name" autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                <input type="email" class="form-control" id="txtemail" name="email" placeholder="Email">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input type="password" class="form-control" id="txtpassword" name="password">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="comfirmpassword">Confirm Password</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input type="password" class="form-control" id="txtconfirmpassword"
                                       name="password_confirmation">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Register</button>
                        <div class="clearifx"></div>
                    </form>
                </div>
            </div>
    </div>
@endsection