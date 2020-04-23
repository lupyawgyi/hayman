@extends('layouts.master')

@section('title','Create Regions')
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
    <div class="card-header">
        <h3>Add New Phone Number</h3>
    </div>

    <div class="col-md-4 mt-4">
        <div class="card card-body">
            <form method="post">
                @include("helpers.error_loop")
                {{csrf_field()}}
                <div class="form-group">
                    <label for="branchName">Phone Number*</label>
                    <input type="text" class="form-control " id="phoneNumber" placeholder="Enter Phone Number" name="phoneNumber"
                           value="{{old('phoneNumber')}}" required>
                </div>
                <div class="form-group row">
                    <label for="office_name" class="col-3 col-form-label">Company *</label>
                    <div class="col-12">
                        <select class="form-control" name="company_id">
                            @foreach($companies as $company)
                                <option value="{{$company->id}}">{{$company->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row justify-content-end no-gutters">
                    <button type="submit" class="btn btn-primary  mr-3">Create</button>
                    <a href="{{ URL::previous() }}" class="btn btn-warning">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@endsection
