@extends('layout.master')
@section('title','BranchCreate')
@section('content')

    <div class="container my-5">
        <div class="col-md-6 offset-md-3">
            <div class="card card-body">
                <form method="post">
                    @include("helpers.error_loop")
                    {{csrf_field()}}
                    <legend class="text-center text-info mb-2">Edit Company Detail</legend>
                    <div class="form-group">
                        <label for="companyName">Company Name</label>
                        <input type="text" class="form-control" id="companyName" placeholder="Enter Company Name"
                               name="companyName" value="{{$company->companyName}}">
                    </div>
                    <div class="form-group">
                        <label for="firstPerson">Contact Person One</label>
                        <input type="text" class="form-control " id="firstPerson"
                               placeholder="Enter Contact Person Name" name="personOneName"
                               value="{{$company->personOneName}}">
                    </div>
                    <div class="form-group">
                        <label for="firstPhone">Phone Number</label>
                        <input type="text" class="form-control" id="firstPhone" placeholder="Enter Phone Number"
                               name="phoneOne" value="{{$company->phoneOne}}">
                    </div>
                    <div class="form-group">
                        <label for="secondPerson">Contact Person Two</label>
                        <input type="text" class="form-control " id="firstPerson"
                               placeholder="Enter Contact Person Name" name="personTwoName"
                               value="{{$company->personTwoName}}">
                    </div>
                    <div class="form-group">
                        <label for="secondPhone">Phone Number</label>
                        <input type="text" class="form-control" id="secondPhone" placeholder="Enter Phone Number"
                               name="phoneTwo" value="{{$company->phoneTwo}}">
                    </div>
                    <div class="form-group">
                        <label for="thirdPerson">Contact Person Three</label>
                        <input type="text" class="form-control " id="thirdPerson"
                               placeholder="Enter Contact Person Name" name="personThreeName"
                               value="{{$company->personThreeName}}">
                    </div>
                    <div class="form-group">
                        <label for="thirdPhone">Phone Number</label>
                        <input type="text" class="form-control" id="thirdPhone" placeholder="Enter Phone Number"
                               name="phoneThree" value="{{$company->phoneThree}}">
                    </div>
                    <div class="form-group">
                        <label for="website">Website Address</label>
                        <input type="text" class="form-control" id="website" placeholder="Enter Company Website Address"
                               name="website" value="{{$company->website}}">
                    </div>
                    <div class="form-group">
                        <label for="address">Company Address</label>
                        <input type="text" class="form-control" id="address" placeholder="Ender Company Address Detail"
                               name="address" value="{{$company->address}}">
                    </div>
                    <div class="row justify-content-end no-gutters">
                        <button type="submit" class="btn btn-primary  mr-3">Edit</button>
                        <button type="reset" class="btn btn-warning ">Cancle</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
