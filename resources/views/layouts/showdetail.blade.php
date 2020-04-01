<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('Title')</title>
    <link rel="icon" href="{!! asset('image/logo.ico') !!}">

    {{--<link rel="stylesheet" href="{!! asset('css/bootstrap.min.css') !!}">--}}
    <link rel="stylesheet" href="{!! asset('css/dataTable/bootstrap.css') !!}">
    <link rel="stylesheet" href="{!! asset('css/dataTable/fontawsome.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('css/dataTable/buttons.bootstrap4.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('css/dataTable/dataTables.bootstrap4.min.css') !!}">
</head>
<body>

@include('layouts.nav')
@yield('content')

<script src="{!! asset('js/dataTable/jquery.js') !!}"></script>

<script src="{!! asset('js/bootstrap.min.js') !!}"></script>
<script src="{!! asset('js/dataTable/dataTables.min.js') !!}"></script>
<script src="{!! asset('js/dataTable/dataTables.bootstrap4.min.js') !!}"></script>
<script src="{!! asset('js/dataTable/dataTables.buttons.min.js') !!}"></script>
<script src="{!! asset('js/dataTable/buttons.bootstrap4.min.js') !!}"></script>
<script src="{!! asset('js/dataTable/jszip.min.js') !!}"></script>
<script src="{!! asset('js/dataTable/pdfmake.min.js') !!}"></script>
<script src="{!! asset('js/dataTable/vfs_fonts.js') !!}"></script>
<script src="{!! asset('js/dataTable/buttons.html5.min.js') !!}"></script>
<script src="{!! asset('js/dataTable/buttons.print.min.js') !!}"></script>
<script src="{!! asset('js/dataTable/buttons.colVis.min.js') !!}"></script>

</body>
</html>
