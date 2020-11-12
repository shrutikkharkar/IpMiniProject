<!doctype html>
<html lang="en">
  <head>
    <title>Todays Events</title>
    <!-- Required meta tags -->
    <link rel="stylesheet" href="style.css">
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
      </nav>
     


    <h2>Today's Events</h2>

    
    
    
    <!--Main content end here-->
    <div class="container">
      <div class="row">

<?php
        date_default_timezone_set('Asia/Kolkata'); 

        $servername="localhost";
        $username="root";
        $password="";
        $db="event"; // Database Name
        $con = new mysqli($servername,$username,$password,$db);
        if(!$con)
        {
            die('could not connect'.mysql_error());
        }

        $sql = "SELECT * FROM event_master ORDER BY eventTimeStart;";
        $result = $con->query($sql);
        
        $isEmpty = true;

        while($row = mysqli_fetch_array($result))
        {
          $eventDate = $row['eventDate'];
         
          
          $currentDate = date('Y-m-d');

          if($eventDate == $currentDate)
          {
            date_default_timezone_set('Asia/Kolkata'); 
            $timeStart  = date("g:i a", strtotime($row['eventTimeStart']));
            $timeEnd  = date("g:i a", strtotime($row['eventTimeEnd'])); 

            $EventId = $row["eventId"];       
            $sql2 = "SELECT COUNT(*) FROM event_student WHERE eventId = ".$EventId;
            $result2 = $con->query($sql2);
  
            $count = 0;
            while($row2 = mysqli_fetch_array($result2))
            {
                $count = $row2["COUNT(*)"];
            }
            $currentTime = date("H.i");
            
            
            $timeStartFed  = $row['eventTimeStart']; 
            $timeStartFed = date("H.i",strtotime($timeStartFed));

            $timeEndFed  = $row['eventTimeEnd']; 
            $timeEndFed = date("H.i",strtotime($timeEndFed));

            
            $isEmpty = false;

            echo'<div class="col-md-6 col-xs-12">
            <div class="card todays-events">
              <div class="card-body">
                <h3 class="card-title" style="padding-right: 91px;">'.$row['eventName'].'
                  <!-- Delete start -->
                  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                  <script>
                  $(document).ready(function() {

                    var FDbtn = "#" + $("#event'.$row['eventId'].'").attr("id");

                    if(('.$timeStartFed.' <= '.$currentTime.') && ('.$timeEndFed.' < '.$currentTime.'))
                    {
                      $(FDbtn).show();
                      $("#event-'.$row['eventId'].'-over").html("<b>Timings:</b> The event is over.");

                    }

                    else if('.$timeStartFed.' <= '.$currentTime.')
                    {
                      $(FDbtn).show();
                         
                    }

                    
                    else
                    { 
                      $(FDbtn).hide();
                    }
                    })
                  </script>
                  <!-- Delete end -->

                  <button name="event'.$row['eventId'].'" id="event'.$row['eventId'].'" onclick="nextPage(this)" class="btn btn-primary feedback-for-event">Feedback</button>

                </h3>
                <p><b>Number of students registered: </b><b style="color: blue;">'.$count.'</b></p>
                <p id="event-'.$row['eventId'].'-over"><b>Timings:</b>&nbspFrom '.$timeStart.' to <span id="getEndTime">'.$timeEnd.'</span></p>
                <p><b>Location:&nbsp</b>'.$row['eventLocation'].'</p>
                <p><b>Speaker:&nbsp</b>'.$row['eventSpeaker'].'</p>
    
                <p class="card-text"><b>Description of Event:&nbsp</b>'.$row['eventDescription'].'</p>
              </div>
            </div>
          </div>';          
          }
   
        }

        if($isEmpty){
          echo '<p style="font-size: 219%;color: blueviolet;margin-left: auto;margin-right: auto;">Sorry!, there are no events today.</p>';
        }



?>

        

        

        
      </div>
    </div>

    

    
      
    <!-- Optional JavaScript -->
    
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  
    <script>
    function nextPage(btn)
        {
          var ButtonId = btn.id;
          var eventId = ButtonId.substring(5);
          
          window.location.href = "Feedback.php?event=" + eventId;
        }
    
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
   
    </script>
    
  </body>

</html>