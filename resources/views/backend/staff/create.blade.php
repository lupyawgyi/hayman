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
                <a class="nav-link" href="{{url('backend/branches/index')}}">Branches</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="{{url('backend/staff/index')}}">Staff</a>
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
        <h3>Add New Staff</h3>
    </div>

    <div class="col-md-6 mt-3">
        <div class="card card-body">
            <form method="post">
                @include("helpers.error_loop")
                {{csrf_field()}}
                <div class="form-group">
                    <label for="branchName">Full Name</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter Full Name" name="fullName"
                           value="{{old('fullName')}}">
                </div>
                <div class="form-group row">
                    <label for="office_name" class="col-3 col-form-label">Position *</label>
                    <div class="col-12">
                        <select class="form-control" name="position_id">
                            @foreach($positions as $position)
                                <option value="{{$position->id}}">{{$position->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="office_name" class="col-3 col-form-label">Branch *</label>
                    <div class="col-12">
                        <select class="form-control" name="branch_id">
                            @foreach($branches as $branch)
                                <option value="{{$branch->id}}">{{$branch->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row justify-content-end no-gutters">
                    <button type="submit" class="btn btn-primary  mr-3">Create</button>
                    <button type="reset" class="btn btn-warning ">Cancle</button>
                </div>
            </form>
        </div>
    </div>
@endsection
