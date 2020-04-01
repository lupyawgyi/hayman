@extends('layouts.master')
@section('title','UserCreate')
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
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
            </li>
        </ul>
    </div>
    <div class="col-6  pt-3">
        <h3 class="text-black">Create User</h3>
    </div>
    <div class="container-fluid">
        <div class="p-3 card card-body">
            <div class="container-fluid bg-light">
                <div class="col-6 pt-3 pb-3 pr">
                    @include("helpers.error_loop")
                    <form method="post">

                        {{csrf_field()}}
                        <div class="form-group row mt-4">
                            <label for="name" class="col-3 col-form-label">Username *</label>
                            <div class="col-8 ">
                                <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="full_name" class="col-3 col-form-label">Full Name *</label>
                            <div class="col-8">
                                <input type="text" class="form-control" id="full_name" name="full_name"
                                       value="{{old('full_name')}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-3 col-form-label">Email *</label>
                            <div class="col-8">
                                <input type="email" class="form-control" id="email" name="email"
                                       value="{{old('email')}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-3 col-form-label">Password *</label>
                            <div class="col-8">
                                <input type="password" class="form-control" name="password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-3 col-form-label">Repeat Password*</label>
                            <div class="col-8">
                                <input type="password" class="form-control" name="password_confirmation">
                            </div>
                        </div>
                        <div>

                        </div>
                        {{--                    <div class="form-group row">--}}
                        {{--                        <label for="office_name" class="col-3 col-form-label">Office Name *</label>--}}
                        {{--                        <div class="col-8">--}}
                        {{--                            <input type="text" class="form-control" id="office_name" name="office_id" value="{{old('office_id')}}">--}}
                        {{--                        </div>--}}
                        {{--                    </div>--}}
                        <div class="form-group row">
                            <label for="office_name" class="col-3 col-form-label">Office Name *</label>
                            <div class="col-8">
                                <select class="form-control" name="office_id">
                                    @foreach($branches as $branch)
                                        <option value="{{$branch->id}}">{{$branch->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row no-gutters">
                            <button type="submit" class="btn btn-primary  mr-3">Create</button>
                            <a href="{{url('backend/users/index')}}" class="btn btn-warning">Cancel</a></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
