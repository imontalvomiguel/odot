@extends('layouts.master')

@section('content')
	<div class="col-md-6 col-md-offset-3">
	<h1>Account settings</h1>
	{{ Form::model($user, array('route' => array('user.update'), 'method' => 'PUT')) }}
		@include('users.partials._form')
		{{ Form::submit('Update', ['class' => 'btn btn-success btn-block']) }}		
	{{ Form::close() }}
	<hr>
	{{ Form::model($user, array('route' => array('user.destroy'), 'method' => 'DELETE')) }}
		{{ Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) }}		
	{{ Form::close() }}
	</div>
@stop