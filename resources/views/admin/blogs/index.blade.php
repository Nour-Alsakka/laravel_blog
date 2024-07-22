@extends('admin.layout')

@section('title')
Blogs
@endsection

@section('main')


<div style="margin:20px auto;">
    <h2 style="text-align:center">Blogs list</h2>
    <a class="btn btn-secondary mb-4" href="{{route('dashboard.posts.create')}}">add blog</a>
    <div class="row p-0 m-0">

        @foreach ($blogs as $blog )
        <form method="post" action="{{ route('dashboard.posts.destroy', $blog->id) }}" class="m-0 col-lg-4 col-md-6 col-sm-12">
            @CSRF
            <!-- {{ csrf_field() }} -->
            {{ method_field('DELETE') }}

            <div class="card m-0 mb-4" style="width: 18rem;height:440px">
                <img src="{{asset('images/'.$blog->image)}}" class="card-img-top" alt="..." style="object-fit:cover;height:200px">
                <div class="card-body" style="position:relative">
                    <h5 class="card-title mb-4"><a href={{url('/dashboard/posts/'.$blog->id)}}>{{$blog->title}}</a></h5>
                    <p class="card-text" style="position: absolute; top: 80px;">{{substr($blog->content, 0, 50)}}...</p>
                    <!-- <a href="{{url('/dashboard/posts/'.$blog->id)}}" class="btn btn-primary">Details</a> -->

                </div>


                <!-- <a href={{url('/dashboard/posts/'.$blog->id)}}>{{$blog->title}}</a> -->

                <a class="btn btn-success mb-2 mx-2" href="{{route('dashboard.posts.edit',$blog->id)}}">edit </a>

                <button class="btn btn-danger mb-2 mx-2" type=" submit" style="">Delete</button>
            </div>
        </form>

        @endforeach

    </div>

    @endsection