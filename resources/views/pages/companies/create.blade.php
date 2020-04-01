@extends('layout.master')
@section('title','Company Create')
@section('content')

    <div class="container my-5">
        <div class="col-md-6 offset-md-3">
            <div class="card card-body">
                <form method="post">
                    @include("helpers.error_loop")
                    {{csrf_field()}}
                    <legend class="text-center text-info mb-2">Company Detail</legend>
                    <div class="form-group">
                        <label for="companyName">Company Name*</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter Company Name" name="name"
                               required>
                    </div>
                    <div class="form-group">
                        <label for="firstPerson">Contact Person One*</label>
                        <input type="text" class="form-control " id="firstPerson"
                               placeholder="Enter Contact Person Name" name="contactOne" required>
                    </div>
                    <div class="form-group">
                        <label for="firstPhone">Phone Number*</label>
                        <input type="text" class="form-control" id="firstPhone" placeholder="Enter Phone Number"
                               name="phoneOne" required>
                    </div>
                    <div class="form-group">
                        <label for="secondPerson">Contact Person Two</label>
                        <input type="text" class="form-control " id="firstPerson"
                               placeholder="Enter Contact Person Name" name="contactTwo">
                    </div>
                    <div class="form-group">
                        <label for="secondPhone">Phone Number</label>
                        <input type="text" class="form-control" id="secondPhone" placeholder="Enter Phone Number"
                               name="phoneTwo">
                    </div>
                    <div class="form-group">
                        <label for="website">Website Address</label>
                        <input type="text" class="form-control" id="website" placeholder="Enter Company Website Address"
                               name="website">
                    </div>
                    <div class="form-group">
                        <label for="address">Company Address*</label>
                        <input type="text" class="form-control" id="address" placeholder="Ender Company Address Detail"
                               name="address">
                    </div>
                    <div class="row justify-content-end no-gutters">
                        <button type="submit" class="btn btn-primary  mr-3">Add</button>
                        <button type="reset" class="btn btn-warning ">Cancle</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
