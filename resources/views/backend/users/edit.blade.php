@extends('layouts.master')
@section('title','User Edit')

@section('content')
    {{--body--}}
    @include("helpers.error_loop")
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
                <a class="nav-link " href="{{url('backend/dropDowns/regions/index')}}">Dropdowns</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled " href="#" tabindex="-1" aria-disabled="true">Disabled</a>
            </li>
        </ul>
    </div>
    <div class="container-fluid">
        <div class="card-header">
            <h3>Edit User</h3>
        </div>
        <div class="col-md-4 mt-3">

            <form method="post">

                {{csrf_field()}}
                <div class="form-group row mt-4">
                    <label for="name" class="col-3 col-form-label">Username *</label>
                    <div class="col-8 ">
                        <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="full_name" class="col-3 col-form-label">Full Name *</label>
                    <div class="col-8">
                        <input type="text" class="form-control" id="full_name" name="full_name"
                               value="{{$user->full_name}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-3 col-form-label">Email *</label>
                    <div class="col-8">
                        <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password" class="col-3 col-form-label">Password *</label>

                    <div class="col-8">
                        <input type="password" class="form-control" name="password" value="">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password" class="col-3 col-form-label">Repeat Password*</label>
                    <div class="col-8">
                        <input type="password" class="form-control" name="password_confirmation" value="">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="office_name" class="col-3 col-form-label">Office Name *</label>
                    <div class="col-8">
                        <select class="form-control" name="office_id">
                            @foreach($branches as $branch)
                                <option value="{{$branch->id}}"
                                    {{$user->office_id == $branch->id ? "selected" :""}} >{{$branch->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    @foreach($roles as $role)
                        <input type="checkbox" multiple="multiple" name="role[]" value="{{$role->id}}"
                               @if(in_array($role->id,$selectedRoles))
                               checked="checked"
                            @endif
                        >&nbsp &nbsp{{$role->name}}<br/>
                    @endforeach
                </div>

                <div class="row no-gutters">

                    <button type="submit" class="btn btn-primary  mr-3">Update</button>
                    <a href="{{ URL::previous() }}">
                        <button class="btn btn-warning"><span class="fa fa-ban" style="font-size:15px"></span>&nbsp;Cancel
                        </button>
                    </a>
                </div>
            </form>

        </div>

    </div>
@endsection
