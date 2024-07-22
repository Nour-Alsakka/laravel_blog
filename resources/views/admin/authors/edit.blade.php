@extends('admin.layout')

@section('title')
Edit Author
@endsection

@section('main')

@if($errors->any())
<ol>
    @foreach($errors->all() as $error)
    <li style="color: red; font-size: 28px">{{$error}}</li>
    @endforeach
</ol>
@endif

<form action="{{route('dashboard.authors.update',$author->id)}}" method="POST" style="max-width:500px;margin:auto" enctype="multipart/form-data">
    @CSRF
    @method('put')
    <label>name</label> </br>
    <p><input type="text" name="name" value="{{$author->name}}" style="width:100%"></p><br>

    <label>description</label> </br>
    <p><textarea name="description" cols="80" rows="10" style="width:100%">
        {{$author->description}}
        </textarea>
    </p><br>

    <label for="inputImage" class="form-label"><strong>Image:</strong></label>
    <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="inputImage">
    <img src="/images/{{ $author->image }}" width="300px" style="margin-top:20px">

    @error('image')
    <div class="form-text text-danger">{{ $message }}</div>
    @enderror

    <button class="btn grad mt-4" type="submit">Update Author</button>

</form>

@endsection