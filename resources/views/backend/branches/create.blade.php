@extends('layouts.master')

@section('title','Create Branch')
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
                <a class="nav-link active" href="{{url('backend/branches/index')}}">Branches</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="{{url('backend/staff/index')}}">Staff</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="{{url('backend/dropDowns/regions/index')}}">Dropdowns</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
            </li>
        </ul>
    </div>
    <div class="card-header">
        <h3>Add New Branch</h3>
    </div>

    <div class="col-md-6 mt-3">
        <div class="card card-body">
            <form method="post">
                @include("helpers.error_loop")
                {{csrf_field()}}
                <div class="form-group row">
                    <label for="office_name" class="col-3 col-form-label">Region *</label>
                    <div class="col-12">
                        <select class="form-control" name="region_id">
                            @foreach($regions as $region)
                                <option value="{{$region->id}}">{{$region->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="branchName">Branch Name</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter Branch Name" name="name"
                           value="{{old('name')}}">
                </div>
                <div class="form-group">
                    <label for="opendingDate">Opening Date</label>
                    <input type="date" class="form-control " id="opendingDate" placeholder="Enter Branch Opending date"
                           name="openingDate" value="{{old('openingDate')}}">
                </div>
                <div class="form-group">
                    <label for="officeAddress">Office Address</label>
                    <input type="text" class="form-control" id="officeAddress" placeholder="Enter Office Address"
                           name="address" value="{{old('address')}}">
                </div>
                <div class="form-group">
                    <label for="city">City</label>
                    <input type="text" class="form-control" id="city" placeholder="Enter City Name" name="city"
                           value="{{old('city')}}">
                </div>
                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="text" class="form-control" id="phone" placeholder="Enter Phone Number" name="phone"
                           value="{{old('phone')}}">
                </div>
                <div class="form-group">
                    <label for="manager">Branch Manager</label>
                    <input type="text" class="form-control" id="manager" placeholder="Enter Branch Manager Name"
                           name="manager" value="{{old('manager')}}">
                </div>
                <div class="row justify-content-end no-gutters">
                    <button type="submit" class="btn btn-primary  mr-3">Create</button>
                    <button type="reset" class="btn btn-warning ">Cancle</button>
                </div>
            </form>
        </div>
    </div>
@endsection
