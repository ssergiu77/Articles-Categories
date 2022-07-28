
@extends('layouts.app')

@section('content')
<div class="header pb-8 d-flex align-items-center" style="background-image: url(../argon/img/theme/profile-cover.jpg); background-size: cover; background-position: center top;">
    <span class="mask bg-gradient-default opacity-8"></span>
</div> 

<div class="container">
    @if (session('status'))
        <div class="alert alert-success mt-5">
            {{ session('status') }}
        </div>
    @endif
    <div class="row d-flex justify-content-center">
        <div class="col-md-12 mb-5 mt-5">
           <div class="d-flex justify-content-between align-items-center">
                <h2>Categories</h2>
                <div>
                    <a class="btn btn-warning m-1" href="{{ url('dashboard/categories/create') }}">Create new category</a>
                </div>
           </div>
            <hr>
            <div class="d-flex justify-content-center">
                @foreach($categories as $category)
                    <div class="card m-3" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">Category: {{ $category->category_name }}</h5>
                            <div class="d-flex justify-content-between align-items-center">
                                <h>Total products: {{ $category->articles->count() }}</h>
                                <a class="btn btn-sm btn-warning" href="{{ route('products.category', $category->category_name) }}">See articles</a>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mt-4">
                                <a href="{{ route('edit.category', $category->id) }}" class="btn btn-dark">Edit</a>
                                <a href="{{ route('destroy.category', $category->id) }}" class="btn btn-danger">Delete</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
