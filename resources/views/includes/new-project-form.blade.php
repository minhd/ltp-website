<form action="{{ url('projects') }}" method="post" role="form">
	<legend>Form Title</legend>

    <input type="hidden" name="_token" value="{{ csrf_token() }}">
	<div class="form-group">
		<label for="title" class="col-sm-2">Title</label>
		<input type="text" class="form-control" name="title" id="" placeholder="Project Title...">
	</div>

    <div class="form-group">
        <label for="description" class="col-sm-2">Description</label>
        <textarea name="description" class="form-control" placeholder="Project Description"></textarea>
    </div>

	<button type="submit" class="btn btn-primary">Submit</button>
</form>