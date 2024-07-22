@extends('admin.layout')

@section('cssAndjs')
<link rel="stylesheet" href="{{asset('filepond-master/filepond.min.css')}}">
<script src="{{asset('filepond-master/filepond.min.js')}}"></script>
@endsection


@section('title')
Add Author
@endsection

@section('main')

@if($errors->any())
<ol>
    @foreach ($errors->all() as $error )
    <li style="color:red;font-size:28px">{{$error}}</li>
    @endforeach
</ol>
@endif

@if(session('success'))
<div class="alert alert-success">{{session('success')}}</div>
@endif

<!-- route('blogs.store') from photo whatsapp -->
<form action="{{route('dashboard.authors.store')}}" method="post" enctype="multipart/form-data">
    @CSRF
    <div class="card">
        <div class="card-header bg-secondary text-white " style="text-align:center;">
            <h5>Add Author Page</h5>
        </div>
        <div class="card-body">
            <label class="form-label"><strong>Author Name</strong></label>
            <p><input type="text" name="name" class="form-control" style=" width: 100%;"></p>

            <label class="form-label"><strong>Author Bio</strong></label>
            <p><textarea name="description" class="form-control" rows=" 5" cols="80" style="width: 100%;"></textarea></p>

            <label for="inputImage" class="form-label"><strong>Author Image</strong></label>
            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="inputImage">
            @error('image')
            <div class="form-text text-danger">{{ $message }}</div>
            @enderror

            <button class="btn bg-secondary text-white  mt-4 w-50" style="display:block;margin:auto" type="submit">Add Author</button>

        </div>
    </div>
</form>
<script>
    const x = document.getElementById('inputImage');
    const pond = FilePond.create(x);
    FilePond.setOptions({
        server: {
            url: '/dashboard/upload',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        }
    });
</script>
<!-- <form action="{{route('dashboard.authors.store')}}" method="post" enctype="multipart/form-data" style="max-width:500px;margin:auto">
    @CSRF
            <h2 style="text-align:center">Add Author Page</h2>
            <p>Author Name</p>
            <p><input type="text" name="name" style="width: 100%;"></p>

            <p>Author Bio</p>
            <p><textarea name="description" rows="5" cols="80" style="width: 100%;"></textarea></p>

            <label for="inputImage" class="form-label"><strong>Image:</strong></label>
            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="inputImage">
            @error('image')
            <div class="form-text text-danger">{{ $message }}</div>
            @enderror

            <button class="btn grad mt-4" type="submit">Add Author</button>
        </form> -->

@endsection
