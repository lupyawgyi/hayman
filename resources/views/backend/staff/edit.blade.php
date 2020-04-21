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

    <div class="container my-5">
        <div class="col-md-6 offset-md-3">
            <div class="card card-body">
                <form method="post">
                    @include("helpers.error_loop")
                    {{csrf_field()}}
                    <legend class="text-center text-info mb-2">Update Branch</legend>
                    <div class="form-group">
                        <label for="manager">Staff Name</label>
                        <input type="text" class="form-control" id="fullName" placeholder="Enter Branch Manager Name"
                               name="fullName" value="{{$staff->fullName}}">
                    </div>
                    <div class="form-group row">
                        <label for="position" class="col-3 col-form-label">Position *</label>
                        <div class="col-12">
                            <select class="form-control" name="position_id" >
                                @foreach($positions as $position)
                                    <option value="{{$position->id}}"
                                    {{$staff->position_id == $position->id ? "selected" : ""}}
                                    >{{$position->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="office_name" class="col-3 col-form-label">Branch *</label>
                        <div class="col-12">
                            <select class="form-control" name="branch_id" >
                                @foreach($branches as $branch)
                                    <option value="{{$branch->id}}"
                                        {{$staff->branch_id == $branch->id ? "selected" : ""}}
                                    >{{$branch->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="justify-content-end no-gutters float-left">
                        <button type="submit" class="btn btn-primary  mr-3">Update</button>
                        <a class="btn btn-warning" href="{{url('/branches/'.$staff->id.'/show')}}"
                           role="button">Back</a>

                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
