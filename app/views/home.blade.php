@extends('layouts.master')

@section('content')
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <!-- Jumbotron -->
    <div class="jumbotron">
    	<div class="row">
    		<div class="col-md-8">
		        <h1>Keep your life in sync</h1>
		        <p class="lead">Odot is the easiest way to get stuff done. Whether you’re planning a holiday, sharing a shopping list with a partner or managing multiple work projects, Odot is here to help you tick off all your personal and professional to-dos.</p>
    		</div>
    		<div class="col-md-4 sign-up-container">
    			<h3>New to Odot? <span>Sign up</span></h3>
    			{{ Form::open() }}
    				<div class="form-group">
    					{{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Full name']) }}
  					</div>
  					<div class="form-group">
    					{{ Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email']) }}
  					</div>
  					<div class="form-group">
    					{{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) }}
  					</div>
  					{{ Form::submit('Sign up', ['class' => 'btn btn-success']) }}
				{{ Form::close() }}
    		</div>
    	</div>

     </div>
@stop