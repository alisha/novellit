@extends('_layout')

@section('title')
     - {{ $user->name }}'s Profile
@stop

@section('body')

    <h1>{{ $user->name }}</h1>

    <h2><a href="">Add friend</a></h2>

    <h2>Lits</h2>

@stop