@extends('master')

@section('content')


    <div class="col-md-8">

        <br>
        <h3>Login here!!</h3>

        <form method="post" action="/login">
            {{ csrf_field() }}


            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="text" name="email" value="{{ old('email') }}" class="form-control form-app" placeholder="Email Address">
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control form-app" placeholder="Password">
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-submit">Login</button>
            </div>

        </form>
        <div>
            @foreach($errors->all() as $error)

                <div class="alert alert-danger" role="alert">
                    {{ $error  }}
                </div>
                {{--<h4 class="text-danger">{{ $error }} </h4> <br>--}}
                {{--<script>alert('Sorry We Have No Data About Your Email Or Password')</script>--}}
            @endforeach
        </div>
    </div>





@stop