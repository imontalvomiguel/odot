
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Odot</title>

	<!-- Bootstrap core CSS -->
	<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

	<!-- Custom styles for this template -->
	<link href="{{ asset('css/sticky-footer-navbar.css') }}" rel="stylesheet">
</head>

<body>

	<!-- Fixed navbar -->
	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<a class="navbar-brand" href="{{ route('todos.index') }}">Odot</a>
			</div>
			<div id="navbar" class="navbar-collapse collapse">
        		{{ Form::open(array('route' => 'login', 'method' => 'post', 'class' => 'navbar-form navbar-right')) }}
            		<div class="form-group">
              			{{ Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Email']) }}
            		</div>
            		<div class="form-group">
              			{{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) }}
            		</div>
            		{{ Form::submit('Sign in', ['class' => 'btn btn-success']) }}
          		{{ Form::close() }}
        	</div>
		</div>
	</nav>

	<!-- Begin page content -->
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				@if (Session::has('message'))
					<p class="bg-success">
						{{{ Session::get('message') }}}
					</p>
				@endif
				@yield('content')
			</div>
		</div>
	</div>

	<footer class="container no-padding">
		<hr>
		<div class="col-xs-12">
		    <p>© Company {{{ date('Y') }}}</p>
		</div>
	</footer>


	<!-- Bootstrap core JavaScript
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	{{ HTML::script('http://code.jquery.com/jquery-2.1.4.min.js') }}
	{{ HTML::script('js/app.js') }}
</body>
</html>
