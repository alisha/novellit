@extends("_layout")

@section("title")
     - {{ $lit->title }}
@stop

@section("body")

    <h1>{{ $lit->title}} by {{ $lit->author }}</h1>

    @if ($lit->link != "")
        <p><strong>External link:</strong> <a href="{{$lit->link}}">{{$lit->link}}</a></p>
    @endif

    <p><strong>Description:</strong><br>{{$lit->description}}</p>

    @if (!($lit->inUserLibrary()))

        <p><strong>Add Lit to your Library:</strong></p>

        <div class="col-md-10">

            {{ Form::open(array('role' => 'form', 'route' => array('add', $lit->id), 'method' => 'post')) }}

                {{ Form::radio('mode', 'currently_reading') }} Currently reading <br>
                {{ Form::radio('mode', 'to_read') }} To read <br>
                {{ Form::radio('mode', 'have_read') }} Have read <br><br>

                <button class="btn btn-default" type="submit">Add Lit</button>

            {{ Form::close() }}

        </div>

    @else

        <p>This book is in your library!</p>

    @endif

@stop