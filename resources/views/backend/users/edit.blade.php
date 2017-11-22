
@extends('layout.master')

@section('title','Edit User')
@section('content')
    <div class="container col-sm-8 col-sm-offset-2">
        <div class="well">
            <form method="post">
                <legend>Edit User</legend>
                <div class="form-horizontal">
                {{csrf_field()}}
                @if(session('status'))
                        @section('scripts')
                        <script>__show_success_alert('Save Successfully Inserted Sir!!')</script>
                         @endsection
                @endif
                <div class="row">
                    <div class="col-sm-12">
                        <div class="col-sm-7">
                            <div class="form-group">
                                <div class="control-label col-sm-5">
                                    <div style="float: left">
                                        <Label ID="lblUserName">
                                            User Name:
                                        </Label>
                                    </div>
                                </div>
                                <div class="col-sm-7 text-group float-left">
                                    <input type="text" class="form-control" id="txtusername" name="username" tabindex="1" value="{{$user->name}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="control-label col-sm-5">
                                    <div style="float: left">
                                        <Label ID="lblEmail"  Style="width: 100%;">
                                            Email:
                                        </Label>
                                    </div>
                                </div>
                                <div class="col-sm-7 text-group float-left">
                                    <input type="email" class="form-control" id="txtEmail" name="email" tabindex="2" value="{{$user->email}}">
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
                                    <select class="form-control" name="role" id="txtRole">
                                        @foreach($roles as $role)
                                        <option value="{{$role->name}}"
                                                @if(in_array($role->name,$selectedRoles))
                                        selected="selected"
                                                @endif
                                        >
                                            {{$role->name}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                              <div class="panel-footer">
                               <button type="submit" class="btn btn-primary button-style">Update</button>
                                <a href="{{url('users')}}">
                                <button type="button" class="btn btn-default button-style">
                                    <i class="fa fa-hand-o-left" aria-hidden="true"></i>
                                Back</button>
                                </a>
                          </div>

                          </div>
                        </div>
                    </div>
                </div>
            </div>         
            </form>
        </div>
    </div>
@endsection
@section('javascript')
    <script type="text/javascript">
        $(document).ready(function () {

        });
    </script>

@endsection