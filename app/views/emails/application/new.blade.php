<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        
        <!-- Include application information, with resume and "approve application" link. -->
        
        <h3 class="page-header">{{ $user->fullname }} | Application #{{ $application->id }}</h3>

        @if ($application->user->img_path)
            <div class="">
                <img class="img-responsive" src="{{$user->img_path }}">
            </div>
        @endif
        
        <p> <strong> Submitted at: </strong> {{ $application->created_at }}</p>
        <p> <strong> Applying to: </strong>  {{ $application->course->name }}</p>
        
        <p> <strong> Phone: </strong> {{ $user->phone }}</p>
        <p> <strong> Email: </strong> {{ $user->email }}</p>
        <p> <strong> Address: </strong> {{ $user->address }}</p>

        <p> <strong> Employment status: </strong> {{ ucfirst($application->employment_status) }}</p>
        
        @if ($application->resume_path)
            <!-- <p> <strong> Link to resume: </strong> <a href="http://{{ $_ENV['URL'] . $application->resume_path }}"> Here. </a></p> -->
        @else 
            <p> <strong> Link to resume: </strong> No resume uploaded. </p>
        @endif

        <p> <strong> Financing: </strong> {{ ucfirst($application->financing_status) }}            </p>
        <p> <strong> Referred by: </strong> {{ ucfirst($application->referred_by) }}               </p>
        <p> <strong> Background Info: </strong> {{ $application->bg_info }}                        </p>
        <p> <strong> Questions: </strong> {{ $application->questions }}


    </body>
</html>