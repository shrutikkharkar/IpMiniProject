

<?php

 

$con = new mysqli("Localhost","root","","event");
if(!$con)
{
    die('could not connect'.mysql_error());
}
$ID = $_GET['ID'];

$sql = "DELETE FROM event_master WHERE eventId = ".$ID;
$sql1 = "DELETE FROM eventoutcomes WHERE eventId = ".$ID;
$sql2 = "DELETE FROM certificates WHERE eventId = ".$ID;
$result = $con->query($sql);
$result1 = $con->query($sql1);
$result2 = $con->query($sql2);




?>

<script>
    window.location.href = "eventControl.php";
</script>