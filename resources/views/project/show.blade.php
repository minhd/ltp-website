@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ $project->title }}</div>

                    @if ($project->isOwnedBy(auth()->user()->id))
                        <div class="panel-body">
                            <a href="{{ url('projects/'.$project->id.'/edit') }}">Edit</a>
                        </div>
                    @endif

                    <div class="panel-body">
                        {!! Markdown::convertToHtml($project->description) !!}
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection