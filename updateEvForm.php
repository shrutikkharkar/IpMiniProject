<!doctype html>
<html lang="en">
  <head>
    <title>Master</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="style1.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <div class="page-header">
        <h1>VCET-IT Events</h1>
    </div>

    <div class="container event-master-container">


        <div class="row">
            <nav class="nav justify-content-center" id="home">
                <button type="button" class="btn btn-info" >
                  <a class="nav-link active" href="index.html" style="color: white;">Home</a>
                </button>
                <button type="button" class="btn btn-info back" >
                    <a class="nav-link active" href="eventControl.php" style="color: white;">Back</a>
                  </button>
                
            </nav>
            <header style="margin-left: 20%;">Update the Event</header>
            <div class="col-md-12 col-xs-12">
    
            <!-- action="master.php"  -->
                

                <?php
                $con = new mysqli("localhost","root","","event");

                if(!$con)
                {
                    die('could not connect'.mysql_error());
                }
                $ID = $_GET['ID'];
                $sql = "SELECT * FROM event_master WHERE eventId = ".$ID;
                $result = $con->query($sql);
            
                $sql1 = "SELECT * FROM eventoutcomes WHERE eventId = ".$ID;
                $result1 = $con->query($sql1);
                $i=-1;
                
                while($row = mysqli_fetch_array($result))
                {
                    echo'
                    <form class="form-box" action="update.php?ID='.$ID.'" method="post">
                    

                    <br>
                    <div class="row">
                        <div class="col-md-6 col-xs-12">

                            <div class="masterElements form-group">
            
                                <label for="eventName">Event name:</label>
                                <textarea class="form-control" name="eventName" id="eventName" cols="50" rows="2">'.$row['eventName'].'</textarea>
                                
                    
                            </div>
                    
                            <div class="masterElements form-group">
                    
                                <label for="eventDescription">Description in short:</label>
                                
                                <textarea class="form-control" name="eventDescription" id="eventDescription" cols="50" rows="3">'.$row['eventDescription'].'</textarea>
                            
                            </div class="masterElements form-group">
        
                                <label for="eventDate">Event date:</label>
                                <input class="form-control" type="date" name="eventDate" id="eventDate" value='.$row['eventDate'].'>
        
                            <div class="form-group" style="margin-top: 20px;">
                                

                                <label for="">Event Time:</label>
                                
                                <b>&nbspFrom</b>
                                <input style="width: 20%;" type="Time" name="eventTimeStart" id="eventTimeStart" value='.$row['eventTimeStart'].'> <b>to</b>
                                <input style="width: 20%;" type="Time" name="eventTimeEnd" id="eventTimeEnd" value='.$row['eventTimeEnd'].'>
      
                            </div>   
                            
                            <div class="form-group">
                                <label for="eventLocation">Event Location:</label>
                                <input class="form-control" style="width: 100%;" type="text" name="eventLocation" id="eventLocation" value="'.$row['eventLocation'].'">
                            </div>

                                                    
                        </div>

                        <div class="col-md-6 col-xs-12">

                            <div class="masterElements">
            
                                <label for="eventDetails">Complete event details:</label>
                                <textarea class="form-control" name="eventDetails" id="eventDetails" cols="50" rows="10">'.$row['eventDetails'].'</textarea>
                                <!-- <input type="text" name="eventDetails" id="eventDetails"> -->
                    
                            </div>

                            <div style="margin-top:50px;">

                                <label for="eventSpeaker">Event Speaker/Judge:</label>
                                <input class="form-control" style="width:60%" type="text" name="eventSpeaker" id="eventSpeaker" value="'.$row['eventSpeaker'].'">

                            </div>


                            
                        </div>
                    </div>

                    <hr style="border: 1px solid black;">
            
                    <div class="my-2">
                        
                        <table id="table_EventOutcomes" class="table table-hover my-2">
                            <thead>
                                <tr>
                                    <td><b>Event Outcomes:</b></td>
                                    <!--<td><button style="margin-left: 55%;" type="button" onclick="addRow()" class="btn btn-primary mb-2">Add Row</button>&nbspFor Outcome</td>-->
                                </tr>
                            </thead>
                            <tbody id=tbody_EventOutcomes>
                            
                                    ';
                                    while($row = mysqli_fetch_array($result1))
                                    {$i++;
                                        
                                        
                                    echo
                                    '
                                    
                                    <tr>
                                    <td><input class="form-control" type="text" name="EventOutcomes['.$i.']" class="form-control" value="'.$row['eventOutcomes'].'"/></td>

                                    <input class="hide-eventOutcomes_ID" type="text" name="eventOutcomes_ID['.$i.']" value="'.$row['eventOutcomes_ID'].'">

                                    <!--<td><button style="margin-left: 55%;" onclick="deleteRow(this)" class="btn btn-danger">Delete</button></td>-->
                                                
                                    '
                                    
                                    ;}
                                    echo'
                                    
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-2">
                        <button id="" name="submit" type="submit" class="btn btn-success">Update</button>
                        <br><br><br><br>
                    </div>

                    
                    ';}
                    
                    ?>
                </form>       
            </div>
        </div>
    </div>

    

    
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  
    <script>

        function addRow(){
            var html = '<tr>'+
                            '<td><input style="width: 150%;" class="form-control" type="text" name="EventOutcomes[]" class="form-control" /></td>'+
                            '<td><button style="margin-left: 55%;" onclick="deleteRow(this)" class="btn btn-danger">Delete</button></td>'+
                        '</tr>';
            
            $("#tbody_EventOutcomes").append(html);
        }

        function deleteRow(btn){
            var row = btn.parentNode.parentNode;
            $(row).remove();
        }

    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(".hide-eventOutcomes_ID").hide();
    </script>


</body>
</html>