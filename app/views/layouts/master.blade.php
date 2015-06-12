
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
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="{{ route('todos.index') }}">Odot</a>
			</div>
			<div id="navbar" class="navbar-collapse collapse">
				@if (Auth::check())
          		<ul class="nav navbar-nav navbar-right">
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#">
							<span class="glyphicon glyphicon-user"></span> {{{ Auth::user()->name }}} <span class="caret"></span>
						</a>
						<ul class="dropdown-menu">
							<li><a href="#!"><span class="glyphicon glyphicon-cog"></span> Edit account</a></li>
							<li><a href="{{ route('logout') }}"><span class="glyphicon glyphicon-off"></span> Log out</a></li>
						</ul>
					</li>
		        </ul>
		        @else 
        		{{ Form::open(array('route' => 'login', 'method' => 'post', 'class' => 'navbar-form navbar-right')) }}
            		<div class="form-group">
              			{{ Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Email']) }}
            		</div>
            		<div class="form-group">
              			{{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) }}
            		</div>
            		{{ Form::submit('Sign in', ['class' => 'btn btn-success']) }}
          		{{ Form::close() }}		
          		@endif        
        	</div>
		</div>
	</nav>

	<!-- Begin page content -->
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				@if (Session::has('message'))
					<div class="alert alert-{{{ Session::has('class') ? Session::get('class') : 'info' }}} alert-dismissible fade in" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
						{{{ Session::get('message') }}}
					</div>
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
	{{ HTML::script('js/bootstrap.min.js') }}
	{{ HTML::script('js/app.js') }}
</body>
</html>
