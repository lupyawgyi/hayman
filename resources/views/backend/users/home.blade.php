@extends('layouts.master')
@section('title','Login')
@section('content')
    @include("helpers.error_loop")
    @if(session('status'))
        @include("helpers.session")
    @endif
    <div class="container-fluid">
        <h1>I am Home</h1>
    </div>
@endsection
