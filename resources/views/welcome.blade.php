@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            @include('includes.project-listing')
        </div>

        <div class="col-md-4">
            @include('includes.profile-sidebar')
        </div>
    </div>
</div>
@endsection