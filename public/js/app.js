$(document).ready(function() {
	// confirm all destroys
	$('form').submit(function(e) {
		var method = $(this).children(':hidden[name=_method]').val();
		if (method && method == 'DELETE') {
			if ( !confirm('Are you sure?')) {
				e.preventDefault();
			}
		}
	});
});