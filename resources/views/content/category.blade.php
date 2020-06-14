@extends('master')

@section('content')


    <div class="col-md-8">

        <h1 class="page-header">
            Page Heading
            <small>html is here</small>
        </h1>

        <!-- First Blog Post -->

        @foreach($posts as $post);

        <h2>
            <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
        </h2>


        @if($post->image )

            <p>
                <img style="width: 550px;height: 350px;" src="../upload/{{ $post->image }}">
            </p>

        @endif


        {{--<p class="lead">--}}
            {{--by <a href="index.php"> Mr kamal ali </a>--}}
        {{--</p>--}}
        <p><span class="glyphicon glyphicon-time">
                
           </span> Posted on
            {{ \Carbon\Carbon::parse($post->created_at)->format('Y-m-d') }}
           </p>


        <hr>
        <p>{{ $post->body }}</p>
        <a class="btn btn-primary" href="/posts/{{ $post->id }}">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

        <hr>
        @endforeach





        <div>
            @foreach($errors->all() as $error)
                <h4 class="text-danger">{{ $error }} </h4> <br>
            @endforeach
        </div>






        <hr>

        <!-- Pager -->
        {{--<ul class="pager">--}}
        {{--<li class="previous">--}}
        {{--<a href="#">&larr; Older</a>--}}
        {{--</li>--}}
        {{--<li class="next">--}}
        {{--<a href="#">Newer &rarr;</a>--}}
        {{--</li>--}}
        {{--</ul>--}}

    </div>

@stop