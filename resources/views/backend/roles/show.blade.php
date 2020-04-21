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
    {{--    <div class="container my-5">--}}
    <div class="card-header">
        <h3>Role</h3>
    </div>
    <div class="col-md-4 ml-0 mt-3">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead class="bg-secondary text-white">
            <th>Name</th>
            <th>Detail</th>
            </thead>
            <tbody>
            <tr>
                <td>Role id</td>
                <td>{{$role->id}}</td>
            </tr>
            <tr>
                <td>Name</td>
                <td>{{$role->name}}</td>
            </tr>
            <tr>
                <td>Description</td>
                <td>{{$role->description}}</td>
            </tr>
            </tbody>
        </table>

    </div>
    <div class="ml-3 mt-3">
        <a href="{{ URL::previous() }}">
            <button class="btn btn-sm btn-default"><span class="fa fa-ban" style="font-size:15px"></span>&nbsp;Back
            </button>
        </a>
        <a href="{{url('backend/roles/'.$role->id.'/edit')}}">
            <button class="btn btn-sm btn-warning"><i class="fa fa-user-circle"></i>&nbsp;Edit</button>
        </a>
        <a href="{{url('backend/roles/'.$role->id.'/delete')}}">
            <button class="btn btn-sm btn-danger"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp;Delete
            </button>
        </a>
        @if($role->deleted_at != null)
            <a href="{{url('backend/roles/'.$role->id.'/restore')}}">
                <button class="btn btn-sm btn-success"><i class="fa fa-mendeley" aria-hidden="true"></i>&nbsp Enable
                </button>
            </a>
        @else
            <a href="{{url('backend/roles/'.$role->id.'/soft')}}">
                <button class="btn btn-sm btn-secondary"><i class="fa fa-mendeley" aria-hidden="true"></i>&nbsp Disable
                </button>
            </a>

        @endif
    </div>
    {{--    </div>--}}
@endsection
