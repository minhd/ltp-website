@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ $project->title }}</div>

                    <div class="panel-body">
                        <form action="{{ url('projects/'.$project->id) }}" method="post" role="form">

                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="_method" value="PUT">

                            <div class="form-group {{ $errors->has('title') ? "has-error" : "" }}">
                                <label for="title" class="col-sm-2">Title</label>
                                <input type="text" class="form-control" name="title" placeholder="Project Title" required value="{{ $project->title }}">
                                {!! $errors->first('title', '<span class="help-block">:message</span>') !!}
                            </div>

                            <div class="form-group {{ $errors->has('description') ? "has-error" : "" }}">
                                <label for="description">Description</label>
                                <textarea rows="15" name="description" class="form-control" placeholder="Project Description" required>{{ $project->description }}</textarea>
                                {!! $errors->first('description', '<span class="help-block">:message</span>') !!}
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection