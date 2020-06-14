@extends('master')

@section('content')


    <div class="col-md-8">

        <h1 class="page-header">
            Page Heading
            <small>html is here</small>
        </h1>

        <!-- First Blog Post -->


        <h2>
            <a href="#">{{ $post->title }}</a>
        </h2>
        <p class="lead">
            by <a href="index.php">Start Bootstrap</a>
        </p>
        <p><span class="glyphicon glyphicon-time"></span> Posted on August 28, 2013 at 10:00 PM</p>
        <hr>
        {{--<img class="img-responsive" src="http://placehold.it/900x300" alt="">--}}
        <hr>
        <p>{{ $post->body }}</p>
        @if($post->image )

                 <p><img  style="width: 550px;height: 350px" src="../upload/{{ $post->image }}"></p>
            <br>
                @else <hr>

            <h2 style="color: #c7254e"> No Photo for this topic...</h2><hr>
            @endif
                {{--<div class="comments">--}}
                    {{--@foreach($post->comments as $comment)--}}
                        {{--<p>{{ $comment->body }}</p>--}}
                        {{--@endforeach--}}
                {{--</div>--}}
            {{--Show comment here--}}
             @foreach($post->comments as $comment)
            <div class="panel panel-default">
                <div class="panel-heading">Commented by : {{$comment->user->name}}  || created at :{{ $comment->created_at->diffForHumans() }}</div>
               <div class="panel-body">{{ $comment->body }}</div>
            </div>
            @endforeach



        @if(Auth::check())
            @if(Auth::user()->hasRole('admin') )

            <a class="btn btn-warning" href="{{'/post/update/'.$post->id}}">Update</a>
            <a class="btn btn-danger" href="/post/delete/{{ $post->id }}">Delete</a>
            @endif
        @endif



        {{--End show comment here--}}






        <br>



        {{--form comment here--}}


        @if(Auth::check())

            <form method="post" action="/post/{{ $post->id }}/store">
            {{ csrf_field() }}
            <input type="hidden" name="user_id" value="{{Auth::id()}}">



            <br>

        <div class="form-group">
        <label for="body">Write your comment here</label>
        <textarea name="body" id="body" class="form-control"></textarea>
        </div>


        <div class="form-group"></div>
        <button type="submit" class="btn btn-primary">Add Comment</button>
        </form>
        @endif



    {{--end form comment--}}


        <hr>


    </div>

@stop