<div class="form-group">
	{{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Full name']) }}
	{{ $errors->first('name', '<p class="help-block">:message</p>') }}
</div>
<div class="form-group">
	{{ Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email']) }}
	{{ $errors->first('email', '<p class="help-block">:message</p>') }}
</div>
<div class="form-group">
	{{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) }}
	{{ $errors->first('password', '<p class="help-block">:message</p>') }}
</div>
{{ Form::submit('Sign up for Odot', ['class' => 'btn btn-success btn-block']) }}