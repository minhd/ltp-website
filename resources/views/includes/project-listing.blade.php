@foreach ($projects as $project)
    <div class="panel panel-default">
        <div class="panel-heading">{{ $project->title }}</div>
        <div class="panel-body">
            {{ $project->description }}
        </div>
    </div>
@endforeach