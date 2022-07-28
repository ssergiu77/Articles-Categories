@extends('layouts.home')

@section('content')
<div class="header pb-8 d-flex align-items-center" style="background-image: url(../argon/img/theme/profile-cover.jpg); background-size: cover; background-position: center top;">
    <span class="mask bg-gradient-default opacity-8"></span>
</div> 
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-12 mb-5">
            <div class="d-flex justify-content-between align-items-center">
                <h4>Filtered by category: {{ $category_name }}</h4>
                <a class="btn btn-warning m-1" href="{{ url('dashboard/articles/create') }}">Create new article</a>
            </div>
            <div> 
                @foreach ($data['categories'] as $category)
                    @if ($category->articles->count())
                        <a class="btn btn-dark text-decoration-none m-1" href="{{ route('articles.category.user', $category->category_name) }}">{{$category->category_name}}</a>
                    @endif
                @endforeach
            </div>
            <hr>
        </div>
        <div class="col-md-8 justify-content-center">
            <div class="d-flex">
                @foreach ($data['articles'] as $article)
                    <div class="card m-2" >
                        <img width=150 height=150 src="{{ Storage::url($article->image) }}" class="card-img-top" alt="...">
                        <div class="card-body" >
                            <h5 class="card-title"><a class="text-decoration-none" href="{{ route('articles.articles.user', $article->id) }}">{{$article->title}}</a></h5>
                            <p class="card-text">{!!$article->description!!}</p>
                            <p class="card-text"><small class="text-muted">Author: {{$article->author}} <br> Category: {{$article->category_name}}</small></p>
                            @if (Auth::user()->admin)
                                <div class="d-flex justify-content-between">
                                    <a class="btn btn-dark" href="{{ route('edit.article', $article->id) }}">Edit</a>
                                    <a class="btn btn-danger" href="{{ route('destroy.category', $category->id) }}">Delete</a>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="d-flex justify-content-center">
                {{$data['articles']->links("pagination::bootstrap-4")}}
            </div>
        </div>
    </div>
</div>

@endsection
