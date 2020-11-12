

<!doctype html>
<html lang="en">
  <head>
    <title>Event Details</title>
    <!-- Required meta tags -->
    <link rel="stylesheet" href="style.css">
    <link href="style.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>

    <div class="page-header">
        <h1>VCET-IT Events</h1>
      </div>
  
      <!--Button-->
      <nav class="nav justify-content-center" id="home">
        <button type="button" class="btn btn-info">
          <a class="nav-link active" href="index.html" style="color: white;">Home</a>
        </button>

        <button type="button" class="btn btn-info back" >
            <a class="nav-link active" href="pre-entry.php" style="color: white;">Back</a>
          </button>
      </nav>
  
    <br><br>

    <!--Main content-->

    <div class="container">
        <div class="row">


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

        
        $EventId = $_GET["event"];

        $sql1 = "SELECT * FROM event_master WHERE eventId = ".$EventId;
        $result1 = $con->query($sql1);

        while($row = mysqli_fetch_array($result1))
        {
          $timeStart  = date("g:ia", strtotime($row['eventTimeStart']));
          $timeEnd  = date("g:ia", strtotime($row['eventTimeEnd']));

          $eventDate = $row['eventDate'];
          $timeStamp = strtotime($eventDate);
          $properDate = date("d-m-Y", $timeStamp);



          $EventId = $row["eventId"];       
          $sql2 = "SELECT COUNT(*) FROM event_student WHERE eventId = ".$EventId;
          $result2 = $con->query($sql2);

          $count = 0;
          while($row2 = mysqli_fetch_array($result2))
          {
              $count = $row2["COUNT(*)"];
          }
          echo'
          

          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="detailsHead">
             <h2 class="details-title-phone">'.$row['eventName'].' ,details</h2>
           </div>
              <div class="card event-details-container">
                <!--<h3 class="card-title event-details-heading">
                   '.$row['eventName'].'-->
                   
                  
                  <button id="event'.$row['eventId'].'" onclick="nextPage(this)" class="btn btn-primary register-btn-inDetails register-for-event">Register</button>
                  <span class="details-elements-phone " style="text-align: center;font-size:1.7em;color:rgb(76, 146, 144);">Number of Students registered uptil now:<b> '.$count.'</b></span>
                <!--</h3>-->

                <div class="card-body event-details-body"
                style="font-size:1.5em;">
                <div style="text-align:left;">
                <p class="details-elements-phone"><b>Event Date:&nbsp</b>'.$properDate.'</p>
                
                <p class="details-elements-phone"><b>Event Time:&nbsp</b>'.$timeStart.'&nbspto&nbsp'.$timeEnd.'</p>
                <p class="details-elements-phone"><b>Event Speaker:&nbsp</b>'.$row['eventSpeaker'].'</p>
                <p class="details-elements-phone"><b>Event Location:&nbsp</b>'.$row['eventLocation'].'</p>
                </div>
                
                <p><b>Complete Details:</b></p>
                  <p class="details-elements-phone" style="text-align:initial;" id="eventDetalis">'.$row['eventDetails'].'</p>

                
                </div><div style="display: flex; justify-content: center;flex-direction: column;
                align-items: center;font-size:1.5em;">
                  <h4 style="font-size: 1.2em;">Event Outcomes:</h4>';

                $EventId = $row['eventId'];

                $sql2 = "SELECT * FROM eventoutcomes WHERE eventId = ".$EventId;
                $result2 = $con->query($sql2);

                while($row2 = mysqli_fetch_array($result2))
                {
                  echo '<p class="event-outcomes-phone details-elements-phone id="eventOutcomes">'."&#8227".' '.$row2['eventOutcomes'].'</p>';
                }

              echo'</div></div></div>';
        }

          ?>


        </div>
    </div>


      
    <!-- Optional JavaScript -->
    <script>

function nextPage(btn)
        {
          var ButtonId = btn.id;
          var eventId = ButtonId.substring(5);

          window.location.href = "registration.php?event=" + eventId;
        }

    </script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>