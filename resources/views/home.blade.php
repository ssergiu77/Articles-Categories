@extends('layouts.home', ['class' => 'bg-default'])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 mb-5">
            <h2>Articles</h2>
            <hr>
            <div> 
                <h4>Filter by category</h4>
                @foreach ($categories as $category)
                    @if ($category->articles->count())
                        <a class="btn btn-dark text-decoration-none m-1" href="{{ route('articles.category.user', $category->category_name) }}">{{$category->category_name}}</a>
                    @endif
                @endforeach
            </div>
        </div>
        <h1>Most recent articles.</h1>
        <div class="col-md-12 d-flex justify-content-around">
            @foreach ($articles as $article)
                @if ($article->status == "published")
                    <div class="card m-2">
                        <img width=150 height=150 src="{{ Storage::url($article->image) }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><a class="text-decoration-none" href="{{ route('articles.articles.user', $article->id) }}">{{$article->title}}</a></h5>
                            <p class="card-text"><small class="text-muted">Author: {{$article->author}} <br> Category: <a class="text-decoration-none text-dark" href="{{ route('articles.category.user', $article->category->category_name) }}">{{$article->category->category_name}}</a></small></p>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</div>
@endsection
