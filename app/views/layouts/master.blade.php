<html>
<head>
    <title>apply.codeup.com</title>
    <!-- Latest compiled and minified CSS -->
    {{HTML::style('http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css')}}
    
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">

    <style type="text/css">

    body {
        padding-top: 70px;
    }

    .message-info {
        font-size: 18px;
    }

    .fileUpload {
        position: relative;
        overflow: hidden;
        margin: 0px;
        padding: 2px;
    }
    .fileUpload input.upload {
        position: absolute;
        top: 0;
        right: 0;
        margin: 0;
        padding: 0;
        font-size: 20px;
        cursor: pointer;
        opacity: 0;
        filter: alpha(opacity=0);
    }

    .actions-column {
        width: 156px;
    }

    </style>

    @yield('topscript')

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
                            <li><a href="/profile">{{ Auth::user()->firstname }}</a></li>
                            @else
                            <li><a href="/login">Login</a></li>
                            <li><a href="/register">Sign Up</a></li>
                            @endif
                        </ul>

                    </div><!-- /.navbar-collapse -->
                </div>
            </nav>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    @if(Session::has('message'))
                    <div class="alert bg-success">
                        <button class="close" data-dismiss="alert">×</button>
                        <p class="message-info">{{ Session::get('message') }}</p>
                    </div>
                    @endif

                    @if(Session::has('alert'))
                    <div class="alert bg-warning">
                        <button class="close" data-dismiss="alert">×</button>
                        <p class="message-info">{{ Session::get('alert') }}</p>
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

    @yield('bottomscript')

    <script type="text/javascript">

        $(document).ready(function() {
            $('.close').click(function(){
                // Consider autofading out alert messages.
                console.log('clicked.');
                console.log($(this).parent());
                $(this).parent().slideUp();
            });
        })

    </script>

</body>
</html>