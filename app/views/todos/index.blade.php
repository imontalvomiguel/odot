@extends('layouts.master')
@section('content')
	<h2>All todo lists</h2>
	@foreach ($todo_lists as $todo_list)
	<h4>{{ link_to_route('todos.show', $todo_list->name, [$todo_list->id]) }}</h4>
	<ul class="list-inline">
		<li class="no-padding">
			{{ link_to_route('todos.edit', 'Edit', $todo_list->id, ['class' => 'btn btn-info btn-xs']) }}
		</li>
		<li class="no-padding">
			{{ Form::model($todo_list, array('route' => array('todos.destroy', $todo_list->id), 'method' => 'DELETE')) }}
				{{ Form::submit('Destroy', ['class' => 'btn btn-danger btn-xs']) }}
			{{ Form::close() }}
		</li>
	</ul>
	@endforeach
	<br>
	{{ link_to_route('todos.create', 'Create new list', null, ['class' => 'btn btn-success']) }}
@stop