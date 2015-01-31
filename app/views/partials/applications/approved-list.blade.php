<h3 class="page-header">Recently Approved
    <!-- <div class="pull-right"><small>{{ count($approvedApplications) }}</div> -->
</h3>

<div class="panel panel-default">
    <table class="table table-striped">
        <tr>
            <td>
                <!-- Display if no applications present. -->
                @if (!$approvedApplications)

                    <h4> There are no approved applications. </h4>

                @else

                    @foreach ($approvedApplications as $application)
                    <!-- Begin Individual Application Block -->
                    <div class="col-md-12 dashboard-application-header">
                        <h4>{{ $application->user->fullname }} | {{ $application->course->designation }}

                            <!-- Include Buttons For Application Administration -->
                            @include('partials.applications.dashboard-buttons')

                        </h4>
                    </div>

                    <div id="application_{{$application->id}}" class="col-md-12 dashboard-application-box">
                        
                        <div class="col-sm-6 pull-right">

                            <!-- Assign Student to Cohort Dropdown -->
                            <p>Assign Student to Cohort?</p>

                                {{ Form::model($user, array('url' => array('/assignCourse'), 'class'=>'form', 'role'=>'form', 'method' => 'POST')) }}
                                  
                                    {{ Form::select('assigned_course_id', $course_list, null, array('class' => 'form-group form-control')) }}
                                    
                                    {{ Form::hidden('user_id', $application->user->id) }}

                                    {{ Form::submit('Assign', array('class' => 'btn btn-default btn-success pull-right')) }}

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
                    @include('partials.applications.modals.contact')

                    <!-- Include Modal For Send Email -->
                    @include('partials.applications.modals.message')

                    <!-- Include Modal For Comments -->
                    @include('partials.applications.modals.add-comment')

                    @endforeach

                @endif
            </td>
        </tr>
    </table>
</div> <!-- End Panel -->
<!-- End Applications