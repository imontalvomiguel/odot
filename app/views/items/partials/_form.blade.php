<div class="form-group">
    {{ Form::label('content', 'Task') }}
	{{ Form::text('content', null, array('class' => 'form-control')) }}
    {{ $errors->first('content', '<p class="text-danger">:message</p>') }}
</div>
{{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}