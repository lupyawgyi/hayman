<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Computer</title>
    <link rel="icon" href="{!! asset('image/logo.ico') !!}">
    {{--    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" >--}}
    <link rel="stylesheet" href="{{asset("css/bootstrap.css")}}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="{{asset('css/fontawsome.min.css')}}">
    <link rel="stylesheet" href="{{asset("/css/bootstrap-theme.min.css")}}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="vendor/select2/dist/css/select2.min.css" rel="stylesheet"/>
    <link href="{{ asset('css/select2') }}" rel="stylesheet"/>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet"/>

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
            <a class="nav-link " href="{{url('backend/branches/index')}}">Branches</a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="{{url('backend/staff/index')}}">Staff</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="{{url('backend/dropDowns/regions/index')}}">Dropdowns</a>
        </li>
        <li class="nav-item">
            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        </li>
    </ul>
</div>

<div class="card-header">
    <h3>Add New Computer </h3>
</div>
<div class="row">
    <div class="col-md-4 mt-4 ml-2">
        <div class="card card-body">
            <form method="post" enctype="multipart/form-data">
                @include("helpers.error_loop")
                {{csrf_field()}}
                <div class="form-group">
                    <label for="local_id">Local ID</label>
                    <input type="text" class="form-control " id="local_id" placeholder="Enter Local ID"
                           value="{{$LastID}}"
                           name="local_id">
                </div>
                <div class="form-group">
                    <label for="brand">Brand</label>
                    <input type="text" class="form-control " id="brand" placeholder="Enter Brand Name" name="brand">

                </div>
                <div class="form-group">
                    <label for="model_or_serial">Model or Serial</label>
                    <input type="text" class="form-control" id="model_or_serial"
                           placeholder="Ender Model or Serial Name" name="model_or_serial">
                </div>
                <div class="form-group">
                    <label for="specification">Specification</label>
                    <input type="text" class="form-control" id="specification" placeholder="Ender Device Specification"
                           name="specification">
                </div>
                <div class="form-group">
                    <label for="ip_address">IP Address</label>
                    <input type="text" class="form-control" id="ip_address" placeholder="Enter IP Address"
                           name="ip_address">
                </div>
                <div class="form-group row">
                    <label for="office_name" class="col-3 col-form-label">Company *</label>
                    <div class="col-12 ">
                        <select id="js-example-basic-single" class="form-control" name="company_id">
                            @foreach($companies as $company)
                                <option value="{{$company->id}}">{{$company->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="live_year">Active Live</label>
                    <div class="row ">
                        <div class="col-8">
                            <input type="number" class="form-control" placeholder="Ender Active Live Year" name="live_year">
                        </div>
                        <div class="col-md-4">
                            <select class="form-control" name="active">
                                <option value="year">Year</option>
                                <option value="month">Month</option>

                            </select>
                        </div>

                    </div>
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <div class="row ">
                        <div class="col-md-3">
                            <select class="form-control" name="country">
                                <option value="MMK">MMK</option>
                                <option value="USA">USA</option>
                                <option value="EUR">EUR</option>
                                <option value="SGD">SGD</option>
                            </select>
                        </div>
                        <div class="col-9">
                            <input type="number" class="form-control" id="price" placeholder="Ender Price" name="price">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="bought_date">Bought Date</label>
                    <input type="date" class="form-control" id="bought_date" placeholder="Ender Model or Serial Name"
                           name="bought_date">
                </div>
                <div class="form-group">
                    <label for="image">Device Image</label>
                    <input type="file" class="form-control-file" name="image">
                </div>
                <div class="form-group">
                    <label for="warranty_card">Warranty Card Image</label>
                    <input type="file" class="form-control-file" name="warranty_card">
                </div>
                <div class="row justify-content-end no-gutters">
                    <button type="submit" class="btn btn-primary  mr-3">Add</button>
                    <a href="{{ URL::previous() }}" class="btn btn-warning">Cancel</a>
                </div>


        </div>
    </div>
    <div class="col-md-3 mt-4 ">

        {{csrf_field()}}
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead class="bg-secondary text-white">
            <th>Currency</th>
            <th><?php echo date('Y-m-d');?> Rate</th>

            </thead>
            <tbody>
            <tr>
                <td>USA</td>
                <td><input type="text" name="USA_rate" value="{{$exchange->rates->USD}}"></td>
            </tr>
            <tr>
                <td>EUR</td>
                <td><input type="text" name="EUR_rate" value="{{$exchange->rates->EUR}}"></td>
            </tr>
            <tr>
                <td>SGD</td>
                <td><input type="text" name="SGD_rate" value="{{$exchange->rates->SGD}}"></td>
            </tr>

            </tbody>

        </table>
        </form>
    </div>
</div>
<script src="{{asset("js/jquery-3.4.1.min.js")}}"></script>

<script src="{{asset("js/datatable/jquery-3.3.1.js")}}"></script>
<script src="{{asset("js/datatable/jquery.dataTables.min.js")}}"></script>
{{--    export button--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script src="{{ asset('js/select2') }}"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>


<script>
    $(document).ready(function () {
        $("#js-example-basic-single").select2();
        $(".js-example-basic-multiple").select2();
    });
</script>
</body>
</html>

