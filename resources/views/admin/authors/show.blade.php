@extends('admin.layout')

@section('title')
Author
@endsection



@section('main')

@foreach ($author_blogs as $author_blog)

<div class="card" style="width: 18rem;">
    <img src="{{asset('images/'.$author_blog->image)}}" class="card-img-top" alt="...">
    <div class="card-body">
        <h5 class="card-title">{{$author_blog->title}}</h5>
        <p class="card-text">{{$author_blog->content}}</p>
        <a href="{{url('/dashboard/posts/'.$author_blog->id)}}" class="btn btn-primary">Details</a>
    </div>
</div>

@endforeach

@endsection