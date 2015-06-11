@extends('layouts.master')

@section('content')
	<h1>{{{ $list->name }}}</h1>
	@foreach ($items as $item)
		@if ($item->completed_on)
			<h4><del>{{{ $item->content }}}</del></h4>
		@else
			<h4>{{{ $item->content }}}</h4>
		@endif
		<ul class="list-inline">
			<li class="no-padding">
				{{ link_to_route('todos.items.edit', 'Edit', [$list->id, $item->id], ['class' => 'btn btn-info btn-xs']) }}
			</li>
			@if (!$item->completed_on)
			<li class="no-padding">
				{{ Form::model($item, array('route' => array('todos.tasks.complete', $list->id, $item->id), 'method' => 'PATCH')) }}
					{{ Form::submit('Complete', ['class' => 'btn btn-success btn-xs']) }}
				{{ Form::close() }}
			</li>
			@endif
			<li class="no-padding">
				{{ Form::model($item, array('route' => array('todos.items.destroy', $list->id, $item->id), 'method' => 'DELETE')) }}
					{{ Form::submit('Destroy', ['class' => 'btn btn-danger btn-xs']) }}
				{{ Form::close() }}
			</li>
		</ul>
	@endforeach
	<br>
	{{ link_to_route('todos.items.create', 'Create task', $list->id, ['class' => 'btn btn-success']) }}
	{{ link_to_route('todos.index', 'Back', null, ['class' => 'btn btn-default']) }}
@stop