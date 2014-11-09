@extends("_layout")

@section('title')
     - Sign Up
@stop

@section('body')

    <h1>Sign Up</h1>

    <form action="{{ action('UserController@store') }}" method="post">

        <div class="form-group">
            <label for="title">Name: </label>
            <input type="text" name="name" class="form-control" autofocus>
        </div>

        <div class="form-group">
            <label for="title">Email: </label>
            <input type="text" name="email" class="form-control" autofocus>
        </div>

        <div class="form-group">
            <label for="title">Password: </label>
            <input type="password" name="password" class="form-control" autofocus>
        </div>

        <div class="form-group">
            <input type="submit" value="Create!" class="btn btn-primary">
        </div>

    </form>

@stop