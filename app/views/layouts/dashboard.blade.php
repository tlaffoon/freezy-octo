<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Codeup Dashboard</title>

    <!-- Bootstrap Core CSS -->
    <link href="/includes/sb_admin/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="/includes/sb_admin/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="/includes/sb_admin/dist/css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/includes/sb_admin/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="/includes/sb_admin/bower_components/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="/includes/sb_admin/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style type="text/css">

        .no-padding-left {
            padding-left: 0px;
        }

        .flash-message {
            margin-top: 10px;
        }

        .message-info {
            font-size: 18px;
        }

        .dashboard-panel {
            margin-top: 30px;
        }

        .small-text {
            margin-right: 5px;
        }

        .btn-group-dashboard {
            position: relative;
            bottom: 10px;
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
            display: none;
        }

        .dashboard-course-header {
            border: solid #eee 1px;
            padding-top: 5px;
            background-color: white;
            margin-bottom: 5px;
        }

        .dashboard-course-box {
            width: 100%;
            border: dashed #eee 1px;
            margin-bottom: 10px;
            padding: 10px;
            font-size: 18px;
            display: none;
        }

        .dashboard-user-header {
            border: solid #eee 1px;
            padding-top: 5px;
            background-color: white;
            margin-bottom: 5px;
        }

        .dashboard-user-box {
            width: 100%;
            border: dashed #eee 1px;
            margin-bottom: 10px;
            padding: 10px;
            font-size: 18px;
            display: none;
        }

        .dashboard-tag {
            color: #b394d1;
            margin-left: 10px;
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

        .comment-container {
            padding: 5px;
            border: dashed #eee 1px;
        }

        .comment-box {
            margin-top: 5px;
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


    </style>

    @yield('topscript')

</head>

<body>

    <div id="wrapper">

        <!-- Include Navbar -->
        @include('partials.dashboard.main-dashboard-navbar')

        <!-- Include Sidebar -->
        @include('partials.dashboard.main-dashboard-sidebar')

        <div id="page-wrapper" class="row">

            <div class="col-md-12 flash-message row">
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

            <!-- Include main content -->
            @yield('content')
        </div>
        <!-- /#page-wrapper -->
        
    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="/includes/sb_admin/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="/includes/sb_admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="/includes/sb_admin/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="/includes/sb_admin/bower_components/raphael/raphael-min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="/includes/sb_admin/dist/js/sb-admin-2.js"></script>

    <script type="text/javascript">
        
    $(document).ready(function () {

        // Initialize tooltips
        $(function () {
          $('[data-toggle="tooltip"]').tooltip()
        });

        // Initialize Modal Button Tooltip
        $("[rel='tooltip']").tooltip();
    
    });
    </script>

    @yield('bottomscript')

</body>

</html>
