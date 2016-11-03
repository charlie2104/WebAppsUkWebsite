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
		<div class = "navbar">
			<?php
				if ($_SESSION['loggedin'] == true) {
					echo '<span class = "navlinks">';
					echo 	'<form id="logoutForm" method = "post">';
					echo 		'<button type="submit" id = "logout" name = "logout">log out</button>';
					echo 	'</form>';
					echo 	'<a href = "diary.php"><p class = "usernameText">'.$_SESSION['username'].'</p></a>';
					echo '</span>';
				} else {
					echo '<span class = "navlinks">';
					echo 	'<ul>';
					echo		'<li><button type="button" id = "login">log in</button></li>';
					echo		'<li><button type="button" id = "signup">sign up</button></li>';
					echo 	'</ul>';
					echo '</span>';
				}
				if ($_SERVER['REQUEST_METHOD'] === 'POST') {
					if (isset($_POST['logout'])) {
						$_SESSION['loggedin'] = false;
						header("Refresh:0");
					}
				}
			?>
			<p id = 'logo'>myNotes</p>
		</div>
		<div class= 'main'>
		</div>
		<?php if ($_SESSION['loggedin'] == true): ?>
				<script type="text/javascript" src = "../JavaScript/logOut.js"></script>
		<?php else: ?>
				<script type="text/javascript" src = "../JavaScript/script.js"></script>
		<?php endif; ?>	
	</body>
</html>