<!doctype html>
<html lang="en">
  <head>
    <title>Suggestions</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <style>
  h1{
      text-align: center;
  }

  .btn-info{
      margin-left: 10px;
      margin-top: 10px;
  }
  </style>
  <body>

  <?php
   $con = new mysqli("localhost","root","","event");
   if(!$con)
   {
       die('could not connect'.mysql_error());
   }
   $EVENTID = $_GET['eventidforsugg'];

   $sql = "SELECT * FROM event_master WHERE eventId = ".$EVENTID;
   $result = $con->query($sql);
   
   while($row = mysqli_fetch_array($result)){

    echo'
    <a href="eventControl.php" class="btn btn-info">Back</a>
    
    <h1>Suggestions for '.$row['eventName'].'</h1>';}
  
  
  
  
  ?>

<table class="table table-striped table-inverse">
    <thead class="thead-inverse thead-dark">
        <tr>
            <th>Name</th>
            <th>Satisfied</th>
            <th style="width:60%;">Suggestion</th>
            
        </tr>
    </thead>
    <tbody>

  <?php
  
  
  $con = new mysqli("localhost","root","","event");
  if(!$con)
  {
      die('could not connect'.mysql_error());
  }
  $EVENTID = $_GET['eventidforsugg'];

  $sql = "SELECT * FROM event_master WHERE eventId = ".$EVENTID;
  $result = $con->query($sql);

  while($row = mysqli_fetch_array($result)){

    $sqlsug = "SELECT * FROM feedback WHERE eventID = ".$EVENTID;
    $ressug = $con->query($sqlsug);
    while($rowsug = mysqli_fetch_array($ressug)){

    

    echo'
    
        <tr>
            <td scope="row">'.$rowsug['fullName'].'</td>
            ';
            if($rowsug['experience'] == "good"){
                $exp = "Yes";

            }
            else{
                $exp = "No";

            }

            echo'
            <td>'.$exp.'</td>
            <td>'.$rowsug['suggestion'].'</td>
            
        </tr>';}
        echo'
        
    </tbody>
</table>
    
    ';


  }
  
  
  
  
  
  
  
  ?>

      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>