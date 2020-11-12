<?php
    $username = $_POST['username'];
    $password = $_POST['password'];

    $password = md5($password);
	

	// Database connection
	$conn = new mysqli('localhost','root','','event');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} 
	else {

		$stmt = $conn->prepare("insert into admin(Username,Password) values(? ,?)");
		$stmt->bind_param("ss", $username,$password);


		$execval = $stmt->execute();
		echo $execval;	

			
		$stmt->close();
		$conn->close();
	}
	          
?>
<script>
    window.location.href = "eventControl.php";
    alert("Admin added Successfully");
</script>