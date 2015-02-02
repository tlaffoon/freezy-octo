<html>
<head>
    <title>apply.codeup.com</title>
    
    <!-- Latest compiled and minified CSS -->
    {{ HTML::style('http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css') }}
    
    <!-- Optional theme -->
    {{ HTML::style('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css') }}

    <!-- Custom CSS -->
    <!-- <link href="/includes/css/simple-sidebar.css" rel="stylesheet"> -->

    <!-- Include Lato Font -->
    {{ HTML::style('http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic') }}
    
    <!-- Include Font Awesome -->
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

    <style type="text/css">

    body {
        padding-top: 70px;
        font-family: 'Lato', sans-serif;
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

    .application-box {
        border: solid #eee 1px;
        padding-top: 5px;
        margin-bottom: 10px;
        background-color: white;
    }

    .course-box {
        background-color: #E1E7F9;
        width: 100%;
        border: dashed #eee 1px;
        margin-bottom: 10px;
        padding: 10px;
        font-size: 18px;
    }

    .small-text {
        margin-right: 5px;
    }

    .dashboard-application-header {
        border: solid #eee 1px;
        padding-top: 5px;
        background-color: white;
    }

    .dashboard-application-box {
        border: solid #eee 1px;
        padding-top: 5px;
        margin-bottom: 10px;
        background-color: white;
    }

    .dashboard-course-header {
        border: solid white 1px;
        font-size: 18px;
        padding-top: 5px;
        background-color: #E1E7F9;
        margin-bottom: 2px;
    }

    .dashboard-course-box {
        background-color: #E1E7F9;
        width: 100%;
        border: solid white 1px;
        margin-bottom: 10px;
        padding: 10px;
        font-size: 18px;
    }

    .btn-group-dashboard {
        position: relative;
        bottom: 10px;
    }

    .sidebar-btn {
        margin: 5px;
    }

    .section-header {
        margin-top: 10px;
    }

    .course-description {
        text-indent: 15px;
    }

    .status-feed {
        text-indent: 15px;
        border: dashed #eee 1px;
        padding-top: 10px;
    }

    .status-header {
    }

    .chevron-nav {
        font-size: 16px;
        position: relative;
        top: 20px;
    }

    .dashboard-tag {
        color: #b394d1;
    }

    .sidebar-links {
        list-style-type: none;
        padding: 0px;
        font-size: 18px;
    }

    .application-count {
        color: orange;
    }

    .comment-box {
        padding: 5px;
        border: dashed #eee 1px;
    }

    .comment-header {
       margin-top: 5px; 
    }

    .comment-body {
        margin-top: 5px;
    }

    .timestamp {
        font-size: 12px;
    }

    @yield('css')

    </style>

    @yield('topscript')

</head>
<body>
  <div id="wrapper">
    <div id="page-content-wrapper" class="page">
        <div class=" container-fluid">
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
                        @if(Auth::check())
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="{{ action('ApplicationsController@create') }}">Apply Now!</a></li>
                        </ul>
                        @endif
                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                @if(Auth::check())
                                    {{ Auth::user()->first }}
                                    <span class="caret"></span>
                                @endif
                              </a>
                            @if(Auth::check())
                              <ul class="dropdown-menu" role="menu">
                                    @if(Auth::user()->role == 'staff')
                                        <li><a href="/dashboard" class="text-right">Dashboard <span class="glyphicon glyphicon-th-large" aria-hidden="true"></span></a></li>
                                        <li class="divider"></li>
                                    @endif
                                    <li><a href="{{ action('UsersController@showProfile') }}" class="text-right">Your Profile <span class="glyphicon glyphicon-user" aria-hidden="true"></span></a></li>
                                    <li><a href="/logout" class="text-right">Log Out <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span></a></li>
                                @else
                                    <li><a href="/login" class="text-right">Login <span class="glyphicon glyphicon-log-in" aria-hidden="true"></span></a></li>
                                    <li><a href="/signup" class="text-right">Sign Up <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></a></li>
                                @endif
                              </ul>
                            </li>
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

                    @if(Session::has('notice'))
                    <div class="alert bg-info">
                        <button class="close" data-dismiss="alert">×</button>
                        <p class="message-info">{{ Session::get('notice') }}</p>
                    </div>
                    @endif

                    @if(Session::has('alert'))
                    <div class="alert bg-warning">
                        <button class="close" data-dismiss="alert">×</button>
                        <p class="message-info">{{ Session::get('alert') }}</p>
                    </div>
                    @endif

                    @if(Session::has('error'))
                    <div class="alert bg-warning">
                        <button class="close" data-dismiss="alert">×</button>
                        <p class="message-info">{{ Session::get('error') }}</p>
                    </div>
                    @endif
                </div>
            </div>
        </div>

        @if (Auth::user()->role == 'staff')
            <div class="row">
                <div class="container">
                    <div class="col-md-12">
                        <a href="/dashboard"> Back To Dashboard </a>
                    </div>
                </div>
            </div>

        @endif

        @yield('content')
    </div> <!-- /.page-content-wrapper -->

</div> <!-- /.wrapper -->

    <!-- Jquery -->
    {{HTML::script('http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js')}}
    
    <!-- Bootstrap Javascript -->
    {{HTML::script('http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js')}}

    @yield('bottomscript')

    <script type="text/javascript">

        $(document).ready(function() {
            $('.message-info').click(function(){
                console.log('clicked.');
                console.log($(this).parent());
                $(this).parent().slideUp();
            });


            // Initialize tooltips
            $(function () {
              $('[data-toggle="tooltip"]').tooltip()
            });

            // Initialize Modal Button Tooltip
            $("[rel='tooltip']").tooltip();

        });

    </script>

</body>
</html>