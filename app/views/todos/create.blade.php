@extends('layouts.master')

@section('content')
	{{ Form::open(array('route' => 'todos.store')) }}
		@include('todos.partials._form')
	{{ Form::close() }}
@stop