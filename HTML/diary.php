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
			<span class="usernameContainer">
				<p class = "usernameText">
					<?php 
						echo $_SESSION['username'];
					?>
				</p>
			</span>
			<p id = 'logo'><a href="index.php">myNotes</a></p>	
		</div>
		<div class = "main">
			<h2 id = "diaryHeading">Diary</h2>
			<hr />
			<div id = "diaryContainer">
				<table id = "diary">
					<tr>
						<th>event</th>
						<th>description</th>
						<th>location</th>
						<th>date</th>
						<th>days until</th>
					</tr>
					<?php
						$selectEventsQuery = "SELECT * FROM diary ORDER BY eventDate";
					    $selectionResult = mysqli_query($conn, $selectEventsQuery);
					    if (mysqli_num_rows($selectionResult) > 0) {
							    while($row = mysqli_fetch_assoc($selectionResult)) {
							    	//only displayes the events with the userid of the current user
							   		if ($_SESSION['usersID'] == $row["usersID"]){
							   			//finds the amount of seconds between the current date and the event date
							   			$secondsLeft = (strtotime($row["eventDate"]) - strtotime(date("Y-m-d")));
							   			//divides the seconds left by the amount fo seconds in a day to get the amount of days left
							   			$daysLeft = floor($secondsLeft/86400);
							   			$shownDate = date("d-m-Y", strtotime($row["eventDate"]));
							   			//populates the table
							   			echo "<tr>";
							            echo 	'<td>'.$row["eventTitle"].'</td>';
							            echo 	'<td>'.$row["notes"].'</td>';
							            echo 	'<td>'.$row["eventLocation"].'</td>';
							            echo 	'<td>'.$shownDate.'</td>';
							            echo 	'<td>'.$daysLeft.'</td>';
							        	echo '</tr>';
							   		}
							    }
						}
					?>
				</table>
			</div>
			<div id = "addEventContainer">
				<form method="post" class = "addEvent">
					<label>event: </label>
					<input type="text" name="eventTitle" id = "eventTitle">
					<label>details about the event (maximum 140 characters): </label>
					<textarea id = "eventDetails" name="eventDetails"></textarea>
					<label>event location: </label>
					<input type="text" name="eventLocation" id = "eventLocation">
					<label>date: </label>
					<input type="date" name="eventDate" id = "eventDate">
					<button type = "submit" id = "eventSubmit" name = "eventSubmit">add</button>
				</form>
			</div>
			<?php
				if ($_SERVER['REQUEST_METHOD'] === 'POST') { //starts if the html issues a pull request
					if (isset($_POST['eventSubmit'])) { //if some presses the add button
						//initialising the variables supplied by the form
						$newEventTitle = $_POST['eventTitle'];
						$newEventDetails = $_POST['eventDetails']; 
						$newEventLocation = $_POST['eventLocation']; 
						$newEventDate = $_POST['eventDate'];
						$newUserID = $_SESSION["usersID"];
						//checks to see that all the fields have data in them
						if ($newEventTitle == null or $newEventDetails == null or $newEventLocation == null or $newEventDate == null){
							alertUser("all fields must be filled out");
						} else {
							$addEventQuery = "INSERT INTO diary (usersID,eventTitle, notes, eventLocation, eventDate) VALUES ('$newUserID', '$newEventTitle', '$newEventDetails', '$newEventLocation', '$newEventDate')";
							if (mysqli_query($conn, $addEventQuery)) {
								header("Refresh:0");
							}
						}
					}
				}
			?>
		</div>
	</body>
</html>