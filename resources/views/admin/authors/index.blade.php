@extends('admin.layout')

@section('title')
Authors
@endsection

@section('main')

<a class="btn btn-secondary" href="{{url('dashboard/authors/create')}}">Add Author</a>

<table class="table">
    <thead>
        <tr>
            <th scope="col">Image</th>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>

        </tr>
    </thead>
    <tbody>
        @foreach ($authors as $author )
        <tr>
            <td><img src="{{asset('images/'.$author->image)}}" class="img-fluid" style="width: 60px; height:60px;object-fit:cover" alt="img"></td>
            <td><a href="{{url('/dashboard/authors/'.$author->id)}}">{{$author->name}}</a></td>
            <td>{{$author->description}}</td>
            <td><a href={{url('/dashboard/authors/'.$author->id.'/edit')}}>Edit</a></td>
            <td>
                <form method="post" action="{{ route('dashboard.authors.destroy', $author->id) }}">
                    @CSRF

                    <a href={{url('/dashboard/authors/'.$author->id)}}>{{$author->title}}</a>

                    <!-- {{ csrf_field() }} -->
                    {{ method_field('DELETE') }}

                    <button type=" submit">Delete</button>
                </form>
            </td>


        </tr>
        @endforeach
    </tbody>
</table>

@endsection
