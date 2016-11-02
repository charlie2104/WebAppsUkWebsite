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

			function validateEmail($email){
				// Remove all illegal characters from email
				$email = filter_var($email, FILTER_SANITIZE_EMAIL);

				// Validate e-mail
				if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
				    return true;
				} else {
				    return false;
				}
			}
		?>
	</head>
	<body>
		<div class = 'navbar'>
			<p id = 'logo'><a href="index.php">myNotes</a></p>
		</div>
		<div class= 'main'>

			<h2 class = "signUp_heading">make an account</h2>
			<hr />
			<form class = 'signup' method="post" accept="\">
				<label>user name: </label>
				<input type="text" name="username" id="username" class = "textBar">
				<label>email: </label>
				<input type="text" name="email" id="email" class = "textBar">
				<label>password: </label>
				<input type="password" name="password" id="password" class = "textBar">
				<label>confirm password: </label>
				<input type="password" name="cpassword" id="cpassword" class = "textBar">
				<button type = "submit" id = "signUpButton" name = "signUpButton">sign up!</button>
			</form>
			<?php
				if ($_SERVER['REQUEST_METHOD'] === 'POST') { //starts if the html issues a pull request
					if (isset($_POST['signUpButton'])) {  //starts if the signup button is pressed
						//initialising variables
						$userNameCount = 0;
						$chosenUserName = $_POST['username'];
						$chosenEmail = $_POST['email'];
						$chosenPassword = $_POST['password'];
						$confirmPassword = $_POST['cpassword'];
						//checks to see if the fields have data in them
						if ($chosenUserName == "" or $chosenEmail == "" or $chosenPassword == "" or $confirmPassword == ""){
							alertUser("all fields must be filled in");
						} else{
							if ($chosenPassword == $confirmPassword){  //checks to see password is the same as the confirm password
								if (validateEmail($chosenEmail)) {  //checks to see if the email is valid
									$getValues = "SELECT usersId, userName, password FROM users";
									$result = mysqli_query($conn, $getValues);
									if (mysqli_num_rows($result) > 0) {   //checks that the table is populated
									    while($row = mysqli_fetch_assoc($result)) {
									    	$dbUserName = $row["userName"];
									    	if ($dbUserName == $chosenUserName){   //final check to see if username is allready taken
									    		$userNameCount += 1;   //if username taken then userNameCount will not be zero
									    	}
									    }
									    //this is outside the while loop to stope it creating multile data entries
									    if ($userNameCount == 0){   //if userNameCount is 0 the username was not taken
										    $addUser = "INSERT INTO users (userName, password, email) VALUES ('$chosenUserName', '$chosenPassword', '$chosenEmail')"; //MySQL code for inserting the values
											if (mysqli_query($conn, $addUser)) { //if data is successfully added
												alertUser("signed up!");
											} 
										} else{
											alertUser("that username has been taken");
										}
									}
								} else{
									alertUser("that email adress is not valid");
								}
							} else{
								alertUser("the passwords do not match");
							}
						}
					}
				}

			?>
		</div>
	</body>
</html>