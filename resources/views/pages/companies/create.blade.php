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
        <h3>Add New Company</h3>
    </div>
    <div class="col-md-4 ml-0 mt-3">
        <div class="card card-body">
            <form method="post">
                @include("helpers.error_loop")
                {{csrf_field()}}
                <div class="form-group">
                    <label for="companyName">Company Name*</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter Company Name" name="name" value="{{old('name')}}"
                           required>
                </div>
                <div class="form-group">
                    <label for="firstPerson">Contact Person One*</label>
                    <input type="text" class="form-control " id="firstPerson"
                           placeholder="Enter Contact Person Name" name="contactOne" value="{{old('contactOne')}}" required>
                </div>
                <div class="form-group">
                    <label for="firstPhone">Phone Number*</label>
                    <input type="text" class="form-control" id="firstPhone" placeholder="Enter Phone Number"
                           name="phoneOne" value="{{old('phoneOne')}}" required>
                </div>
                <div class="form-group">
                    <label for="secondPerson">Contact Person Two</label>
                    <input type="text" class="form-control " id="firstPerson"
                           placeholder="Enter Contact Person Name" name="contactTwo" value="{{old('contactTwo')}}">
                </div>
                <div class="form-group">
                    <label for="secondPhone">Phone Number</label>
                    <input type="text" class="form-control" id="secondPhone" placeholder="Enter Phone Number"
                           name="phoneTwo" value="{{old('phoneTwo')}}">
                </div>
                <div class="form-group">
                    <label for="website">Website Address</label>
                    <input type="text" class="form-control" id="website" placeholder="Enter Company Website Address"
                           name="website" value="{{old('website')}}">
                </div>
                <div class="form-group">
                    <label for="address">Company Address*</label>
                    <input type="text" class="form-control" id="address" placeholder="Ender Company Address Detail"
                           name="address" value="{{old('address')}}">
                </div>
                <div class="row justify-content-end no-gutters">
                    <button type="submit" class="btn btn-primary  mr-3">Add</button>
                    <button type="reset" class="btn btn-warning ">Cancle</button>
                </div>
            </form>
        </div>
    </div>

@endsection
