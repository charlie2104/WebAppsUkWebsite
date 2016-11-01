<!DOCTYPE html>
<html>
	<head>
		<title>myNotes</title>
		<link rel="stylesheet" type="text/css" href="../CSS/styling.css">
		<?php
		// Create connection
			$servername = "localhost";
			$username = "root";
			$password = "";
			$conn = new mysqli($servername, $username, $password);
		?>
	</head>
	<body>
		<div class = 'navbar'>
			<p id = 'logo'><a href="index.php">myNotes</a></p>
		</div>
		<div class= 'main'>
			<h2>Log in!</h2>
			<hr />
			<form class = 'login' method="post" accept="\">
				<label>user name: </label>
				<input type="text" name="username" id="username">
				<label>password: </label>
				<input type="password" name="password" id="password">
				<button type = "submit" name = "logInButton" id = "logInButton">log in!</button>
			</form>

			<?php
				if ($_SERVER['REQUEST_METHOD'] === 'POST') {
					if (isset($_POST['logInButton'])) {
				        $inputUserName = $_POST['username'];
				        $inputUserPassword =  $_POST['password'];
				    } else {
				        echo "failed";
				    }
				}
			?>
		</div>
		<script type="text/javascript" src = "../JavaScript/script.js"></script>
		<script type="text/javascript" src = "../JavaScript/logInValidation.js"></script>
	</body>
</html>