<!DOCTYPE html>
<html>
<head>
	<title>Notes App</title>
	<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
	<link rel="stylesheet" type="text/css" href="assets/css/styles.css">
	<script>
		$(document).ready(function() {
			$.get("notes/index_get_notes", function(event) {
				$("#notes").html(event);
			});
			$(document).on('submit', 'form', function() {
				$.post("notes/submit", $(this).serialize(),function(event) {
					$('#notes').html(event);
				});
				return false;
			});
			$(document).on('change', 'textarea', function() {
				var id = $(this)[0].id;
				var postdata = $(this).serialize();
				postdata += "&id=" + id;
				$.post("notes/update", postdata, function(event) {
					$('#notes').html(event);
				});
				return false;
			});
		});
	</script>
</head>
<body>
	<div id="wrapper">
		<h3>Welcome to the Notes App!</h3>
		<p>Start a new note and click the text box to edit the description.</p>
		<div id="notes">
		</div>
		<div id="add_form">
			<form id="new" action="notes/submit" method="post">
				<input class="title" type="text" name="title" placeholder="Insert note title here...">
				<input type="submit" value="Add Note" class="btn">
			</form>
		</div>
	</div>

</body>
</html>