
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport"content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Blog Home - Start Bootstrap Template</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<style>.footer {
        position: fixed;
        left: 0;
        bottom: 0;
        width: 100%;
        background-color: #5e5d5d;
        color: white;
        text-align: center;
    }</style>
</head>

<body>

    <!-- Navigation --><br>

    <br>
    <nav  style="background-color: #222222" class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a style="color: #2ab27b;font-size: xx-large" class="navbar-brand" href="/posts">This-Blog</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="/about">About</a>
                    </li>
                    <li>
                        <a href="/statistics">Statistics</a>
                    </li>
                    <li>
                        <a href="/login">Contact</a>
                    </li>
                    @if(Auth::check())
                        <li>
                            <a>Welcome : <span style="color: mediumspringgreen;font-size: large">{{Auth::user()->name}}</span> </a>
                        </li>
                            <li>
                                <a href="/logout">Logout</a>
                            </li>

                        @if(Auth::user()->hasRole('admin') or Auth::user()->hasRole('editor'))

                            <li>
                                <a href="/add-post">Add Post</a>
                            </li>

                        @endif
                        @if(Auth::user()->hasRole('admin') )
                            <li>
                                <a  style="color: #c7254e;font-family: 'Berlin Sans FB';font-size: xx-large"
                                    href="/admin">Admin panel<span style="color: #a6e1ec;font-size: large"><small>  Just for admin ..</small></span></a>
                            </li>
                            @endif




                    @else
                        <li>
                            <a href="/register">Register</a>
                        </li>
                        <li>
                            <a href="/login">Login</a>
                        </li>
                    @endif


                    {{--@if(Auth::user()->hasRole('admin'))--}}
                   {{--<li>--}}
                       {{--<a  title=" Sorry only for admin" style="color: #c7254e;font-family: 'Berlin Sans FB';font-size: xx-large"--}}
                           {{--href="/admin">Admin panel<span style="color: #a6e1ec;font-size: large"><small>  Just for admin ..</small></span></a>--}}
                   {{--</li>--}}
                    {{--@endif--}}


                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                @yield('content')

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">




            <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <div class="input-group">
                        <input type="text" class="form-control">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>




                    <!-- /.input-group -->
                </div>

                <!-- Blog Categories Well -->
                <div class="well">
                    <h4 style="color: #c7254e">Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled">


                                <li><a href="/category/computer">Computer</a>
                                </li><hr>

                                <li><a href="/category/cars">cars</a>
                                </li>


                                {{--<li><a href="#">Category Name</a>--}}
                                {{--</li>--}}
                                {{--<li><a href="#">Category Name</a>--}}
                                {{--</li>--}}
                            </ul>
                        </div>
                        <!-- /.col-lg-6 -->
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                <li><a href="/category/mobile">mobile</a>
                                </li><hr>
                                {{--<li><a href="#">Category Name</a>--}}
                                {{--</li>--}}
                                {{--<li><a href="#">Category Name</a>--}}
                                {{--</li>--}}
                                {{--<li><a href="#">Category Name</a>--}}
                                {{--</li>--}}
                            </ul>
                        </div>
                        <!-- /.col-lg-6 -->
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                <div class="well">
                    <h4>Side Widget Well</h4>
                    <p></p>
                </div>

            </div>

        </div>

        <hr>

    </div>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

        <div class="footer">
            <h4>made by : <a style="color: #a6e1ec" href="https://plus.google.com/u/0/104591656062366484085">Kamal Ali</a> </h4>
            <p>COPYRIGHT &copy; THIS BLOG FOR YOU 2018</p>
        </div>


</body>
</html>

