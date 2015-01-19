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

        <!-- Main Dropdown Menu -->
        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                @if(Auth::check())
                    {{ Auth::user()->first }} 
                @else
                    Menu
                @endif
               <span class="caret"></span>
              </a>
              <ul class="dropdown-menu" role="menu">
                @if (Auth::check())
                    @if(Auth::user()->role == 'staff')
                        <li><a href="/dashboard" class="text-right">Dashboard <span class="glyphicon glyphicon-th-large" aria-hidden="true"></span></a></li>
                        <li class="divider"></li>
                    @endif
                    <li><a href="/profile" class="text-right">Your Profile <span class="glyphicon glyphicon-user" aria-hidden="true"></span></a></li>
                    <li><a href="/logout" class="text-right">Log Out <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span></a></li>
                @else
                    <li><a href="/login" class="text-right">Login <span class="glyphicon glyphicon-log-in" aria-hidden="true"></span></a></li>
                    <li><a href="/signup" class="text-right">Sign Up <span class="glyphicon glyphicon-register" aria-hidden="true"></span></a></li>
                @endif
              </ul>
            </li>
        </ul>
    </ul>
    <!-- /.navbar-top-links