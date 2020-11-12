<?php




if(isset($_POST['submit']))

{
    $pdfpath='CertificatesImages/';
   
    $filename = $_FILES['file']['name'];
    //echo "Done";

  


    if(move_uploaded_file($_FILES["file"]["tmp_name"],'CertificatesImages/'.$filename)){

    //echo "Uploaded successfully";
    } else
    {
        echo 'Error: '.mysqli_error($conn);
    
    }

    
}

$eventId = $_GET['event'];

$con = new mysqli("localhost","root","","event");
if(!$con)
{
    die('could not connect'.mysql_error());
}

$sql = $sql = "INSERT into certificates(eventId,certi) VALUES(\"$eventId\", \"$filename\")";
$result = $con->query($sql);


?>
<script>
    alert("Certificate added successfully");
    window.location.href = "eventControl.php";
</script>