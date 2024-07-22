@extends('admin.layout')

@section('title')
Create Blog
@endsection

@section('main')

@if($errors->any())
<ol>
    @foreach ($errors->all() as $error )
    <li style="color:red;font-size:28px">{{$error}}</li>
    @endforeach
</ol>
@endif
<h2 style="text-align:center;margin:20px">Create Blog</h2>
<!-- route('blogs.store') from photo whatsapp -->
<form action="{{route('dashboard.posts.store')}}" method="post" style="max-width:500px;margin:auto" enctype="multipart/form-data">
    @CSRF

    <p>Title</p>
    <p><input type="text" name="title" style="width: 100%;"></p>
    <p><strong>Author</strong>Content</p>
    <p><textarea name="content" rows="5" cols="80" style="width: 100%;"></textarea></p>

    <!-- <p>Image</p>
    <p><input type="file" name="image"></p> -->

    <label for="inputImage" class="form-label"><strong>Image:</strong></label>
    <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="inputImage">
    @error('image')
    <div class="form-text text-danger">{{ $message }}</div>
    @enderror

    <p><strong>Author</strong></p>
    <select name="author_id" id="" class="mt-2">
        @foreach ($authors as $author)
        <option value={{$author->id}}>{{$author->name}}</option>
        @endforeach
    </select>

    <p><button type="submit" class="btn grad mt-4">Add Blog</button></p>
</form>

@endsection
