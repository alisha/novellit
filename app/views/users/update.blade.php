@extends("_layout")

@section("title")
     - Update Your Profile
@stop

@section("body")

    <h1>Update Your Profile</h1>

    {{ Form::open(array('method' => 'put', 'route' => array('users.update', $user->id))) }}

        <div class="form-group">
            <label for="title">Name: </label>
            <input type="text" name="name" class="form-control" value="{{$user->name}}" autofocus>
        </div>

        <div class="form-group">
            <label for="title">Email: </label>
            <input type="text" name="email" class="form-control" value="{{$user->email}}" autofocus>
        </div>

        <p>If you want to change your password, enter both your current and your new passwords.</p>

        <div class="form-group">
            <label for="title">Current password: </label>
            <input type="password" name="current_password" class="form-control" autofocus>
        </div>

        <div class="form-group">
            <label for="title">New password: </label>
            <input type="password" name="new_password" class="form-control" autofocus>
        </div>

        <div class="form-group">
            <input type="submit" value="Create!" class="btn btn-primary">
        </div>

    {{ Form::close() }}

@stop