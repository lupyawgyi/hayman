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
            <a class="nav-link active" href="{{url('backend/users/index')}}">Users</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{url('backend/roles/index')}}">Roles</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{url('backend/permissions/index')}}">Permissions</a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="{{url('backend/branches/index')}}">Branches</a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="{{url('backend/staff/index')}}">Staff</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{url('backend/dropDowns/regions/index')}}">Dropdowns</a>
        </li>
        <li class="nav-item">
            <a class="nav-link disabled " href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        </li>
    </ul>
</div>
    <div class="container-fluid">
        @if(session('status'))
            @include("helpers.session")
        @endif
        <div class="my-2">
            <div class="card-header">
                <h3>All Users</h3>
            </div>
            <div>
                <a href="{{url('backend/users/create')}}" class="btn btn-outline-primary mt-3"><i class="fa fa-user" aria-hidden="true"></i> &nbsp;Create New User</a>
            </div>
            <div class="card-body">
                <table id="user" class="display" style="width:100%">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>User Name</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Branch</th>
                        <th>Role</th>
                        <th>State</th>

{{--                        <th>Created_at</th>--}}
{{--                        <th>Updated_at</th>--}}
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    </tbody>
                    <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>User Name</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Branch</th>
                        <th>Role</th>
                        <th>State</th>

{{--                        <th>Created_at</th>--}}
{{--                        <th>Updated_at</th>--}}
                        <th>Action</th>
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
    </script><script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>
<script src="{{asset("js/bootstrap.min.js")}}"></script>
<script src="{{asset("js/popper.min.js")}}"></script>
<script >
    $(document).ready(function() {
        $("#user").DataTable( {
            "processing" : true,
            "serverSide" : true,
            "orderable"  : true,
            "searchable" : true,
            "visible"    : true,

            "ajax" : {
                url : "/backend/user/ssd"
            },
            columns: [


                { data: 'id', name: 'id' },
                { data: 'name', name: 'name' },
                { data: 'full_name', name: 'full_name'},
                { data: 'email', name: 'email'},
                {data: 'branch',name:'branch'},
                {data:'role',name:'role'},
                {data:'state',name:'state'},

                // { data: 'created_at', name: 'created_at'},
                // { data: 'updated_at', name: 'updated_at' },
                { data: 'action', name: 'action'},

            ],
          //  "order":[[1, 'desc']],
            // dom: 'lBfrtip',
            dom : 'Bfrtip',
            buttons: [
                'pageLength',
                'excel',
                'csv',
                'pdf',
                'copy'

            ],
            lengthMenu : [[10,25,50,-1],[10,25,50,"ALL"]],
        } );
    } );
</script>

</body>
</html>

