    <!-- Primary Dashboard Content -->
    <div class="row">

        <h3 class="page-header"> Dashboard </h3>

        <!-- Applications Panel -->
        <div id="applications-panel" class="col-lg-3 col-md-6 dashboard-panel">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-tasks fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"> {{ count($applications) }} </div>
                            <div>Pending Applications</div>
                        </div>
                    </div>
                </div>
                <a href="/dashboard/applications">
                    <div class="panel-footer">
                        <span class="pull-left">View Applications Dashboard</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>

        <!-- Users Panel -->
        <div id="users-panel" class="col-lg-3 col-md-6 dashboard-panel">
            <div class="panel panel-green">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-users fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"> 30 </div>
                            <div>Current Students</div>
                        </div>
                    </div>
                </div>
                <a href="/dashboard/users">
                    <div class="panel-footer">
                        <span class="pull-left">View Users Dashboard</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>

        <!-- Events Panel -->
        <div id="events-panel" class="col-lg-3 col-md-6 dashboard-panel">
            <div class="panel panel-yellow">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-asterisk fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"> 1 </div>
                            <div>Upcoming Event</div>
                        </div>
                    </div>
                </div>
                <a href="/dashboard/events">
                    <div class="panel-footer">
                        <span class="pull-left">View Events Dashboard</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>

        <!-- Placeholder Panel -->
        <div id="events-panel" class="col-lg-3 col-md-6 dashboard-panel">
            <div class="panel panel-red">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-asterisk fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"> 0 </div>
                            <div>Example Panel</div>
                        </div>
                    </div>
                </div>
                <a href="/dashboard">
                    <div class="panel-footer">
                        <span class="pull-left">View Dashboard</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>

    </div>
    <!-- /.row -->

    <div class="row">

        <div class="col-md-7">
            <!-- Screen Shot of Area Chart -->
            <img src="/includes/img/area-chart.png" class="img-responsive img-rounded">
        </div>

        <div class="col-md-4">

            <!-- Notifications Panel -->
            @include('partials.notifications-panel')
        </div>

    </div>