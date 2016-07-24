<form action="{{ url('projects') }}" method="post" role="form">

    <input type="hidden" name="_token" value="{{ csrf_token() }}">

	<div class="form-group {{ $errors->has('title') ? "has-error" : "" }}">
		<label for="title" class="col-sm-2">Title</label>
		<input type="text" class="form-control" name="title" placeholder="Project Title" required>
        {!! $errors->first('title', '<span class="help-block">:message</span>') !!}
	</div>

    <div class="form-group {{ $errors->has('description') ? "has-error" : "" }}">
        <label for="description">Description</label>
        <textarea rows="15" name="description" class="form-control" placeholder="Project Description" required></textarea>
        {!! $errors->first('description', '<span class="help-block">:message</span>') !!}
    </div>

	<button type="submit" class="btn btn-primary">Submit</button>
</form>