<!DOCTYPE html>
<html>
	<head>
		<title>myNotes</title>
		<link rel="stylesheet" type="text/css" href="../CSS/styling.css">
		<?php
			session_start();
			// Create connection
			$servername = "localhost";
			$username = "root";
			$password = "";
			$conn = new mysqli($servername, $username, $password);
			$db = mysqli_select_db($conn,"mynotes");

			function alertUser($message){
				echo '<script language="javascript">alert("' . $message . '")</script>';
			}
		?>
	</head>
	<body>
		<div class = 'navbar'>
			<p id = 'logo'><a href="index.php">myNotes</a></p>
		</div>
		<div class= 'main'>
			<h2 class = "signUp_heading">Log in!</h2>
			<hr />
			<form class = 'login' method="post" accept="\">
				<label>user name: </label>
				<input type="text" name="username" id="username" class = "textBar">
				<label>password: </label>
				<input type="password" name="password" id="password" class = "textBar">
				<button type = "submit" name = "logInButton" id = "logInButton">log in!</button>
			</form>

			<?php
				if ($_SERVER['REQUEST_METHOD'] === 'POST') {
					if (isset($_POST['logInButton'])) {
						//initialising a count variable
						$count = 0;
						//getting the values from the text boxes
				        $inputUserName = $_POST['username'];
				        $inputUserPassword =  $_POST['password'];
						
						//selecting all of the data from the table
						$getValues = "SELECT usersId, userName, password FROM users";
						$result = mysqli_query($conn, $getValues);

   						//checking to see if there are rows in the databse
						if (mysqli_num_rows($result) > 0) {
						    while($row = mysqli_fetch_assoc($result)) {   //loops through the rows in the databse
						    	//sets the username from the row to a variable
						        $dbUserName = $row["userName"];
						        //if the inputted username is the same as the username in the curent row
						        if ($dbUserName == $inputUserName) {
						        	$count += 1;
						        	//sets the password from the row to a variable
						        	$dbPassword = $row["password"];
						        	//if the inputted password is the same as the pasword in the curent row log them in
						        	if ($dbPassword == $inputUserPassword){
						        		$count += 1;
						        		alertUser("logged in");
						        		$_SESSION['loggedin'] = true;
    									$_SESSION['username'] = $inputUserName;
    									$_SESSION['usersID'] = $row["usersID"];
						        		header('Location: diary.php');
						        		 
						        	}
						    	}	
							}
						} else {
						    alertUser("0 results");
						}
						if ($count == 1){ 
							alertUser("incorrect password");
							$count = 0;
						} elseif ($count == 0) {
							alertUser("incorrect user name");
							$count = 0;
						}
				    } else {
				        alertUser("failed");
				    }
				}
			?>

		</div>
		<script type="text/javascript" src = "../JavaScript/script.js"></script>
		<script type="text/javascript" src = "../JavaScript/logInValidation.js"></script>
	</body>
</html>