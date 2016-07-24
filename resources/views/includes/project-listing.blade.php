@if(count($projects) == 0)
    <div class="alert alert-danger">No projects, create some</div>
@endif
@foreach ($projects as $project)
    <div class="panel panel-default">
        <div class="panel-heading">{{ $project->title }}</div>
        <div class="panel-body">
            {{ $project->description }}
        </div>
        <div class="panel-body">

        </div>
    </div>
@endforeach