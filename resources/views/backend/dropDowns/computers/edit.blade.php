@extends('layouts.master')

@section('title','Branch Edit')
@section('content')
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

    <div class="container-fluid my-5">
        <div class="col-md-4">
            <div class="card card-body">
                <form method="post">
                    @include("helpers.error_loop")
                    {{csrf_field()}}
                    <legend class="text-center text-info mb-2">Update Phone Detail</legend>
                    <div class="form-group">
                        <label for="local_id">Local ID</label>
                        <input type="text" class="form-control " id="local_id" placeholder="Enter Local ID"
                               name="local_id" value="{{$device->local_id}}">
                    </div>
                    <div class="form-group">
                        <label for="brand">Brand</label>
                        <input type="text" class="form-control " id="brand" placeholder="Enter Brand Name" name="brand"
                               value="{{$device->brand}}">
                    </div>
                    <div class="form-group">
                        <label for="model_or_serial">Model or Serial</label>
                        <input type="text" class="form-control" id="model_or_serial"
                               placeholder="Ender Model or Serial Name" name="model_or_serial"
                               value="{{$device->model_or_serial}}">
                    </div>
                    <div class="form-group">
                        <label for="specification">Specification</label>
                        <input type="text" class="form-control" id="specification"
                               placeholder="Ender Device Specification" name="specification"
                               value="{{$device->specification}}">
                    </div>
                    <div class="form-group">
                        <label for="ip_address">IP Address</label>
                        <input type="text" class="form-control" id="ip_address" placeholder="Enter IP Address"
                               name="ip_address" value="{{$device->ip_address}}">
                    </div>
                    <div class="form-group">
                        <label for="user_name">User Name</label>
                        <input type="text" class="form-control" id="user_name" placeholder="Enter User Name"
                               name="user_name" value="{{$device->user_name}}">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="text" class="form-control" id="password" placeholder="Enter Password"
                               name="password" value="{{$device->password}}">
                    </div>
                    <div class="form-group">
                        <label for="branchName">Company Name</label>
                        <input type="text" class="form-control" id="companyName" placeholder="Enter Company Name"
                               name="companyName" list="companies" value="{{$company->id}}">
                        <datalist id="companies">
                            @foreach($companies as $company)
                                <option value="{{$company->id}}"
                                    {{$phone->company_id == $company->id ? "selected" : ""}}
                                >{{$company->name}}</option>
                            @endforeach
                        </datalist>
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" class="form-control" id="price" placeholder="Ender Price" name="price"
                               value="{{$device->price}}">
                    </div>
                    <div class="form-group">
                        <label for="bought_date">Bought Date</label>
                        <input type="date" class="form-control" id="bought_date"
                               placeholder="Ender Model or Serial Name" name="bought_date"
                               value="{{$device->bought_date}}">
                    </div>
                    <div class="row justify-content-end no-gutters">
                        <button type="submit" class="btn btn-primary  mr-3">Add</button>
                        <button type="reset" class="btn btn-warning ">Cancle</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
