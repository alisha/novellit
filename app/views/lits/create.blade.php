@extends("_layout")

@title
     - New Lit
@stop

@section('body')

    <h1>New Lit</h1>

    <form action="{{ action('LitController@store') }}" method="post">

        <div class="form-group">
            <label for="title">Title: </label>
            <input type="text" name="title" class="form-control" autofocus>
        </div>

        <div class="form-group">
            <label for="author">Author: </label>
            <input type="text" name="author" class="form-control" autofocus>
        </div>

        <div class="form-group">
            <label for="description">Description: </label>
            <textarea name="description" class="form-control"></textarea>
        </div>

        <div class="form-group">
            <label for="link">Link (optional): </label>
            <input type="text" name="link" class="form-control">
        </div>

        <div class="form-group">
            <input type="submit" value="Create!" class="btn btn-primary">
        </div>

    </form>

@stop