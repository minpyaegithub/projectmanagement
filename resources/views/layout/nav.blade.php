
<!doctype html>
<html lang="en" class="1">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{!! asset('css/sidebar.css') !!}">
</head>
<body>
<script src="{!! asset('jquery/jquery-3.2.1.min.js') !!}"></script>
<div id="wrapper">
    <div class="overlay"></div>

    <!-- Sidebar -->
    <nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper" role="navigation">
        <ul class="nav sidebar-nav">
            <li class="sidebar-brand">
                <a href="#">
                    MBC
                </a>
            </li>
            <li>
                <a href="{{url('/')}}"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
            </li>
           {{--member--}}
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-users" aria-hidden="true"></i> Member <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    @if(Auth::check())
                        <li id="txtlogout" onclick="__logout()" value="{{url('users/logout')}}"><a href="#"><i class="fa fa-sign-out" aria-hidden="true"></i> logout</a> </li>
                    @else
                        <li><a href="{{url('users/login')}}"><i class="fa fa-sign-in" aria-hidden="true"></i> login</a></li>
                        <li><a href="{{url('users/register')}}"><i class="fa fa-user-plus" aria-hidden="true"></i> Register</a></li>
                    @endif
                </ul>
            </li>
            {{--endmember--}}
            {{--view user--}}
            @if(Auth::check())
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-stop" aria-hidden="true"></i> Authority <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{{url('users')}}">User Permission</a></li>
                    </ul>
                </li>
            @endif
            {{--end view user--}}
            {{--user role--}}
            @if(Auth::check())
                @if(Auth::user()->hasRole('member')||Auth::user()->hasRole('manager'))
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"> Master <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{{url('member/client')}}">Client Form</a></li>
                        <li><a href="{{url('member/department')}}">Department Form</a></li>
                        <li><a href="{{url('member/employee')}}">Empoyee Form</a></li>
                        <li><a href="{{url('role')}}">Position Form</a></li>
                        <li><a href="{{url('member/project')}}">Project Form</a></li>
                        <li><a href="{{url('member/task')}}">Task Form</a></li>
                        {{--<li><a href="{{url('roles')}}">View Roles</a></li>--}}
                    </ul>
                </li>


            {{--end user role--}}
            {{--user role--}}

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"> Transactions <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{{url('member/work')}}">Work Form</a></li>
                    </ul>
                </li>

            {{--end user role--}}
            {{--view employee--}}

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"> Categories <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{{url('member/ccategory')}}">ClientCategory Form</a></li>
                        <li><a href="{{url('member/pcategory')}}">ProjectCategory Form</a></li>
                        <li><a href="{{url('member/tcategory')}}">TaskCategory Form</a></li>
                    </ul>
                </li>

                @endif
            @endif
            {{--end view employee--}}
            {{--<li>
                <a href="https://twitter.com/maridlcrmn">Follow me</a>
            </li>--}}
        </ul>
    </nav>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">
        <button type="button" class="hamburger is-closed" data-toggle="offcanvas">
            <span class="hamb-top"></span>
            <span class="hamb-middle"></span>
            <span class="hamb-bottom"></span>
        </button>
    </div>
    <!-- /#page-content-wrapper -->

</div>
<!-- /#wrapper -->

<script>
    $(document).ready(function () {
        var trigger = $('.hamburger'),
            overlay = $('.overlay'),
            isClosed = false;

        trigger.click(function () {
            hamburger_cross();
        });

        function hamburger_cross() {

            if (isClosed == true) {
                overlay.hide();
                trigger.removeClass('is-open');
                trigger.addClass('is-closed');
                isClosed = false;
            } else {
                overlay.show();
                trigger.removeClass('is-closed');
                trigger.addClass('is-open');
                isClosed = true;
            }
        }

        $('[data-toggle="offcanvas"]').click(function () {
            $('#wrapper').toggleClass('toggled');
        });

    });
</script>
</body>
</html>