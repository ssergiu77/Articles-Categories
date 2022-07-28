@extends('layouts.app')
        
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<div class="header pb-8 d-flex align-items-center" style="background-image: url(../argon/img/theme/profile-cover.jpg); background-size: cover; background-position: center top;">
    <span class="mask bg-gradient-default opacity-8"></span>
</div> 
<div class="container mt-5 mb-5">
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div class="row d-flex justify-content-center">
        <div class="col-md-12">
            <div class="d-flex justify-content-between align-items-center">
                <h2>Edit Article</h2><br/>
                <a class="btn btn-dark" href="{{ url('dashboard/articles') }}">Back to articles</a>
            </div>
            <hr>
            <form method="post" action="{{ route('update.article', $article->id) }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="category_name" class="form-label">Category ID <span class="text-danger">*</span></label>
                    <select class="form-select" name="category_name" aria-label="">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                    <input type="text" name="title" placeholder="{{ $article->title }}" class="form-control" id="title">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description <span class="text-danger">*</span></label>
                    <input type="text" name="description" placeholder="{{ $article->description }}" class="form-control" id="description">
                </div>
                <div class="input-group mb-3">
                    <label class="input-group-text" for="image">Image</label>
        
                    <input type="file"name="image"id="inputImage" class="form-control @error('image') is-invalid @enderror">
                    
                    @error('image')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="author" class="form-label">Author <span class="text-danger">*</span></label>
                    <input type="text" name="author" placeholder="{{ $article->author }}" class="form-control" id="author">
                </div>
                <div class="mb-3">
                    <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                    <select class="form-select" name="status" aria-label="">
                        <option value="published">Published</option>
                        <option value="draft">Draft</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-warning">Edit article</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://cdn.tiny.cloud/1/gzvnw6efijqsf4kwtsc7q6mhenx4jgmkpelgsyc5wg81zzub/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

    <script>
        tinymce.init({
            selector: '#description'
        });
    </script>
@endsection