<!DOCTYPE html>
<html>
<head>
	<title>Tasks</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
</head>
<body>

	<nav class="navbar navbar-toggleable-md navbar-light bg-faded">
		<div class="container">
			<a class="navbar-brand" href="#">Tasks</a>

			<div class="collapse navbar-collapse" id="navbarTogglerDemo02">
				<ul class="navbar-nav ml-auto mt-2 mt-md-0">
					<li class="nav-item active">
						<a class="nav-link" href="/">Home</a>
					</li>
					<li class="nav-item active">
						<a class="nav-link" href="/">Tasks</a>
					</li>
					<li class="nav-item active">
						<a class="nav-link" href="/">Add New Task</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>

	<div class="container mt-4">
		<div class="row">
			<div class="col-md-7">
				<h2 class="mb-3">All Tasks</h2>
				<ul class="list-group">
					@foreach($tasks as $task)
						<li class="list-group-item" title="{{ $task->body }}">
							<img src="http://gravatar.com/avatar/{{ md5($task->user->email) }}?s=40" class="rounded">
							<span class="ml-2">{{ $task->title }}</span>
						</li>
					@endforeach
				</ul>

				<div class="mt-3">
					{{ $tasks->links() }}
				</div>
			</div>

			<div class="col-md-5">
				<h2>Add New Task</h2>
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
			</div>
		</div>
	</div>

</body>
</html>
