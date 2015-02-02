<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="/">Codeup Dashboard</a>
    </div>
    <!-- /.navbar-header -->

    <ul class="nav navbar-top-links navbar-right">
            
        <!-- Placeholder for notifications partial -->
        {{-- @include('partials.dashboard.notifications-navbar')}} --}}

        <!-- /.dropdown -->
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                @if(Auth::check())
                    <li><p class="dropdown-header text-right">Signed in as: {{ Auth::user()->first }}</p></li>
                    <li class="divider"></li>
                    @if(Auth::user()->role == 'staff')
                    <li><a href="/dashboard"><span class="glyphicon glyphicon-th-large" aria-hidden="true"></span> Dashboard </a></li>
                    <li class="divider"></li>
                    @endif
                <li><a href="/profile"><i class="fa fa-user fa-fw"></i> User Profile</a></li>
                <li><a href="/settings"><i class="fa fa-gear fa-fw"></i> Settings</a></li>
                <li class="divider"></li>
                <li><a href="/logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>
                @else
                <li><a href="/login" class="text-right">Login <span class="glyphicon glyphicon-log-in" aria-hidden="true"></span></a></li>
                <li><a href="/signup" class="text-right">Sign Up <span class="glyphicon glyphicon-register" aria-hidden="true"></span></a></li>
                @endif
            </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
    </ul>
    <!-- /.navbar-top-links -->