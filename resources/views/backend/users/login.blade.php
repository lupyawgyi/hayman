@extends('layouts.master')
@section('title','Login')
@section('content')
    @include("helpers.error_loop")
    <div class="container my-5">

        <div class="col-6 offset-3">
            <div class="card card-body">
                <form method="post">

                    {{csrf_field()}}
                    <legend class="text-center text-info mb-2">Login Form</legend>
                    <div class="form-group">
                        <label for="name">User Name</label>
                        <input type="text" class="form-control" id="name" placeholder="User name" name="name"
                               value="{{old('name')}}">
                        {{--                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>--}}
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Password"
                               name="password">
                    </div>
                    {{--<div class="form-group form-check">--}}
                    {{--<input type="checkbox" class="form-check-input" id="exampleCheck1">--}}
                    {{--<label class="form-check-label" for="exampleCheck1">Check me out</label>--}}
                    {{--</div>--}}
                    <div class="row no-gutters">
                        <button type="submit" class="btn btn-primary mr-3 ">Login</button>
                        <a href="{{url('/')}}" class="btn btn-warning">Cancel</a>

                    </div>
                </form>
            </div>
        </div>
    </div>
    <hr>
@endsection
