@extends('layouts.master')
@section('title','UserCreate')
@section('content')
    <div class="container-fluid mt-3">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" href="{{url("/pages/companies/index")}}">Companies</a>
            </li>
        </ul>
    </div>


    <div class="card-header">
        <h3>Company</h3>
    </div>
    <div class="col-md-4 ml-0 mt-3">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead class="bg-secondary text-white">
                <th>Name</th>
                <th>Detail</th>
                </thead>
                <tbody>
                <tr>
                    <td>Company ID</td>
                    <td>{{$company->id}}</td>
                </tr>
                <tr>
                    <td>Company Name</td>
                    <td>{{$company->name}}</td>
                </tr>
                <tr>
                    <td>Contact Person</td>
                    <td>{{$company->contactOne}}</td>
                </tr>
                <tr>
                    <td>Contact Person Phone Number</td>
                    <td>{{$company->phoneOne}}</td>
                </tr>
                <tr>
                    <td>Contact Person</td>
                    <td>{{$company->contactTwo}}</td>
                </tr>
                <tr>
                    <td>Contact Person Phone Number</td>
                    <td>{{$company->phoneTwo}}</td>
                </tr>
                <tr>
                    <td>Company Website</td>
                    <td><a href="#">{{$company->website}}</a></td>
                </tr>
                <tr>
                    <td>Company Address</td>
                    <td>{{$company->address}}</td>
                </tr>

                </tbody>

            </table>
        </div>
    <div class="ml-3 mt-3">
        <a href="{{ URL::previous() }}">
            <button class="btn btn-sm btn-default"><span class="fa fa-ban" style="font-size:15px"></span>&nbsp;Back
            </button>
        </a>
        <a href="{{url('pages/companies/'.$company->id.'/edit')}}">
            <button class="btn btn-sm btn-warning"><i class="fa fa-user-circle"></i>&nbsp;Edit</button>
        </a>
        <a href="{{url('pages/companies/'.$company->id.'/delete')}}">
            <button class="btn btn-sm btn-danger"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp;Delete
            </button>
        </a>
    </div>

@endsection
