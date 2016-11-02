<!DOCTYPE html>
<html>
	<head>
		<title>myNotes</title>
		<link rel="stylesheet" type="text/css" href="../CSS/styling.css">
		<?php 
			session_start();

		?>
	</head>
	<body>
		<div class = 'navbar'>
			<span id = 'navlinks'>
				<ul>
					<li><button type="button" id = 'login'>log in</button></li>
					<li><button type="button" id = 'signup'>sign up</button></li>
				</ul>
			</span>
			<p id = 'logo'>myNotes</p>
		</div>
		<div class= 'main'>
		</div>
		<script type="text/javascript" src = "../JavaScript/script.js"></script>
	</body>
</html>