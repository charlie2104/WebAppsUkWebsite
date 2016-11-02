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

			<h2>make an acount</h2>
			<hr />
			<form class = 'signup' method="post" accept="\">
				<label>user name: </label>
				<input type="text" name="username" id="username">
				<label>email: </label>
				<input type="text" name="email" id="email">
				<label>password: </label>
				<input type="password" name="password" id="password">
				<label>confirm password: </label>
				<input type="password" name="cpassword" id="cpassword">
				<button type = "submit" id = "signUpButton" name = "signUpButton">sign up!</button>
			</form>
			<?php
				if ($_SERVER['REQUEST_METHOD'] === 'POST') {
					if (isset($_POST['signUpButton'])) {
						$chosenUserName = $_POST['username'];
						$chosenEmail = $_POST['email'];
						$chosenPassword = $_POST['password'];
						$confirmPassword = $_POST['cpassword'];
						if ($chosenPassword == $confirmPassword){

						} else{
							echo "the passwords do not match";
						}
					}
				}

			?>
		</div>
	</body>
</html>