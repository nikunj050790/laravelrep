<!DOCTYPE html>
<html>
    <head>
        <title>@yield('title')</title>

        {!! Html::style('css/app.css') !!}
        {!! Html::style('css/style.css') !!}

        {!! Html::script('js/jquery.min.js') !!}
        {!! Html::script('js/jquery.validate.min.js') !!}
        {!! Html::script('js/forms.validation.js') !!}


        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
       <!--  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script> -->
       
    </head>

    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Project name</a>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="">Home</a></li>
                    <li><a href="">About</a></li>
                    <li><a href="">Item</a></li>
                    
                    @if(Auth::check())
                    <li><a href="{{ URL::to('profile') }}">My Profile</a></li>
                    <li><a href="{{ URL::to('users/logout') }}">Logout</a></li>
                    @else
                    <li><a href="{{ URL::to('users/login') }}">Login</a></li>
                    @endif
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </nav>

    <body>
        <div class="container">
            @yield('content')
        </div><!-- /.container -->
    </body>
</html>