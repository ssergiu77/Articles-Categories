@extends('layouts.app')

@section('content')
<div class="header pb-8 d-flex align-items-center" style="background-image: url(../argon/img/theme/profile-cover.jpg); background-size: cover; background-position: center top;">
    <span class="mask bg-gradient-default opacity-8"></span>
</div> 
<div class="container mt-5">
    <div class="row d-flex justify-content-center">
        <div class="col-md-12 mb-5">
            <div> 
                <h4>Filter by category</h4>
                @foreach ($categories as $category)
                    <a class="btn btn-dark text-decoration-none m-1" href="{{ route('products.category', $category->category_name) }}">{{$category->category_name}}</a>
                @endforeach
            </div>
        </div>
        <div class="col-md-12">
                <div class="d-flex justify-content-between align-items-center">
                    <h2>Articles</h2>   
                    <a class="btn btn-warning m-1" href="{{ url('dashboard/articles/create') }}">Create new article</a>
                </div>
            <hr>
            <div class="row d-flex justify-content-center">
                @foreach ($articles as $article)
                    <div class="card m-2" style="width: 18rem;">
                        <img width=200 height=200 src="{{ Storage::url($article->image) }}" class="card-img-top" alt="">
                        <div class="card-body">
                            <h5 class="card-title"><a class="text-decoration-none" href="{{ url('dashboard/articles', $article->id) }}">{{$article->title}}</a></h5>
                            <p class="card-text">{{$article->description}}.</p>
                            <p class="card-text"><small class="text-muted">Author: {{$article->author}} <br> Category: {{$article->category->category_name}} <br> Status: {{$article->status}}</small></p>
                            <div class="d-flex justify-content-between">
                                <a class="btn btn-dark" href="{{ route('edit.article', $article->id) }}">Edit</a>
                                <a class="btn btn-danger" href="{{ route('destroy.article', $article->id) }}">Delete</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
