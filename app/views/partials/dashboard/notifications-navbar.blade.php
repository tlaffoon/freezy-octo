<!-- /.dropdown -->
<li class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
        <i class="fa fa-bell fa-fw"></i> <span class="badge"> {{ count($notifications) }}  </span> <i class="fa fa-caret-down"></i>
    </a>
    <ul class="dropdown-menu dropdown-alerts">

        <!-- If there are unread notifications -->
        @if(count($notifications) > 0)
            <!-- Loop through notifications -->
            @foreach ($notifications as $key => $notification)
            <li>
                <!-- link to individual notification url -->
                <a href="#">

                    <!-- Display appropriate icon for notification -->
                    <div>
                    @if ($notification->object_type == 'feedback')
                        <i class="fa fa-comment-o fa-fw"></i> New Comment
                    @elseif ($notification->object_type == 'comment')
                        <i class="fa fa-comments-o fa-fw"></i>
                    @elseif ($notification->object_type == 'application')
                        <i class="fa fa-list-alt fa-fw"></i> New Application
                    @endif                            

                        <!-- Created when? -->
                        <span class="pull-right text-muted small">{{ $notification->created_at }}</span>
                    </div>
                </a>
            </li>
            <li class="divider"></li>
            @endforeach
        @endif
        <!-- End Unread Notifications -->

        <li>
            <a class="text-center" href="/alerts">
                <strong>See All Alerts</strong>
                <i class="fa fa-angle-right"></i>
            </a>
        </li>
    </ul>
    <!-- /.dropdown-alerts -->
</li>