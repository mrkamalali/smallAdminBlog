@extends('master')

@section('content')

 <div class="col-lg-10">
     <h1 class="page-header">
         Statistics
         <small>Website statistics</small>
     </h1>

     <br>


    <div>
    <table class="table table-hover">
        <tr>
            <td>All Users</td>
            <td>{{ $users }}</td>
        </tr>
        <tr>
            <td>All Posts</td>
            <td>{{ $posts }}</td>
        </tr>
        <tr>
            <td>All Comments</td>
            <td>{{$comments}}</td>
        </tr>

        <tr>
            <td>Most comments by :</td>
            <td>{{ $commentname .  ' => has:  ' . $commentcount . ' (comments)' }}</td>
</tr>


    </table>
    </div>
 </div>
@stop