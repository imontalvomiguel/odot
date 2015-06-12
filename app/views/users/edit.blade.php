@extends('layouts.master')

@section('content')
	<div class="col-md-6 col-md-offset-3">
	<h3>Account</h3>
	{{ Form::model($user, array('route' => array('users.update', $user->id), 'method' => 'PUT')) }}
		@include('users.partials._form')
		{{ Form::submit('Update', ['class' => 'btn btn-success']) }}
	{{ Form::close() }}
	</div>
@stop