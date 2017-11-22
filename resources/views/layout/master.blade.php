<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <style>
        .bgcolor { background-color: #8c6969 !important; }
    </style>

    <link rel="stylesheet" href="{!! asset('bootstrap-3.3.7/css/bootstrap.css') !!}">
    {{--<link rel="stylesheet" href="{!! asset('bootstrap-3.3.7/css/bootswatch.css') !!}">--}}
    {{--<link rel="stylesheet" href="{!! asset('bootstrap-3.3.7/bootstrap.min.css') !!}">--}}
    <link rel="stylesheet" href="{!! asset('css/common.css') !!}">
    <link rel="stylesheet" href="{!! asset('css/jquery.dataTables.min.css') !!}">

    <link rel="stylesheet" href="{!! asset('css/datatables.buttons.min.css') !!}">

     <link rel="stylesheet" href="{!! asset('css/datatables.bootstrap.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('css/jquery.ui-contextmenu.css') !!}">
    <link rel="stylesheet" href="{!! asset('datatable/css/colreorder.css') !!}">
    <link rel="stylesheet" href="{!! asset('datatable/css/responsive.css') !!}">
    {{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">--}}
    <link rel="stylesheet" href="{!! asset('css/datepicker.css') !!}">
    <link rel="stylesheet" href="{!! asset('css/confirmbox.css') !!}">
    <link rel="stylesheet" href="{!! asset('css/font-awesome-4.7.0/css/font-awesome.min.css') !!}">

   {{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.15/datatables.min.css"/>--}}


    {{--<link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">--}}

</head>
<body>
@include('messagebox')
@include('layout.nav')
@yield('content')

<script src="{!! asset('jquery/jquery-3.2.1.min.js') !!}"></script>
<script src="{!! asset('bootstrap-3.3.7/js/bootstrap.js') !!}"></script>
<script src="{!! asset('js/jquery.dataTables.min.js') !!}"></script>
<script src="{!! asset('js/jquery.ui-contextmenu.js')!!}"></script>
<script src="{!! asset('js/jquery.ui.position.js') !!}"></script>
<script src="{!! asset('js/datatables.min.js') !!}"></script>
<script src="{!! asset('js/common.js') !!}"></script>
<script src="{!! asset('datatable/js/colreorder.js') !!}"></script>
<script src="{!! asset('datatable/js/responsive.js') !!}"></script>
<script src="{!! asset('datatable/js/fixedheader.js')!!}"></script>
<script src="{!! asset('datatable/js/scroller.js')!!}"></script>
<script src="{!! asset('js/datepicker.js') !!}"></script>
<script src="{!! asset('js/keydown.js') !!}"></script>
<script src="{!! asset('js/confirmbox.js') !!}"></script>

<script src="{!! asset('js/datatables.buttons.min.js') !!}"></script>
<script src="{!! asset('js/datatables.buttons.html5.min.js') !!}"></script>
<script src="{!! asset('js/zszip.min.js') !!}"></script>


{{--<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>--}}
@yield('scripts')
@yield('javascript')
</body>
</html>