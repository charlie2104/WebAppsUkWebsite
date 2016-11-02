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

			function alertUser($message){
				echo '<script language="javascript">alert("' . $message . '")</script>';
			}
		?>
	</head>
	<body>
		<div class = 'navbar'>
			<p id = 'logo'><a href="index.php">myNotes</a></p>
		</div>
		<div class = "main">
			<table id = "diary">
				<tr>
					<th>event</th>
					<th>date</th>
					<th>time</th>
					<th>days untill</th>
				</tr>
			</table>
		</div>
	</body>
</html>