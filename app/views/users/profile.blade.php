@extends('layouts.master')

@section('content')
<div class="container">
    <div>
        @if(Auth::check())
            <p>Welcome to your profile page {{Auth::user()->first}} {{Auth::user()->last}}</p>
        @endif
    </div>
</div>
@stop