@extends('layouts.master')

@section('title','Create SMS')
@section('content')

    <div class="container my-5">
        <div class="col-md-6 offset-md-3">
            <div class="card card-body">
                <form method="post">
                    @include("helpers.error_loop")
                    {{csrf_field()}}
                    <legend class="text-center text-info mb-2">Company Detail</legend>
                    <div class="form-group">
                        <label for="companyName">Phone Number*</label>
                        <input type="text" class="form-control" id="number" placeholder="Phone Number" name="number"
                               required>
                    </div>
                    <div class="form-group">
                        <label for="firstPerson">Client ID*</label>
                        <input type="text" class="form-control " id="firstPerson"
                               placeholder="Enter Client ID" name="clientID" required>
                    </div>
                    <div class="form-group">
                        <label for="firstPerson">Branch Manager email*</label>
                        <input type="text" class="form-control " id="firstPerson"
                               placeholder="Enter Contact Person Name" name="email" required>
                    </div>

                    <div class="form-group">
                        <label for="firstPerson">Amount*</label>
                        <input type="text" class="form-control " id="amount"
                               placeholder="Enter Contact Person Name" name="amount" required>
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
