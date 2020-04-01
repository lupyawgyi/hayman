@extends('layouts.master')

@section('title','Create Role')

@section('content')
    <div class="container-fluid mt-3">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link " href="{{url('backend/users/index')}}">Users</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="{{url('backend/roles/index')}}">Roles</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{url('backend/permissions/index')}}">Permissions</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="{{url('backend/branches/index')}}">Branches</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
            </li>
        </ul>
    </div>
    {{--    <div class="container my-5">--}}
    <div class="card-header">
        <h3>Edit Role</h3>
    </div>
    <div class="col-md-4 ml-0 mt-3">
        <div class="card card-body">
            <form method="post">
                @include("helpers.error_loop")
                {{csrf_field()}}
                <div class="form-group">
                    <label for="userName">Role Name</label>
                    <input type="text" class="form-control" placeholder="Enter Role Name" name="name"
                           value="{{$role->name}}">
                </div>
                <div class="form-group">
                    <label for="department">Description</label>
                    <input type="text" class="form-control" placeholder="description" name="description"
                           value="{{$role->description}}">
                </div>
                <div class="form-group">
                    @foreach($permissions as $permission)
                        <input type="checkbox" multiple="multiple" name="permission[]" value="{{$permission->id}}"
                               @if(in_array($permission->id,$selectedPermissions))
                               checked="checked"
                            @endif
                        >&nbsp &nbsp{{$permission->name}}<br/>
                    @endforeach
                </div>
                <div class="row justify-content-end no-gutters">
                    <button type="submit" class="btn btn-primary  mr-3">Update</button>
                    <a href="{{url('backend/roles/index')}}" class="btn btn-warning">Cancel</a>
                </div>
            </form>
        </div>
    </div>
    {{--    </div>--}}
@endsection

