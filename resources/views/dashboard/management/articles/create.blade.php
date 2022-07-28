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
            <h2>Create article</h2><br/>
            <a class="btn btn-dark" href="{{ url('dashboard/articles') }}">Back to articles</a>
        </div>
        <hr>
        <form method="post" action="{{ url('dashboard/articles') }}" id="form-articles" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="category_name" class="form-label">Category <span class="text-danger">*</span></label>
                <select class="form-select" name="category_name" aria-label="">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                <input type="text" name="title" class="form-control" id="title">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description <span class="text-danger">*</span></label>
                <input type="text" name="description" required class="form-control" id="description">
            </div>
            <div class="mb-3">
                <label class="form-label" for="inputImage">Image:</label>
                <input type="file"name="image"id="inputImage" class="form-control @error('image') is-invalid @enderror">
                
                @error('image')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="author" class="form-label">Author <span class="text-danger">*</span></label>
                <input type="text" name="author" class="form-control" id="author">
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                <select class="form-select" name="status" aria-label="">
                    <option value="published">Published</option>
                    <option value="draft">Draft</option>
                </select>
            </div>
            <button type="submit" class="btn btn-warning">Create Article</button>
        </form>
    </div>
</div>
@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://cdn.tiny.cloud/1/gzvnw6efijqsf4kwtsc7q6mhenx4jgmkpelgsyc5wg81zzub/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>

    <script>
        tinymce.init({
            selector: '#description'
        });

        $(document).ready(function () {
            $('#form-articles').validate({ // initialize the plugin
                rules: {
                    category_name: {
                        required: true
                    },
                    title: {
                        required: true
                    },
                    description: {
                        required: true
                    },
                    image: {
                        required: true,
                        extension: "jpeg|png|jpg"
                    },
                    author: {
                        required: true
                    },
                    status: {
                        required: true
                    },
                }
            });
        });
    </script>
@stop
@endsection