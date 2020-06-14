@extends('master')
@section('content')

{{--form insert--}}


<h2 class="text-danger">Add Post Here</h2>

        <form method="POST" action="/add-post/" enctype="multipart/form-data">

    {{ csrf_field() }}

    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" id="title" class="form-control">
    </div>
    <div class="form-group">
        <label for="body">Body</label>
        <textarea name="body" id="body" class="form-control"></textarea>
    </div>
    {{--to take the user who logined in (id)--}}
    <input type="hidden" name="user_id" value="{{ Auth::id() }}">
    {{----}}
    <div class="form-group">
        <label for="">Categories</label>
        <select class="form-control" name="category_id" >

        @foreach($cats as $cat)
                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
        @endforeach


        </select>
    </div>

    <div class="form-group">
        <label for="image">Image</label>
        <input id="image" type="file" name="image">
    </div>

    <div class="form-group"></div>
    <button type="submit" class="btn btn-primary">Add Post</button>
</form>



{{--end the form  insert in --}}

@stop