

<?php

$con = mysqli_connect("localhost","root","","event") or die("Connection failed");
	if(!empty($_POST['save'])){
		$Stud_id = $_POST['Stud_id'];
		$EVENT_ID = $_GET['event'];
		
		
            
		$sql = "SELECT * FROM event_student WHERE Stud_id = '$Stud_id' AND eventId = ".$EVENT_ID;
		$result =mysqli_query($con,$sql);
		$count = mysqli_num_rows($result);

		if ($count>0)
            {
                
				echo '<script>alert("Student with College ID:'.$Stud_id.' has already registered for this event");
				window.location.href="pre-entry.php"</script>'; 
                exit();
			}

			else {

	$eventId = $_POST['eventId'];
    $fname = $_POST['fname'];
    $Stud_id  = $_POST['Stud_id'];
    $email_id = $_POST['email_id'];
    $contact_no  = $_POST['contact_no'];
    $Year = $_POST['Year'];
    $dept = $_POST['dept'];
	


	// Database connection
	$conn = new mysqli('localhost','root','','event');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} 
	else {

		$stmt = $conn->prepare("insert into event_student(eventId,fname,Stud_id,email_id,contact_no,Year,dept) values(? ,?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssssss", $eventId,$fname, $Stud_id, $email_id, $contact_no, $Year, $dept);

		$execval = $stmt->execute();
		echo $execval;	

		$stmt->close();
		$conn->close();
	}
	


			}

	}
	
?>

<script>

	alert("You have successfully registered for the event");
	window.location.href = "pre-entry.php";
</script>

