@extends('master')

@section('content')


    <div class="col-md-8">
        <br>
        <h1 class="page-header">
           Our Blog..
            <small>all posts here</small>
        </h1>

        <!-- First Blog Post -->

        @foreach($posts as $post);

        <h2>
            <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
        </h2>
        <p> <span class="glyphicon glyphicon-time">

            </span> Posted on {{ $post->created_at }} - <strong> Category: </strong>
            <a href="/category/{{ $post->category->name  }}"> {{ $post->category->name }} </a> </p>
            <strong>written by: {{$post->user->name}}</strong>


    @if($post->image )

            <p>
                    <img style="width: 650px;height: 250px;" src="upload/{{ $post->image }}">
            </p>

        @endif


        {{--<p class="lead">--}}
        {{--by <a href="index.php"> Mr kamal ali </a>--}}
        {{--</p>--}}

        <hr>
        <p>{{ $post->body }}</p>
        <a class="btn btn-primary" href="{{ '/posts/'.$post->id }}">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

        {{--@if(Auth::user()->hasRole('admin') )--}}

            {{--<a class="btn btn-warning" href="{{'/post/update/'.$post->id}}">Update</a>--}}
            {{--<a class="btn btn-danger" href="/post/delete/{{ $post->id }}">Delete</a>--}}

        {{--@endif--}}

        <hr>
        @endforeach



        <hr>



    </div>

@stop