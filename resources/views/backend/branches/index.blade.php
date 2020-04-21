<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('Title')</title>
    <link rel="icon" href="{!! asset('image/logo.ico') !!}">
    {{--    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" >--}}
    <link rel="stylesheet" href="{{asset("css/bootstrap.css")}}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="{{asset('css/fontawsome.min.css')}}">
    <link rel="stylesheet" href="{{asset("/css/bootstrap-theme.min.css")}}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


</head>
<body>
@include('layouts.nav')
<div class="container-fluid mt-3">
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link " href="{{url('backend/users/index')}}">Users</a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="{{url('backend/roles/index')}}">Roles</a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="{{url('backend/permissions/index')}}">Permissions</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="{{url('backend/branches/index')}}">Branches</a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="{{url('backend/staff/index')}}">Staff</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{url('backend/dropDowns/regions/index')}}">Dropdowns</a>
        </li>
        <li class="nav-item">
            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        </li>
    </ul>
</div>
<div class="container-fluid">
    @include("helpers.session")
    <div class="my-2">
        <div class="card-header">
            <h3>All Branches</h3>
        </div>
        <div>
            <a href="{{url('backend/branches/create')}}" class="btn btn-outline-primary mt-3 text-center"><i
                    class="fa fa-xbox" aria-hidden="true"></i> &nbsp;Create New Branch</a>
        </div>
        <div class="card-body">
            <table id="mm" class="display" style="width:100%">
                <thead>
                <tr>
                    <th>Branch Name</th>
                    <th>Region</th>
                    <th>Operning Date</th>
                    <th>Office Address</th>
                    <th>City</th>
                    <th>Phone</th>
                    <th>Manager</th>
                    <th width="60px">Action</th>
                    {{--                    <th></th>--}}
                </tr>
                </thead>
                <tbody>

                </tbody>
                <tfoot>
                <tr>
                    <th>Branch Name</th>
                    <th>Region</th>
                    <th>Operning Date</th>
                    <th>Office Address</th>
                    <th>City</th>
                    <th>Phone</th>
                    <th>Manager</th>
                    <th width="60px">Action</th>
                    {{--                    <th></th>--}}
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>


<script src="{{asset("js/jquery-3.4.1.min.js")}}"></script>

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
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js">
</script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>
<script src="{{asset("js/bootstrap.min.js")}}"></script>
<script src="{{asset("js/popper.min.js")}}"></script>
<script>
    $(document).ready(function () {
        $("#mm").DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {

                url: "/backend/branches/ssd"
            },
            {{--            ajax: '{!! route('get.roles') !!}',--}}
            columns: [

                {data: 'name', name: 'name'},
                {data: 'region_id',name:'region_id'},
                {data: 'openingDate', name: 'openingDate'},
                {data: 'address', name: 'Address'},
                {data: 'city', name: 'city'},
                {data: 'phone', name: 'phone'},
                {data: 'manager', name: 'manager'},
                {data: 'action', name: 'action'},


            ],
            // dom: 'lBfrtip',
            dom: 'Bfrtip',
            buttons: [
                'pageLength',
                'excel',
                'csv',
                'pdf',
                'copy'

            ],
            lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "ALL"]],
        });

        // $(document).on('click','.role' , function () {
        //     var id = $(this).data('id');
        //     // alert(id);
        //     $.ajax({
        //         // url : '/backend/roles/{id}/show',
        //         url: '/backend/roles/2/show',
        //         type : 'GET',
        //
        //     });
        // });

    });
</script>

</body>
</html>


