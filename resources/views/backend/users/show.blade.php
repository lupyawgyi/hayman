@extends('layouts.master')

@section('title','Show User')

@section('content')
    <div class="container-fluid mt-3">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" href="{{url('backend/users/index')}}">Users</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="{{url('backend/roles/index')}}">Roles</a>
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

    <div class="mt-0 col-md-6 my-2 ">
        <h1>User Detail</h1>
        <div>
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead class="bg-secondary text-white">
                <th>Name</th>
                <th>Detail</th>
                </thead>
                <tbody>
                <tr>
                    <td>User id</td>
                    <td>{{$user->id}}</td>
                </tr>
                <tr>
                    <td>Username</td>
                    <td>{{$user->name}}</td>
                </tr>
                <tr>
                    <td>Full Name</td>
                    <td>{{$user->full_name}}</td>
                </tr>
                <tr>
                    <td>Branch Name</td>
                    <td>{{$user->office_id}}</td>
                </tr>
                <tr>
                    <td>Email Address</td>
                    <td>{{$user->email}}</td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td>*********************</td>
                </tr>
                <tr>
                    <td>Active (or) Not</td>
                    @if($user->deleted_at == null)
                        <td class="text-success">Active</td>
                    @else
                        <td class="text-danger">Ban</td>
                    @endif

                </tr>

                </tbody>

            </table>
        </div>
        <div>
            <a href="{{url('backend/users/index')}}">
                <button class="btn btn-secondary">Back</button>
            </a>
            <a href="{{url('backend/users/'.$user->id.'/edit')}}">
                <button class="btn btn-warning text-white">Edit</button>
            </a>
            <a data-toggle="modal" data-target="#exampleModal">
                <button class="btn btn-danger"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp;Delete
                </button>
            </a>
            @if($user->deleted_at != null)
                <a href="{{url('backend/users/'.$user->id.'/restore')}}">
                    <button class="btn  btn-success"><i class="fa fa-mendeley" aria-hidden="true"></i>&nbsp Active
                    </button>
                </a>
            @else
                <a href="{{url('backend/users/'.$user->id.'/soft')}}">
                    <button class="btn btn-secondary"><i class="fa fa-mendeley" aria-hidden="true"></i>&nbsp Ban
                    </button>
                </a>

            @endif

        </div>
    </div>
    <!-- Button trigger modal -->

    <div class="modal fade center-block" id="exampleModal" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Do you want to Delete?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure Delete?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <a href="{{url('backend/users/'.$user->id.'/delete')}}">
                        <button type="button" class="btn btn-danger">Delete</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    {{--delete modal End--}}
@endsection
