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
			
			<?php 
				echo '<p> ' . $_SESSION['username'] . ' </p>';
			?>

		</div>
		<div class = "main">
			<table id = "diary">
				<tr>
					<th>event</th>
					<th>description</th>
					<th>date</th>
					<th>days until</th>
				</tr> 
			</table>
			<form method="post" class = "addEvent">
				<label>event: </label>
				<input type="text" name="eventTitle" id = "eventTitle">
				<label>details about the event (maximum 140 characters): </label>
				<textarea id = "eventDetails"></textarea>
				<label>event location: </label>
				<input type="text" name="eventLocation" id = "eventLocation">
				<label>date: </label>
				<input type="date" name="eventDate" id = "eventDate">
				<button type = "submit" id = "eventSubmit">add</button>
			</form>
		</div>
	</body>
</html>