@extends('layouts.master')
@section('title','Change Password')

@section('content')
    {{--body--}}
    @include("helpers.error_loop")
    <div class="col-6  pt-5 text-center offset-3">
        <h3 class="text-info">Edit Password</h3>
    </div>
    <div class="p-3">
        <div class="container-fluid bg-light">
            <div class="col-12 pt-3 pb-3 pr">
                <form method="post">

                    {{csrf_field()}}
                    <div class="container col-4 ">
                        <div class="form-group row">
                            <label for="password" class="col-4 col-form-label">Password *</label>

                            <div class="col-8">
                                <input type="password" class="form-control" name="password" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-4 col-form-label">Repeat Password*</label>
                            <div class="col-8">
                                <input type="password" class="form-control" name="password_confirmation" value="">
                            </div>
                        </div>
                        <div class="row no-gutters offset-6">
                            <button type="submit" class="btn btn-primary  mr-3">Change</button>
                            <a href="{{ URL::previous() }}" class="btn btn-warning">Cancel</a>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
