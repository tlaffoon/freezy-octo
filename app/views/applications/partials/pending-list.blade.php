<!-- Applications -->
<h3 class="page-header">Pending Applications
    <!-- <div class="pull-right"><small>{{ count($pendingApplications) }}</small></div> -->
</h3>

<div class="panel panel-default">
    <table class="table table-striped">
        <tr>
            <td>
                <!-- Display if no applications present. -->
                @if (!$pendingApplications)
                    <h4> There are no pending applications. </h4>
                @else
                    @foreach ($pendingApplications as $application)
                    
                    <!-- Begin Individual Application Block -->
                    <div class="col-md-12 dashboard-application-header">
                        <h4>

                            <a href="{{{ action('UsersController@show', $application->user->id) }}}">
                                {{ $application->user->fullname }}
                            </a> | 
                            <a href="{{{ action('CoursesController@show', $application->course->id) }}}">
                                {{ $application->course->designation }}
                            </a>
                            <!-- Include Buttons For Application Administration -->
                            @include('applications.partials.dashboard-buttons')

                        </h4>
                    </div>

                    <div id="application_{{$application->id}}" class="col-md-12 dashboard-application-box">

                        <!-- Approve/Deny -->
                        @include('applications.partials.approve-deny-buttons')

                        <p> <strong> Applying to: </strong>  {{ $application->course->designation }}                      </p>
                        <p> <strong> Submitted at: </strong> {{ $application->created_at }}</p>

                        <p> <strong> Employment status: </strong> {{ ucfirst($application->employment_status) }}   </p>
                        
                        @if ($application->resume_path)
                            <p> <strong> Link to resume: </strong> {{ $application->resume_path }} </p>
                        @else 
                            <p> <strong> Link to resume: </strong> No resume uploaded. </p>
                        @endif

                        <p> <strong> Financing: </strong> {{ ucfirst($application->financing_status) }}            </p>
                        <p> <strong> Referred by: </strong> {{ ucfirst($application->referred_by) }}               </p>
                        <p> <strong> Background Info: </strong> {{ $application->bg_info }}                        </p>
                        <p> <strong> Questions: </strong> {{ $application->questions }}                            </p>
                    
                    </div>
                    <!-- End Individual Application Block -->

                    <!-- Include Modal For Contact Info -->
                    @include('applications.modals.contact')

                    <!-- Include Modal For Send Email -->
                    @include('applications.modals.message')

                    <!-- Include Modal For Comments -->
                    @include('applications.modals.add-comment')

                    @endforeach
                @endif
            </td>
        </tr>
    </table>
</div> <!-- End Panel -->
<!-- End Applications -->