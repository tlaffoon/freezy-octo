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

                            <!-- Display Gender Icon -->
                            @if($application->user->gender == 'male')
                                <i class="fa fa-mars"></i>
                            @elseif($application->user->gender == 'female')
                                <i class="fa fa-venus"></i>
                            @endif

                            <!-- Display User Info & Cohort -->
                            {{ $application->user->fullname }} | {{ $application->course->designation }}

                            <!-- Include Buttons For Application Administration -->
                            @include('partials.applications.BtnGroup')

                        </h4>
                    </div>

                    <div id="application_{{$application->id}}" class="col-md-12 dashboard-application-box">

                        <div class="pull-right">
                            {{ Form::open(array('url' => '/dashboard/applications/', 'method' => 'POST')) }}
                                {{ Form::hidden('id', $application->id) }}
                                {{ Form::hidden('deny', true) }}
                                {{ Form::button('<i class="fa fa-thumbs-o-down"></i>', array('type' => 'submit', 'class' => 'btn btn-default approveBtn'))}}
                            {{ Form::close() }}
                        </div>

                        <div class="pull-right"
                            {{ Form::open(array('url' => '/dashboard/applications/', 'method' => 'POST')) }}
                                {{ Form::hidden('id', $application->id) }}
                                {{ Form::hidden('approve', true) }}
                                {{ Form::button('<i class="fa fa-thumbs-o-up"></i>', array('type' => 'submit', 'class' => 'btn btn-default approveBtn'))}}
                            {{ Form::close() }}
                        </div>

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
                    @include('partials.applications.userContactModal')

                    <!-- Include Modal For Contact Info -->
                    @include('partials.applications.userMessageModal')


                    @endforeach
                @endif
            </td>
        </tr>
    </table>
</div> <!-- End Panel -->
<!-- End Applications