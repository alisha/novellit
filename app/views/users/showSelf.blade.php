@extends('_layout')

@section('title')
     - Your Profile
@stop

@section('body')

    <div class="col-md-12">

        <div class="col-md-2" id="avatar">
            <img src="http://www.gravatar.com/avatar/{{md5(strtolower(trim(Auth::user()->email)))}}">
        </div>

        <div class="col-md-10">

            <h1>{{ Auth::user()->name }}</h1>

            <p><strong>Email: </strong>{{ Auth::user()->email }}</p>

            <a href="/users/{{Auth::user()->id}}/edit">Edit Profile</a>

        </div>

    </div>

        <div class="col-md-12 library">

            <h3>Currently Reading</h3>

            <ul>
                @foreach(Auth::user()->lits as $lit)
                    @if ($lit->pivot->mode == 'currently_reading')
                        <li><a href="/lits/{{$lit->id}}">{{$lit->title}}</a> by {{$lit->author}}</li>
                    @endif
                @endforeach
            </ul>

            <br>

            <p><a href="/lits/create">Add a Lit to this collection!</a></p>

        </div>

        <div class="col-md-12">
        
            <div class="col-md-5 library">

                <h3>Finished Books</h3>

                <ul>
                    @foreach(Auth::user()->lits as $lit)
                        @if ($lit->pivot->mode == 'have_read')
                            <li><a href="/lits/{{$lit->id}}">{{$lit->title}}</a> by {{$lit->author}}</li>
                        @endif
                    @endforeach
                </ul>

                <br>

                <p><a href="/lits/create">Add a Lit to this collection!</a></p>

            </div>

            <div class="col-md-6 library">

                <h3>To Read</h3>

                <ul>
                    @foreach(Auth::user()->lits as $lit)
                        @if ($lit->pivot->mode == 'to_read')
                            <li><a href="/lits/{{$lit->id}}">{{$lit->title}}</a> by {{$lit->author}}</li>
                        @endif
                    @endforeach
                </ul>

                <br>

                <p><a href="/lits/create">Add a Lit to this collection!</a></p>

            </div>

        </div>

    </ul>

@stop