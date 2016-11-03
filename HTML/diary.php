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
			<!-- displays the name of the user logged in -->
			<span id = "usernameContainer">
				<p id = "usernameText">
					<?php 
						echo $_SESSION['username'];
					?>
				</p>
			</span>

			<p id = 'logo'><a href="index.php">myNotes</a></p>	
		</div>
		<div class = "main">
			<table id = "diary">
				<tr>
					<th>event</th>
					<th>description</th>
					<th>location</th>
					<th>date</th>
					<th>days until</th>
				</tr>
				<?php
					$selectEventsQuery = "SELECT * FROM diary";
				    $selectionResult = mysqli_query($conn, $selectEventsQuery);
				    if (mysqli_num_rows($selectionResult) > 0) {
						    while($row = mysqli_fetch_assoc($selectionResult)) {
						   		if ($_SESSION['usersID'] == $row["usersID"]){
						   			//finds the amount of seconds between the current date and the event date
						   			$secondsLeft = (strtotime($row["eventDate"]) - strtotime(date("Y-m-d")));
						   			//divides the seconds left by the amount fo seconds in a day to get the amount of days left
						   			$daysLeft = $secondsLeft/86400;
						   			echo "<tr>";
						            echo 	'<td>'.$row["eventTitle"].'</td>';
						            echo 	'<td>'.$row["notes"].'</td>';
						            echo 	'<td>'.$row["eventLocation"].'</td>';
						            echo 	'<td>'.$row["eventDate"].'</td>';
						            echo 	'<td>'.$daysLeft.'</td>';
						        	echo '</tr>';
						   		}
						    }
					}
				?>
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