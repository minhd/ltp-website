@if(count($projects) == 0)
    <div class="alert alert-danger">No projects, create some</div>
@endif
@foreach ($projects as $project)
    <div class="panel panel-default">
        <div class="panel-heading">{{ $project->title }}</div>
        <div class="panel-body">
            {{ $project->description }}
        </div>
        @if (auth()->user())
            <div class="panel-body">
                @if (!in_array(auth()->user()->id, $project->contributors->pluck('pivot')->pluck('user_id')->all()))
                    <a href="{{ url('join/'.$project->id) }}">Join</a>
                @else
                    <span class="text-muted"><i class="glyphicon glyphicon-check"></i>Joined</span>
                @endif
            </div>
        @endif
    </div>
@endforeach