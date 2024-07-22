@extends('admin.layout')

@section('title')
Details
@endsection

@section('main')

<div>
    <form method="post" action="{{ route('dashboard.posts.destroy', $blog->id) }}" style="margin:20px auto;padding:10px; display:flex;gap:20px">
        @CSRF
        <!-- {{ csrf_field() }} -->
        {{ method_field('DELETE') }}

        <div>
            <img src="{{asset('images/'.$blog->image.'' )}}" alt="" style="width:300px">
            <div class="btns">
                <a class="btn btn-success my-2 mr-2" href="{{route('dashboard.posts.edit',$blog->id)}}">edit </a>

                <button class="btn btn-danger  my-2" type=" submit" style="">Delete</button>
            </div>
        </div>
        <div>
            <h2>{{$blog->title}}</h2>
            <p>{{$blog->content}}</p>
            <p>{{$blog->author_name?"created by: ".$blog->author_name:""}}</p>
        </div>
    </form>

</div>

@endsection