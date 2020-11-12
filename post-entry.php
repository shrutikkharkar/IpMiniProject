<!doctype html>
<html lang="en">
  <head>
    <title>Event analysis</title>
    <!-- Required meta tags -->
    <link href="style.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
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
     


    <h2><b>Event analysis</b></h2>
    <br>

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
        

        $sql = "SELECT * FROM event_master";
        

         
        $result = $con->query($sql);

        
        $isEmpty1 = true;
        
        while($row = mysqli_fetch_array($result))
        { 
          
          $currentDate = date('Y-m-d');
          $eventDate = $row['eventDate'];
          if($eventDate <= $currentDate){
          $isEmpty1 = false;
            
        echo'
        <div class="container">
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="card event-analysis-container">
                <h3 class="card-title event-analysis-heading">
                  '.$row['eventName'].'
                </h3>
              <br>
              <div class="row">

              <div class="col-md-6">

                <div class="card-body event-analysis-body">

                  <div><b>Event Outcomes</b></div>

                  <br>';
                  
                  
                  
                  $EventId = $row['eventId'];

                  $sql2 = "SELECT * FROM eventoutcomes WHERE eventId = ".$EventId;
                  $result2 = $con->query($sql2);

                  while($row2 = mysqli_fetch_array($result2))
                  {
                    echo '<p style="text-align:initial;padding-left:10px;" id="eventOutcomes">'."&#8227".' '.$row2['eventOutcomes'].'</p>';
                    // &#8227 is for bullet form
                  }
                  
                  echo'
                </div>
              </div>
          
              <div class="col-md-6 studSatDiv">
                
 
                <p class = "studsathead">Student satisfaction:</p>';
                
      

                $sql4 = "SELECT * FROM feedback WHERE eventID = ".$EventId;
              
                $Yes = 0;
                $No = 0;
                $percentYes = 0;
                $percentNo = 0;
                $total = 0;
              
                $result4 = $con->query($sql4);

              
              
              
                while($row = mysqli_fetch_array($result4))
                {$experience = $row['experience'];
                  if ($experience == "good") {
                    $Yes++;
                  }
                  elseif($experience == "bad"){
                    $No++;
                  }
                  else{}
             

                  $total = $Yes + $No;
                  $percentYes = round(($Yes / $total) * 100);
                  
                  $percentNo = round(($No / $total) * 100);
                
                
                }

                


                
                echo'<p  class="studentCount">Feedback given by <b>'.$total.'</b> Students.</p>
                <p class="studFedPerYes"> Yes: '.$percentYes.'%</p>
                <p class="studFedPerNo">No: '.$percentNo.'%</p>
                
  
              

               
              <!--<br><br><br>-->
              
                
              </div> 
              
            </div>
            
            <div style="text-align:center;">

            <p><b>Achievement Certificates</b></p>';

            $sqlcert = "SELECT * FROM certificates 
            WHERE eventId = ".$EventId;
            $resultcert = $con->query($sqlcert);
            $isEmpty = true;
            while($rowcert = mysqli_fetch_array($resultcert))
            {
              $isEmpty = false;
              echo'
              
              <span><a  style="margin-bottom:30px;" class="btn btn-primary" target="_blank" href="certificatesImages/'.$rowcert['certi'].'">View</a></span>';

            }
            if($isEmpty){
              echo '<p style="color:darkviolet;">Will be uploaded soon!</p>';
            }
             echo' <!--<p><a class="btn btn-primary" target="_blank" href="certificatesImages/Screenshot (3).png">View</a></p>-->
            </div>
          </div>


 


        </div>
          
      </div>

    </div>';
        }
      }

      if($isEmpty1){
        echo '<p style="font-size: 219%;color: blueviolet;text-align:center;">Sorry!, Events are yet to be conducted.</p>';
      }


    ?>
    






    <!--Main content end here-->
    
    <!-- Optional JavaScript -->

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>