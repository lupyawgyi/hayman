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
                    <legend class="text-center text-info mb-2">Update Region</legend>
                    <div class="form-group">
                        <label for="regionName">Region Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter Description Name" name="name"
                               value="{{$region->name}}">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" class="form-control " id="description" placeholder="Enter Region Description"
                               name="description" value="{{$region->description}}">
                    </div>
                    <div class="justify-content-end no-gutters float-left">
                        <button type="submit" class="btn btn-primary  mr-3">Update</button>
                        <a class="btn btn-warning" href="{{ URL::previous() }}"
                           role="button">Back</a>

                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
