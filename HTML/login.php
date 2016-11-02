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
			$db = mysqli_select_db($conn,"mynotes");
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
						//getting the values from the text boxes
				        $inputUserName = $_POST['username'];
				        $inputUserPassword =  $_POST['password'];
						
						//selecting all of the data from the table
						$sql = "SELECT usersId, userName, password FROM users";
						$result = mysqli_query($conn, $sql);

   						//checking to see if there are rows in the databse
						if (mysqli_num_rows($result) > 0) {
						    while($row = mysqli_fetch_assoc($result)) {   //loops through the rows in the databse
						    	//sets the username from the row to a variable
						        $dbUserName = $row["userName"];
						        //if the inputted username is the same as the username in the curent row
						        if ($dbUserName == $inputUserName) {
						        	echo $inputUserName;
						        	//sets the password from the row to a variable
						        	$dbPassword = $row["password"];
						        	//if the inputted password is the same as the pasword in the curent row log them in
						        	if ($dbPassword == $inputUserPassword){
						        		echo $inputUserPassword;
						        	}
						        	else{
						        		echo "incorrect password";
						        	}
						        }else{
						        	echo "incorrect username";
						        }
						    }
						} else {
						    echo "0 results";
						}
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