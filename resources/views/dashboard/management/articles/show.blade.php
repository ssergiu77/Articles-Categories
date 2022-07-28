@extends('layouts.home')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="d-flex justify-content-between align-items-center">
            <h1>Article: {{$article->title}}</h1>
            <a class="btn btn-dark" href="{{ url('/') }}">Back to articles</a>
        </div>
        <div class="col-md-12 d-flex justify-content-around">
            <div class="card m-2">
                <div class="card-body">
                    <h1 class="card-title">Description</h1>
                    <p class="card-text">{!!$article->description!!}</p>
                    <p class="card-text"><small class="text-muted">Category: {{$article->category->category_name}}</small></p>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <img src="{{ Storage::url($article->image) }}" class="card-img-top" alt="...">
    </div>
</div>
@endsection
