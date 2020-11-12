<?php
$ID = $_GET['ID'];
$eventName = $_POST['eventName'];
$eventDescription = $_POST['eventDescription'];
$eventDate = $_POST['eventDate'];
$eventTimeStart = $_POST['eventTimeStart'];
$eventTimeEnd = $_POST['eventTimeEnd'];
$eventSpeaker = $_POST['eventSpeaker'];
$eventDetails = $_POST['eventDetails'];



$connect = new mysqli('localhost','root','','event');
	if($connect->connect_error){
		echo "$connect->connect_error";
		die("Connection Failed : ". $connect->connect_error);
	} else {

		$sql = 'UPDATE event_master 
		SET eventName = "'.$eventName.'", eventDescription = "'.$eventDescription.'", eventDate = "'.$eventDate.'", eventTimeStart = "'.$eventTimeStart.'", eventTimeEnd = "'.$eventTimeEnd.'", eventDetails = "'.$eventDetails.'" ,eventSpeaker = "'.$eventSpeaker.'"
		WHERE event_master.eventId = '.$ID.'';
		if($connect->query($sql) === TRUE )
		{
			//echo "<script> console.log('success') </script>";
			//echo "Event updated successfully";
		}
		else
		{
			echo "<br>error: ".$sql."<br>".$connect->error;
		}

		
		$sql1="SELECT max(eventId) as id from event_master";
		$result1 = $connect->query($sql1);
		$row1 = $result1->fetch_assoc();
		
		$EventId = $row1['id'];

		$sqloutId = "SELECT * FROM eventoutcomes WHERE eventId = " . $EventId;
		
			

		$EventOutcomes = $_POST['EventOutcomes'];

		$EventOutcomes_ID = $_POST['eventOutcomes_ID'];
		
		
                                                        
		for($i=0; $i<count($EventOutcomes); $i++)
		
		{
			
			$EventOutcome = $EventOutcomes[$i];

			$eventOutcome_ID = $EventOutcomes_ID[$i];
		
			$sql2 = 'UPDATE eventoutcomes 
			SET eventOutcomes = "'.$EventOutcome.'" WHERE eventOutcomes_ID = "'.$eventOutcome_ID.'" AND eventId = "'.$ID.'"';


			if($connect->query($sql2) === TRUE )
			{
				echo "<script> console.log('success') </script>";
			}
			else
			{
				echo "<br>error: ".$sql2."<br>".$connect->error;
			}
		}

		
		
		//$stmt->close();
		$connect->close();
	}
?>

<script>
	alert("Updated Successfully");
	window.location.href="eventControl.php";
</script>