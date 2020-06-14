@extends('master')
@section('content')

<div  style="padding-top: 50px" class="col-lg-8">
    <h4>Control Panel</h4>
    <h6>list of user</h6>

</div>
    <table class="table table-hover">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>User</th>
            <th>Editor</th>
            <th>Admin</th>
        </tr>
        @foreach($users as $user)
        <form method="post" action="/add-role">
            {{ csrf_field() }}
            <input type="hidden" name="email" value="{{ $user->email }}">
        <tr>
            <th>{{ $user->id }}</th>
            <th>{{ $user->name }}</th>
            <th>{{ $user->email }}</th>
            <th>
                <input type="checkbox"  name="role_user" onChange="this.form.submit()" {{ $user->hasRole('user') ? 'checked' :' ' }}>
            </th>
            <th>
                <input type="checkbox" name="role_editor" onChange="this.form.submit()" {{ $user->hasRole('editor') ? 'checked' :' ' }}>

            </th>
            <th>
                <input type="checkbox" name="role_admin" onChange="this.form.submit()" {{ $user->hasRole('admin') ? 'checked' :' ' }}>

            </th>
        </tr>
        </form>
@endforeach
    </table>



    @stop