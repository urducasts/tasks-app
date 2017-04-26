@extends('layouts.master')

@section('content')

	<div class="col-md-7">
		<h2 class="mb-3">All Tasks {{ request('by') ? 'by ' . request('by') : '' }}</h2>
		<ul class="list-group">
			@forelse($tasks as $task)
				<li class="list-group-item justify-content-between {{ $task->completed ? 'completed' : '' }}" title="{{ $task->body }}">
					<div>
						<a href="/?by={{ $task->user->name }}">
							<img src="http://gravatar.com/avatar/{{ md5($task->user->email) }}?s=40" class="rounded">
						</a>
						<span class="ml-2 title">{{ $task->title }}</span>
					</div>

					<div class="form-inline">
						<form id="update" method="POST" action="/tasks/{{ $task->id }}">
							{{ csrf_field() }}
							{{ method_field('PATCH') }}
							<button type="submit" class="btn btn-outline-success btn-sm mr-2">Complete</button>
						</form>

						<form id="delete" method="POST" action="/tasks/{{ $task->id }}" onsubmit="return confirm('Are you sure?'); ">
							{{ csrf_field() }}
							{{ method_field('DELETE') }}
							<button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
						</form>
					</div>
				</li>

			@empty
				<p>There are no tasks at this time.</p>
			@endforelse
		</ul>

		<div class="mt-3">
			{{ $tasks->appends(request()->query())->links() }}
		</div>
	</div>

	<div class="col-md-5">
		<h3>Add New Task</h3>

		@include('partials.form')
	</div>

@endsection