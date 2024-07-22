@extends('admin.layout')

@section('title')
Edit
@endsection

@section('main')


@if($errors->any())
<ol>
    @foreach($errors->all() as $error)
    <li style="color: red; font-size: 28px">{{$error}}</li>
    @endforeach
</ol>
@endif

<form action="{{route('dashboard.posts.update',$blog->id)}}" method="POST" style="max-width:500px;margin:auto" enctype="multipart/form-data">
    @CSRF
    @method('put')
    <label>Title</label> </br>
    <p><input type="text" name="title" value="{{$blog->title}}" style="width: 100%;"></p><br>

    <label>Content</label> </br>
    <p><textarea name="content" cols="80" rows="10" style="width: 100%;">
        {{$blog->content}}
        </textarea></p><br>

    <label for="inputImage" class="form-label"><strong>Image:</strong></label>
    <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="inputImage">
    <img src="/images/{{ $blog->image }}" width="300px" style="margin-top:20px">
    @error('image')
    <div class="form-text text-danger">{{ $message }}</div>
    @enderror

    <select name="author_id" id="" class="mt-2">
        @foreach ($authors as $author)

        @if($author->id == $blog->author_id)
        <option selected value={{$author->id}}>{{$author->name}}</option>
        @endif

        @if($author->id !== $blog->author_id)
        <option value={{$author->id}}>{{$author->name}}</option>
        @endif

        @endforeach
    </select>

    <button class="btn grad mt-4" type="submit">Update Blog</button>

</form>


@endsection