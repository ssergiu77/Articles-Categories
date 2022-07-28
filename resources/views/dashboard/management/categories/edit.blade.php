@extends('layouts.app')
        
@section('content')
<div class="header pb-8 d-flex align-items-center" style="background-image: url(../argon/img/theme/profile-cover.jpg); background-size: cover; background-position: center top;">
    <span class="mask bg-gradient-default opacity-8"></span>
</div> 
<div class="container mt-5">
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div class="row d-flex justify-content-center">
        <div class="col-md-12">
            <div class="d-flex justify-content-between align-items-center">
                <h2>Edit Category</h2><br/>
                <a class="btn btn-dark" href="{{ url('dashboard/categories') }}">Back to categories</a>
            </div>
            <hr>
            <form method="post" action="{{ route('update.category', $category->id) }}">
                @csrf
                <div class="mb-3">
                    <label for="category_name" class="form-label">Category name <span class="text-danger">*</span></label>
                    <input type="text" name="category_name" placeholder="{{ $category->category_name }}" class="form-control" id="category_name">
                </div>
                <button type="submit" class="btn btn-warning">Edit category</button>
            </form>
        </div>
    </div>
@endsection