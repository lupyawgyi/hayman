@extends('layout.master')

@section('content')
    <div class="container-fluid mt-3">
        @if(session('status'))
            <p class="alert alert-success">{{session('status')}}</p>
        @endif
        <div class="mb-3">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/home')}}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/branch/index')}}">Branchs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/user')}}">Users</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/staff/index')}}">Staff</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/phone/index')}}">Phones</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{url('/company/index')}}">Company</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">Disabled</a>
                </li>
            </ul>
        </div>
        {{--<div class="mb-3">--}}
        {{--<ul class="nav nav-tabs">--}}
        {{--<li class="nav-item">--}}
        {{--<a class="nav-link active" href="{{url('/index')}}">Company</a>--}}
        {{--</li>--}}
        {{--</ul>--}}
        {{--</div>--}}
        <div class="mt-2 mb-4">
            <h2>Company</h2>
            <a href="{{url('/company/create')}}" class="btn btn-primary btn-sm" role="button" aria-pressed="true">Create
                new Company</a>
        </div>
        <div>

            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                <tr>
                    <th>Company Name</th>
                    <th>Person One Name</th>
                    <th>Phone Number</th>
                    <th>Person Two Name</th>
                    <th>Phone Number</th>
                    <th>Person Three Name</th>
                    <th>Phone Number</th>
                    <th>Website</th>
                    <th>Address</th>
                    <th class="text-center">View</th>
                </tr>
                </thead>
                <tbody>
                @foreach($companies as $company)
                    <tr>
                        <td>{{$company->companyName}}</td>
                        <td>{{$company->personOneName}}</td>
                        <td>{{$company->phoneOne}}</td>
                        <td>{{$company->personTwoName}}</td>
                        <td>{{$company->phoneTwo}}</td>
                        <td>{{$company->personThreeName}}</td>
                        <td>{{$company->phoneThree}}</td>
                        <td>{{$company->website}}</td>
                        <td>{{$company->address}}</td>
                        <td class="text-center"><a href="{{url('/company/'.$company->id.'/show')}}">
                                <button type="button" class="btn btn-info btn-sm">View</button>
                            </a></td>
                    </tr>
                @endforeach

                </tbody>
                <tfoot>
                <tr>
                    <th>Company Name</th>
                    <th>Person One Name</th>
                    <th>Phone Number</th>
                    <th>Person Two Name</th>
                    <th>Phone Number</th>
                    <th>Person Three Name</th>
                    <th>Phone Number</th>
                    <th>Website</th>
                    <th>Address</th>
                    <th class="text-center">View</th>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>

    {{--<div class="container-fluid mt-3">--}}
    {{--<ul class="nav nav-tabs " id="myTab" role="tablist">--}}
    {{--<li class="nav-item">--}}
    {{--<a class="nav-link active" id="branch-tab" data-toggle="tab" href="#branch" role="tab" aria-controls="branch" aria-selected="true">Branches</a>--}}
    {{--</li>--}}
    {{--<li class="nav-item">--}}
    {{--<a class="nav-link" id="user-tab" data-toggle="tab" href="#user" role="tab" aria-controls="user" aria-selected="false">Users</a>--}}
    {{--</li>--}}
    {{--<li class="nav-item">--}}
    {{--<a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Contact</a>--}}
    {{--</li>--}}
    {{--</ul>--}}
    {{--<div class="tab-content" id="myTabContent">--}}
    {{--<div class="tab-pane fade show active" id="branch" role="tabpanel" aria-labelledby="branch-tab">--}}

    {{--<div class="pb-2 mb-4">--}}
    {{--<h1>Branches</h1>--}}
    {{--<a class="btn btn-primary pr-1 pr-2" href="#" role="button">Create Branch</a>--}}
    {{--</div>--}}
    {{--<div>--}}
    {{--@include('admin.dataTable.test')--}}

    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="tab-pane fade" id="user" role="tabpanel" aria-labelledby="user-tab">--}}
    {{--<div class="pb-2 mb-4">--}}
    {{--<h1>Users</h1>--}}
    {{--<a class="btn btn-primary pr-1 pr-2" href="#" role="button">Create Branch</a>--}}
    {{--</div>--}}
    {{--<div>--}}
    {{--@include('admin.dataTable.test2')--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">Contact</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<nav class="navbar navbar-expand-md m-2 bg-primary border border-white p-0" >--}}
    {{--@if(Auth::check())--}}
    {{--<div class="collapse navbar-collapse" id="navbarNavDropdown">--}}
    {{--<ul class="navbar-nav text-white" >--}}
    {{--<li class="nav-item active">--}}
    {{--<a class="nav-link" href="#">Staff</a>--}}
    {{--</li>--}}
    {{--<li class="nav-item">--}}
    {{--<a class="nav-link" href="#">Features</a>--}}
    {{--</li>--}}
    {{--<li class="nav-item">--}}
    {{--<a class="nav-link" href="#">Pricing</a>--}}
    {{--</li>--}}
    {{--</ul>--}}
    {{--</div>--}}
    {{--@endif--}}
    {{--</nav>--}}

@endsection
