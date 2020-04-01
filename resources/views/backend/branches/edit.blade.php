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
                <a class="nav-link active" href="{{url('backend/branches/index')}}">Branches</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
            </li>
        </ul>
    </div>

    <div class="container my-5">
        <div class="col-md-6 offset-md-3">
            <div class="card card-body">
                <form method="post">
                    @include("helpers.error_loop")
                    {{csrf_field()}}
                    <legend class="text-center text-info mb-2">Update Branch</legend>
                    <div class="form-group">
                        <label for="branchName">Branch Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter Branch Name" name="name"
                               value="{{$branch->name}}">
                    </div>
                    <div class="form-group">
                        <label for="opendingDate">Opening Date</label>
                        <input type="date" class="form-control " id="date" placeholder="Enter Branch Opending date"
                               name="openingDate" value="{{$branch->openingDate}}">
                    </div>
                    <div class="form-group">
                        <label for="officeAddress">Office Address</label>
                        <input type="text" class="form-control" id="address" placeholder="Enter Office Address"
                               name="address" value="{{$branch->address}}">
                    </div>
                    <div class="form-group">
                        <label for="city">City</label>
                        <input type="text" class="form-control" id="city" placeholder="Enter City Name" name="city"
                               value="{{$branch->city}}">
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="text" class="form-control" id="phone" placeholder="Enter Phone Number" name="phone"
                               value="{{$branch->phone}}">
                    </div>
                    <div class="form-group">
                        <label for="manager">Branch Manager</label>
                        <input type="text" class="form-control" id="manager" placeholder="Enter Branch Manager Name"
                               name="manager" value="{{$branch->manager}}">
                    </div>
                    <div class="justify-content-end no-gutters float-left">
                        <button type="submit" class="btn btn-primary  mr-3">Update</button>
                        <a class="btn btn-warning" href="{{url('/branches/'.$branch->id.'/show')}}"
                           role="button">Back</a>

                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
