<!doctype html>
<html>

    <head>

        <title>
            NovelLit
            @yield('title')
        </title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">

        <link rel="stylesheet" type="text/css" href="{{asset('style.css')}}">

        @yield('head')

    </head>

    <body>

        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">NovelLit</a>
                </div>

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li><a href="/lits">All Lits</a></li>
                        <li><a href="/lits/create">Add a Lit</a></li>

                        @if (Auth::check())
                            <li><a href="/users/{{Auth::user()->id}}">Your Profile</a></li>
                            <li><a href="/logout">Log Out</a></li>
                        @else
                            <li><a href="/signup">Sign Up</a></li>
                            <li><a href="/login">Log In</a></li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        <div class="row">
            <div class="col-md-8 col-md-offset-2 content">

                @if(Session::get('flash_message'))
                    <div class="alert {{ Session::get('alert_class', 'alert-info') }} alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        {{ Session::get('flash_message') }}
                    </div>
                @endif

                {{-- If there are any errors with the input, give the user a warning --}}
                    @if (count($errors) != 0)
                        @foreach($errors->all() as $message)
                            <div class="alert alert-danger alert-dismissable" role="alert">
                            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            {{ $message }} <br>
                        </div>      
                        @endforeach
                    @endif

                @yield('body')
            </div>
        </div>

        <script src="{{asset('jquery.min.js')}}"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

    </body>

</html>