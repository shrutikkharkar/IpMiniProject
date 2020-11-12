

<?php
	$eventID = $_POST['eventID'];
	$experience = $_POST['experience'];
    $fullName = $_POST['fullName'];
    $mail  = $_POST['mail'];
    $phone = $_POST['phone'];
    $suggestion  = $_POST['suggestion'];

	// Database connection
	$conn = new mysqli('localhost','root','','event');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {

		$stmt = $conn->prepare("insert into feedback(eventID,experience, fullName, mail, phone, suggestion) values(? ,? ,?, ?, ?, ?)");
		$stmt->bind_param("ssssss",$eventID, $experience, $fullName, $mail, $phone, $suggestion);



		$execval = $stmt->execute();
		echo $execval;	

		$stmt->close();
		$conn->close();
	}
?>
<script>
	alert("Your Feedback has been successfully submitted.");
	window.location.href = "current-entry.php";
</script>

