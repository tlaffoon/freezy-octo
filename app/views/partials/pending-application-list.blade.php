<!-- Applications -->
<h3 class="page-header">Pending Applications
    <div class="pull-right"><small>{{ count($applications) }}</div>
</h3>

<div class="panel panel-default">
    <table class="table table-striped">
        <tr>
            <td>
                <!-- Display if no applications present. -->
                @if (!$applications)

                    <h4> There are no pending applications. </h4>

                @else

                    @foreach ($applications as $application)
                    <!-- Begin Individual Application Block -->
                    <div class="col-md-12 dashboard-application-header">
                        <h4>{{ $application->user->fullname }} | Application #{{ $application->id }}

                            <!-- Include Buttons For Application Administration -->
                            @include('partials.applicationBtnGroup')

                        </h4>
                    </div>

                    <div id="application_{{$application->id}}" class="col-md-12 dashboard-application-box">
                        
                        <div class="btn-group pull-right">
                            <button id="approveApplication{{$application->id}}" class="btn btn-default approveBtn" data-id="{{$application->id}}" data-toggle="tooltip" data-placement="top" title="Approve">
                                <span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span>
                            </button>
                            <button id="denyApplication{{$application->id}}" class="btn btn-default denyBtn" data-toggle="tooltip" data-placement="top" title="Deny">
                                <span class="glyphicon glyphicon-thumbs-down" aria-hidden="true"></span>
                            </button>
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
                    @include('partials.userContactModal')

                    <!-- Include Hidden Form For Ajax Request -->
                    {{ Form::open(array('action' => 'ApplicationsController@processAjax', 'method' => 'POST', 'id' => "form" . $application->id)) }}
                        {{ Form::hidden('applicationID', $application->id) }}
                    {{ Form::close() }}

                    @endforeach
                @endif
            </td>
        </tr>
    </table>
</div> <!-- End Panel -->
<!-- End Applications -->