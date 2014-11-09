@extends('_layout')

@section('title')
     - Log In
@stop

@section('body')
<h1>Log in</h1>
<p>Don't have an account? <a href="/signup">Sign up today!</a></p>

<br>

{{ Form::open(array('url' => 'login', 'role' => 'form')) }}

    <div class="form-group">
        {{ Form::label('email', 'Email: ', array('for' => 'email')) }}
        {{ Form::text('email', '', array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('password', 'Password: ', array('for' => 'password')) }}
        {{ Form::password('password', array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::checkbox('remember_me', '1', array('class' => 'form-control')) }} Remember me
    </div>

    <div class="form-group">
        {{ Form::submit('Log in', array('class' => 'btn btn-primary btn-form')) }}
    </div>

{{ Form::close() }}
@stop