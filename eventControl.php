<?php
if(!isset($_SERVER['HTTP_REFERER']))
{
    header('location:adminLogin.php');
    exit;
}
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Admin page</title>
    <!-- Required meta tags -->
    <link rel="stylesheet" href="style.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>

  <body>

  <h1>Event Control Page</h1>
  <nav class="nav justify-content-center" id="home">
        <button type="button" class="btn btn-info" >
          <a class="nav-link active" href="index.html" style="color: white;">Home</a>
        </button>
  </nav>   
  <hr>  
  <div class="container-fluid">
  <!-- New admin -->
  <div>
    
    <form action="addAdmin.php" method="post">
      <label style="color: rgb(93, 106, 216);"><h3>Add New Admin</h3></label>
      <!-- <label for="username">Enter username:</label> -->
      <input placeholder="Enter username"style="border:1px solid lightgrey;width:auto;padding: 20px;margin-left:10px;" type="text" name="username" id="">

      <!-- <label for="password">Enter password:</label> -->
      <input placeholder="Enter password" style="border:1px solid lightgrey;width:auto;padding: 20px;margin-left:10px;" type="password" name="password" id="adminPassword">
      <input type="checkbox" style="width:auto;" name="ShowPassword" id="ShowPassword"><span>Show Password</span>
      

      <input class="btn btn-primary" style="width:auto;margin-left:5%;" type="submit" value="Add">
    </form>
  </div>
<!-- New event creation -->
<hr>
    <div id="createNewEvent">
        <h3>Create a new event 
            <button id="createButton" class="createButton btn btn-primary">Create</button>
        </h3>
        <hr>
     </div>
<!-- Student lists -->
      <div class="table-responsive" style="overflow-y:auto;">
      
        <br>
        <table class="table table-inverse table-hover">
            <thead class="thead-inverse thead-dark"><b>List of students for events:</b>
        
            
              <tr>
                <th>Event ID</th>
                <th class="text-center" style="width: 40%;">Event Name</th>
                <th>Event Date</th>
                <th>Event Time</th>
                <th>Count of Students</th>
                <th class="text-center">Operations</th>
                
              </tr>
            </thead>
            <tbody>
            
        
        <?php
   
        $servername="localhost";
        $username="root";
        $password="";
        $db="event"; // Database Name
        $con = new mysqli($servername,$username,$password,$db);
        if(!$con)
        {
            die('could not connect'.mysql_error());
        }

        $sql = "SELECT * FROM event_master;";
        $result = $con->query($sql);

        $sql1 = "SELECT * FROM eventoutcomes WHERE eventId = ;";
        
        
        
        while($row = mysqli_fetch_array($result))
        {

          $eventDate = $row['eventDate'];
         
          
          $currentDate = date('Y-m-d');

          if($eventDate >= $currentDate)
          {

          $EventId = $row["eventId"];
          
          $sql1 = "SELECT COUNT(*) FROM event_student WHERE eventId = ".$EventId;
          $result1 = $con->query($sql1);

          $count = 0;
          while($row1 = mysqli_fetch_array($result1))
          {
              $count = $row1["COUNT(*)"];
          }

          echo'

                  <tr>
                    <td scope="row">'.$row['eventId'].'</td>
                    <td>'.$row['eventName'].'</td>
                    <td>'.$row['eventDate'].'</td>
                    <td>'.$row['eventTimeStart'].' to '.$row['eventTimeEnd'].'</td>
                    <td class="text-center"><b>'.$count.'</b></td>
                    <td class="text-center"><button id="event'.$row['eventId'].'" onclick="nextPage(this)" class="createButton btn btn-primary">Open</button>
                        <a href="updateEvForm.php?ID='.$row['eventId'].'" class="btn btn-warning">Update</a>
                        <a href="delete.php?ID='.$row['eventId'].'" type="button" class="deleteRow btn btn-danger">Delete</a></td>
                    
                  </tr>'

          ;}}

          echo '</tbody></table>'

        ?>
      </div>
      <br>
<hr>
      <!-- Feedback Table -->
      <div class="table-responsive">
      <table class="table table-hover table-inverse">
        <thead class="thead-inverse thead-dark"><b>Feedback:</b>
          <tr>
            <th>Event ID</th>
            <th style="width:60%;">Event Name</th>
            <th>Student Satisfaction</th>
            <th>Suggestions</th>
          </tr>
        </thead>
        <tbody>

          <?php

          $conn = new mysqli("localhost","root","","event");
          if(!$conn)
          {
              die('could not connect'.mysql_error());
          }

          $sql1f = "SELECT * FROM event_master";
          $result1f = $con->query($sql1f);

          while($row1f = mysqli_fetch_array($result1f))
          { 
            $currentDate = date('Y-m-d');
            $eventDate = $row1f['eventDate'];
            if($eventDate <= $currentDate)
            {

            $sqlfd = "SELECT * FROM feedback WHERE eventID = ".$row1f['eventId'];
            $Yes = 0;
            $No = 0;
            $total = 0;

            $resultfd = $conn->query($sqlfd);
            while($rowfd = mysqli_fetch_array($resultfd))
            {$experience = $rowfd['experience'];
              if ($experience == "good") {
                $Yes++;
              }
              elseif($experience == "bad"){
                $No++;
              }
              elseif($experience == NULL) {
                  
              }

              $total = $Yes + $No;
               
            }
            
          echo'
        
          <tr>
            <td scope="row">'.$row1f['eventId'].'</td>
            <td>'.$row1f['eventName'].'</td>
            <td><b>YES:&nbsp'.$Yes.'&nbsp &nbsp &nbsp &nbsp &nbspNO:&nbsp'.$No.'<b></td>
            <td><a href="suggestions.php?eventidforsugg='.$row1f['eventId'].'" class="btn btn-primary">View</a></td>
          </tr>';}

          }
          
       echo' </tbody>
      </table>'
          
      ?>
      </div>
     

     <!-- Table end -->
    <br>
    <hr>
     <!-- Upload certificate start -->
     <div>
     
      <table class="table table-hover table-inverse">
      
        <thead class="thead-inverse thead-dark"><b>Upload Certificates for Event Report:</b>
          <tr>
            <th>Event ID</th>
            <th style="width:60%;">Event Name</th>
            <th>Upload Certificate</th>
            <th class="text-center">Submit</th>
          </tr>
          </thead>
          <tbody>
          <?php

        
            $servername="localhost";
            $username="root";
            $password="";
            $db="event"; // Database Name
            $con = new mysqli($servername,$username,$password,$db);
            if(!$con)
            {
                die('could not connect'.mysql_error());
            }

            
            $result = $con->query($sql);

            while($row = mysqli_fetch_array($result))
            {
              echo '
            <tr>
              <td scope="row">'.$row['eventId'].'</td>
              <td>'.$row['eventName'].'</td>';
              
              echo'
              <form action="uploadCertificate.php?event='.$row['eventId'].'" method="POST" enctype="multipart/form-data">
              <td><input type="file" name="file" id="file"></td>
              <td><input class="btn btn-primary certificate-upload-btn" value="Submit" name="submit" type="submit" 
              style="width:100px;"></td>
            </tr>
            </form>';}
            echo'

          </tbody>
          
      </table>
     '

      ?>


     </div>


  </div>
      

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#createButton").click(function(){
                window.location.href = "eventMaster.html";
            })

            $(".deleteRow").click(function(){
              return confirm("Are you sure you want to delete this Event?");
              
              
              
            })

            $("#ShowPassword").click(function(){
            var x = $("#adminPassword").attr("type");
            if(x === "password"){
                $("#adminPassword").attr("type", "text");
            }
            else{
                $("#adminPassword").attr("type", "password");
            }



            })

        })
    </script>
    <script>

      function nextPage(btn)
      {
        var ButtonId = btn.id;
        var eventId = ButtonId.substring(5);
        
        window.location.href = "studentList.php?event=" + eventId;
        
      }



</script>



</body>
</html>