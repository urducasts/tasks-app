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
			<div class="col-md-12">
				<h2 class="mb-3">All Tasks</h2>
				<ul class="list-group">
					@foreach($tasks as $task)
						<li class="list-group-item">{{ $task->title }}</li>
					@endforeach
				</ul>
			</div>
		</div>
	</div>

</body>
</html>
