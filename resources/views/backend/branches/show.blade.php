@extends('layouts.master')

@section('title','Show Branch')

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
    {{--<div class="mt-0 col-md-6 offset-md-3 my-2 ">--}}
    <div class="card-header">
        <h3>Role</h3>
    </div>
    <div class="col-md-6 mt-3">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead class="bg-secondary text-white">
            <th>Name</th>
            <th>Detail</th>
            </thead>
            <tbody>
            <tr>
                <td>Region</td>
                <td>{{$branch->region->name}}</td>
            </tr>
            <tr>
                <td>Branch id</td>
                <td>{{$branch->id}}</td>
            </tr>
            <tr>
                <td>Name</td>
                <td>{{$branch->name}}</td>
            </tr>
            <tr>
                <td>Opening Date</td>
                <td>{{$branch->openingDate}}</td>
            </tr>
            <tr>
                <td>Office Address</td>
                <td>{{$branch->address}}</td>
            </tr>
            <tr>
                <td>City</td>
                <td>{{$branch->city}}</td>
            </tr>
            <tr>
                <td>Phone</td>
                <td>{{$branch->phone}}</td>
            </tr>
            <tr>
                <td>Branch Manager Name</td>
                <td>{{$branch->manager}}</td>
            </tr>

            </tbody>

        </table>
    </div>
    <div class=" mt-3 ml-3">
        <a href="{{ URL::previous() }}">
            <button class="btn btn-sm btn-default"><span class="fa fa-ban" style="font-size:15px"></span>&nbsp;Back
            </button>
        </a>
        <a href="{{url('backend/branches/'.$branch->id.'/edit')}}">
            <button class="btn btn-sm btn-warning"><i class="fa fa-user-circle"></i>&nbsp;Edit</button>
        </a>
        <a href="{{url('backend/branches/'.$branch->id.'/delete')}}">
            <button class="btn btn-sm btn-danger"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp;Delete
            </button>
        </a>
    </div>
    {{--</div>--}}

@endsection
