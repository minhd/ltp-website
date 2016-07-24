@extends('layouts.app')

@section('content')
    <div class="container">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">New Project</div>
                    <div class="panel-body">
                        @include('includes/new-project-form')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection