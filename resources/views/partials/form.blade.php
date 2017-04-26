	<form method="POST" action="/tasks/create">
		{{ csrf_field() }}
		<div class="form-group {{ $errors->has('title') ? 'has-danger' : '' }}">
			<label for="title">Title:</label>
			<input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
			{!! $errors->first('title', '<div class="form-control-feedback">:message</div>') !!}
		</div>

		<div class="form-group {{ $errors->has('body') ? 'has-danger' : '' }}">
			<label for="body">Body:</label>
			<input type="text" class="form-control" id="body" name="body">
			{!! $errors->first('body', '<div class="form-control-feedback">:message</div>') !!}
		</div>

		<div class="form-group {{ $errors->has('user_id') ? 'has-danger' : '' }}">
			<label for="user_id">Assing To:</label>
			<select class="form-control" id="user_id" name="user_id">
				@foreach($users as $user)
					<option value="{{ $user->id }}">{{ $user->name }}</option>
				@endforeach
			</select>
			{!! $errors->first('user_id', '<div class="form-control-feedback">:message</div>') !!}
		</div>

		<button type="submit" class="btn btn-primary">Create Task</button>
	</form>