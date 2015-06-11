<div class="form-group">
    {{ Form::label('name', 'List title') }}
	{{ Form::text('name', null, array('class' => 'form-control')) }}
    {{ $errors->first('name', '<p class="text-danger">:message</p>') }}
</div>
{{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}