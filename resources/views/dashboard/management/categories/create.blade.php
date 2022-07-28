@extends('layouts.app')
        
@section('content')
<div class="header pb-8 d-flex align-items-center" style="background-image: url(../argon/img/theme/profile-cover.jpg); background-size: cover; background-position: center top;">
    <span class="mask bg-gradient-default opacity-8"></span>
</div> 
<link href="{{ asset('css/app.css') }}" rel="stylesheet">

<div class="container mt-5 mb-5">
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <div class="col-md-12">
        <div class="d-flex justify-content-between align-items-center">
            <h2>Create category</h2><br/>
            <a class="btn btn-dark" href="{{ url('dashboard/categories') }}">Back to categories</a>
        </div>
        <hr>
        <form method="post" action="{{ url('dashboard/categories') }}" id="form-categories">
            @csrf
            <div class="mb-3">
                <label for="category_name" class="form-label">Category name <span class="text-danger">*</span></label>
                <input type="text" name="category_name" class="form-control" id="category_name">
            </div>
            <button type="submit" class="btn btn-warning">Create category</button>
        </form>
    </div>
</div>
@section('scripts')
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#form-categories').validate({ // initialize the plugin
                rules: {
                    category_name: {
                        required: true
                    },
                }
            });
        });
    </script>
@stop
@endsection