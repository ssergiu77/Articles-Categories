@extends('layouts.app')

@section('content')
<div class="header pb-8 d-flex align-items-center" style="background-image: url(../argon/img/theme/profile-cover.jpg); background-size: cover; background-position: center top;">
    <span class="mask bg-gradient-default opacity-8"></span>
</div> 
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 mb-5">
            <h2>Management Settings</h2>
            <hr>
            <div>
                <a class="btn btn-dark text-decoration-none m-1" href="{{ url('dashboard/categories') }}">Categories</a>
                <a class="btn btn-dark text-decoration-none m-1" href="{{ url('dashboard/articles') }}">Articles</a>
            </div>
        </div>
    </div>
</div>
@endsection
