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
			<?php
				echo $_SESSION['loggedin'];
				if ($_SESSION['loggedin'] == true) {
					echo '<button type="button" id = "logout" method = "post">log out</button>';
				} else {
					echo '<span id = "navlinks">';
					echo 	'<ul>';
					echo		'<li><button type="button" id = "login">log in</button></li>';
					echo		'<li><button type="button" id = "signup">sign up</button></li>';
					echo 	'</ul>';
					echo '</span>';
				}
			?>
			<p id = 'logo'>myNotes</p>
		</div>
		<div class= 'main'>
		</div>
		<?php
			if ($_SESSION['loggedin'] == true) {
				echo '<script type="text/javascript" src = "../JavaScript/logOut.js"></script>';
			} else {
				echo '<script type="text/javascript" src = "../JavaScript/script.js"></script>';
			}
		?>
	</body>
</html>