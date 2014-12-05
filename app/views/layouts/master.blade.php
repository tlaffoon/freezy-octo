<html>
<head>
    <title>apply.codeup.com</title>
    <!-- Latest compiled and minified CSS -->
    {{HTML::style('http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css')}}

    <style type="text/css">

    body {
        padding-top: 70px;
    }

    </style>

    @yield('header')

</head>
<body>
    <div class="page">
        <div class="container-fluid">
            <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="/">Codeup Application</a>
                    </div>

                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-right">
                            @if (Auth::check())
                            <li><a href="/logout">Log Out</a></li>
                            <li><a href="/profile">{{ Auth::user()->first_name }}</a></li>
                            @else
                            <li><a href="/login">Login</a></li>
                            <li><a href="/register">Sign Up</a></li>
                            @endif
                        </ul>

                    </div><!-- /.navbar-collapse -->
                </div>
            </nav>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    @if(Session::has('message'))
                    <div class="alert-box success">
                        <h2>{{ Session::get('message') }}</h2>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        @yield('content')
    </div>

    <!-- Jquery -->
    {{HTML::script('http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js')}}
    
    <!-- Bootstrap Javascript -->
    {{HTML::script('http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js')}}

    @yield('footer')

</body>
</html>