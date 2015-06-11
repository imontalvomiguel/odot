@extends('layouts.master')

@section('content')
	{{ Form::model($todo_item, array('route' => array('todos.items.update', $todo_list_id, $todo_item->id), 'method' => 'PUT')) }}
		@include('items.partials._form')
	{{ Form::close() }}
@stop