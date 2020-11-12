<!doctype html>
<html lang="en">
  <head>
    <title>List of Students</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="style.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
  <div class="container-fluid">
  <div style="margin-top: 15px;">

    <button id="backButtonStdList" class="btn btn-info backButtonStdList noPrint">Back</button>

    <button style="margin-left: 15px;" onclick="printPage()" class="btn btn-primary printButtonStdList noPrint">Print</button>
    

  </div>
  

    <h1>List of Students for 
    <?php

    $eventId = $_GET["event"];

    $servername="localhost";
    $username="root";
    $password="";
    $db="event"; // Database Name
    $con = new mysqli($servername,$username,$password,$db);
    if(!$con)
    {
        die('could not connect'.mysql_error());
    }
    $sql3 = "SELECT * FROM event_master WHERE eventId = '$eventId'";
        $result3 = $con->query($sql3);
        
        while($row = mysqli_fetch_array($result3))
        { 
          
          $timeStart  = date("g:i a", strtotime($row['eventTimeStart']));
          $timeEnd  = date("g:i a", strtotime($row['eventTimeEnd']));
          
          $eventDate = $row['eventDate'];
          $timeStamp = strtotime($eventDate);
          $properDate = date("d-m-Y", $timeStamp);

          echo''.$row['eventName'].'</h1><br>
          <h2>(On '.$properDate.', from '.$timeStart.' to '.$timeEnd.')</h2>'
          ;}
          
    ?>
    
    
    

    <table class="table table-striped table-inverse">
      <thead class="thead-inverse thead-dark">
            <tr>
                <th>Sr.no</th>
                <!-- <th>Event_id</th> -->
                <th>Name</th>
                <th>College ID</th>
                <th>Email Id</th>
                <th>Contact Number</th>
                <th>Year</th>
                <th>Department</th>
            </tr>
        </thead>
        <tbody>

        <?php

        
        $num = 0;
        
        $eventId = $_GET["event"];

        $servername="localhost";
        $username="root";
        $password="";
        $db="event"; // Database Name
        $con = new mysqli($servername,$username,$password,$db);
        if(!$con)
        {
            die('could not connect'.mysql_error());
        }

        $sql = "SELECT * FROM event_student NATURAL JOIN event_master WHERE eventId = ".$eventId;
        $result = $con->query($sql);
        
        while($row = mysqli_fetch_array($result))
        {                   
          echo'<tr>
                <td scope="row">'.++$num.'</td>
                <!-- <td id="Event_id">'.$row['eventName'].'</td> -->
                <td>'.$row['fname'].'</td>
                <td>'.$row['Stud_id'].'</td>
                <td>'.$row['email_id'].'</td>
                <td>'.$row['contact_no'].'</td>
                <td>'.$row['Year'].'</td>
                <td>'.$row['dept'].'</td>
            </tr>'
        ;}
          
          
            
            echo'</tbody></table>'
            
        ?>

    
  </div>
  
        




      
    <!-- Optional JavaScript -->

    <script>
      function printPage(){
        window.print();
      }
    </script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
      
    <script>


      $(document).ready(function(){

        const urlParams = new URLSearchParams(window.location.search);
        var Event = urlParams.get('event');//eg.Event = 1

        
        var select_Events = $("#Event_id").html();

        $('#backButtonStdList').click(function(){
          window.location.href = "eventControl.php";
        })


      })


    </script>
  
  </body>
</html>