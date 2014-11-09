@extends("_layout")

@("title")
     - Most Popular Lits
@stop

@section("body")

    <h1>Most Popular Lits</h1>

    <p><a href="/lits/create">Add your own Lit!</a></p>

    <br>

    <div id="litlist">

        @foreach ($lits as $lit)
            <p><a href="/lits/{{$lit->id}}">{{ $lit->title }}</a> by {{ $lit->author }} <br></p>
        @endforeach

    </div>

@stop