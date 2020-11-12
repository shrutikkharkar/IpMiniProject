<?php

$eventName = $_POST['eventName'];
$eventDescription = $_POST['eventDescription'];
$eventDate = $_POST['eventDate'];
$eventTimeStart = $_POST['eventTimeStart'];
$eventTimeEnd = $_POST['eventTimeEnd'];
$eventLocation = $_POST['eventLocation'];
$eventDetails = $_POST['eventDetails'];
$eventSpeaker = $_POST['eventSpeaker'];



$connect = new mysqli('localhost','root','','event');
	if($connect->connect_error){
		echo "$connect->connect_error";
		die("Connection Failed : ". $connect->connect_error);
	} else {

		$sql = "insert into event_master(eventName,eventDescription,eventDate,eventTimeStart,eventTimeEnd,eventLocation,eventDetails,eventSpeaker) VALUES(\"$eventName\", \"$eventDescription\", \"$eventDate\",\"$eventTimeStart\",\"$eventTimeEnd\",\"$eventLocation\",\"$eventDetails\",\"$eventSpeaker\")";
		if($connect->query($sql) === TRUE )
		{
			echo "<script> console.log('success') </script>";
			echo "";
		}
		else
		{
			echo "<br>error: ".$sql."<br>".$connect->error;
		}
        	
		$sql1="SELECT max(eventId) as id from event_master";
		$result1 = $connect->query($sql1);
		$row1 = $result1->fetch_assoc();

		$EventId = $row1['id'];

		$EventOutcomes = $_POST['EventOutcomes'];
                                                        
		for($i=0; $i<count($EventOutcomes); $i++)
		{
			$EventOutcome = $EventOutcomes[$i];

			$sql2 = "INSERT INTO eventOutcomes(eventId,eventOutcomes) VALUES('$EventId','$EventOutcome')";
			if($connect->query($sql2) === TRUE )
			{
				echo "<script> console.log('success') </script>";
			}
			else
			{
				echo "<br>error: ".$sql2."<br>".$connect->error;
			}
		}
		
		
		$connect->close();
	}
?>

<script>
	alert("Event added Successfully!");
	window.location.href = "eventControl.php";
</script>


