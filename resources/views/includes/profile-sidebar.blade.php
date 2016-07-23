@if(Auth::guest())
    <div class="panel">
        <div class="panel-body">
            <a href="{{ url('/auth/github') }}">Login with GitHub</a>
        </div>
    </div>
@else
    <div class="panel panel-default">
        <div class="panel-heading">{{ auth()->user()->name }}</div>
        <div class="panel-body">
            <img src="{{ auth()->user()->github()->avatar }}" alt="" class="img-circle img-responsive img-thumbnail" style="width:40px;">
        </div>
        <div class="panel-body">
            <a href="" class="btn btn-primary">Create New Project</a>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">Your Projects</div>
        <div class="panel-body">
            @if(count(auth()->user()->projects) == 0)
                Join a project to start contributing
            @endif
            <ul>
            @foreach(auth()->user()->projects as $project)
                <li>{{ $project->title }}</li>
            @endforeach
            </ul>
        </div>
    </div>
@endif