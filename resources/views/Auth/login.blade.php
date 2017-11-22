@extends('layout.master')
@section('title','User Login')

@section('content')
    <div class="container col-md-8 col-md-offset-2">
        <div class="well well bg-conponent">

            <form method="post">
                <legend>Login Form</legend>

                @foreach($errors->all() as $error)
                    <p class="alert alert-danger">{{$error}}</p>
                @endforeach

                {{csrf_field()}}

                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                        <input type="email" autofocus class="form-control" id="exampleInputEmail1" name="email"
                               placeholder="Email" autofocus>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input type="password" class="form-control" id="txtpassword" name="password">
                    </div>
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox"> Check me out
                    </label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

        </div>
    </div>
@endsection