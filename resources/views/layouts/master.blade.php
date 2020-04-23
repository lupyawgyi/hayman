<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('Title')</title>
    <link rel="icon" href="{!! asset('image/logo.ico') !!}">
    <link rel="stylesheet" href="{{asset("/css/bootstrap.css")}}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    {{--    datatable--}}
    <link rel="stylesheet" href="{{asset('css/batton.datatable.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap-theme.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/jquary.datatable.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/fontawsome.min.css')}}">
    {{--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">--}}
    {{--    <link rel="stylesheet" href="{{asset("/css/bootstrap.min.css")}}">--}}


<!-- Optional theme -->
    {{--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">--}}
    <link rel="stylesheet" href="{{asset("/css/bootstrap-theme.min.css")}}">
    <link rel="stylesheet" href="{{asset("/css/fontawesome.min.css")}}">

{{--    for dropdown--}}
{{--    <link href="vendor/select2/dist/css/select2.min.css" rel="stylesheet"/>--}}
{{--    <link href="{{ asset('css/select2') }}" rel="stylesheet"/>--}}

{{--    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>--}}
{{--    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet"/>--}}


</head>
<body>

@include('layouts.nav')
@yield('content')

<script src="{{asset("js/jquery-3.4.1.min.js")}}"></script>
{{--    datatable--}}
<script src="{{asset("js/datatable/jquery-3.3.1.js")}}"></script>
<script src="{{asset("js/datatable/jquery.dataTables.min.js")}}"></script>
{{--    export button--}}
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.flash.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>


<!-- Latest compiled and minified JavaScript -->
{{--    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>--}}
<script src="{{asset("js/bootstrap.min.js")}}"></script>
<script src="{{asset("js/popper.min.js")}}"></script>


</body>
</html>
