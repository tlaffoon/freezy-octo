<!-- Applications -->
<h3 class="page-header">Denied Applications
    <div class="pull-right"><small>{{ count($deniedApplications) }}</div>
</h3>

<div class="panel panel-default">
    <table class="table table-striped">
        <tr>
            <td>
                <!-- Display if no applications present. -->
                @if (!$deniedApplications)

                    <h4> There are no denied applications. </h4>

                @else

                    @foreach ($deniedApplications as $application)
                    <!-- Begin Individual Application Block -->
                    <div class="col-md-12 dashboard-application-header">
                        <h4>{{ $application->user->fullname }} | {{ $application->course->designation }}

                            <!-- Include Buttons For Application Administration -->
                            {{-- @include('partials.applications.BtnGroup') --}}

                        </h4>
                    </div>

                    <div id="application_{{$application->id}}" class="col-md-12 dashboard-application-box">
                        
                        <div class="btn-group pull-right">

                            {{ Form::open(array('url' => '/dashboard/applications/', 'method' => 'POST')) }}
                                {{ Form::hidden('id', $application->id) }}
                                {{ Form::hidden('approve', true) }}
                                {{ Form::button('<span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span>', array('type' => 'submit', 'class' => 'btn btn-default approveBtn'))}}
                            {{ Form::close() }}

                            {{ Form::open(array('url' => '/dashboard/applications/', 'method' => 'POST')) }}
                                {{ Form::hidden('id', $application->id) }}
                                {{ Form::hidden('deny', true) }}
                                {{ Form::button('<span class="glyphicon glyphicon-thumbs-down" aria-hidden="true"></span>', array('type' => 'submit', 'class' => 'btn btn-default approveBtn'))}}
                            {{ Form::close() }}
                            <!-- <a href="" id="approveApplication{{$application->id}}" class="btn btn-default approveBtn" data-toggle="tooltip" data-placement="top" title="Approve">
                                <span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span>
                            </a> -->
                            <!-- <button id="denyApplication{{$application->id}}" class="btn btn-default denyBtn" data-toggle="tooltip" data-placement="top" title="Deny">
                                <span class="glyphicon glyphicon-thumbs-down" aria-hidden="true"></span>
                            </button> -->
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
                    @endforeach
                @endif
            </td>
        </tr>
    </table>
    <div class="text-center">
        {{ $deniedApplications->links() }}
    </div>
</div> <!-- End Panel -->
<!-- End Applications -->