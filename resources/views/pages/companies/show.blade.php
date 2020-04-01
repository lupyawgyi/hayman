@extends('layout.showdetail')

@section('content')


    <div class="mt-0 col-md-6 offset-md-3 my-2 ">
        @if(session('status'))
            <p class="alert alert-success">{{session('status')}}</p>
        @endif
        <h1>Company Detail</h1>
        <div>
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
                    <td>{{$company->companyName}}</td>
                </tr>
                <tr>
                    <td>Contact Person</td>
                    <td>{{$company->personOneName}}</td>
                </tr>
                <tr>
                    <td>Contact Person Phone Number</td>
                    <td>{{$company->phoneOne}}</td>
                </tr>
                <tr>
                    <td>Contact Person</td>
                    <td>{{$company->personTwoName}}</td>
                </tr>
                <tr>
                    <td>Contact Person Phone Number</td>
                    <td>{{$company->phoneTwo}}</td>
                </tr>
                <tr>
                    <td>Contact Person</td>
                    <td>{{$company->personThreeName}}</td>
                </tr>
                <tr>
                    <td>Contact Person Phone Number</td>
                    <td>{{$company->phoneThree}}</td>
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
        <div>
            <a href="{{url('/company/index')}}">
                <button class="btn btn-secondary">Back</button>
            </a>
            <a href="{{url('/company/'.$company->id.'/edit')}}">
                <button class="btn btn-warning text-white">Edit</button>
            </a>
            <a href="{{url('/company/'.$company->id.'/delete')}}">
                <button class="btn btn-danger text-white">Delete</button>
            </a>

        </div>
    </div>

@endsection
