<!doctype html>
<html lang="en">
  <head>
	<title>Feedback</title>
	<!-- Required meta tags -->
	<link rel="stylesheet" href="style2.css"/>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>


  <div class="container">
	  <div class="row">
		  <div class="col-md-12">

		  <a class="btn btn-info back-btn-fb" href="current-entry.php">Back</a>
		  	<h1 class="fb-for-head">
				Feedback for 
				<?php
					$eventId = $_GET["event"];
					
					$servername="localhost";
					$username="root";
					$password="";
					$db="event";
					$con = new mysqli($servername,$username,$password,$db);
					
		  
		  			$sql = "SELECT * FROM event_master WHERE eventId = '$eventId'";
		  			$result = $con->query($sql);
					while($row = $result->fetch_array())
					{echo'

						'.$row['eventName'].'</h1>
						<hr class="bg-white">
						<h6 class="text-center">Please write your feedback below:</h6><br>
						<form action="feedbackconnection.php" method="post">
						<div class="row">
						<div class="col-md-6 col-xs-12">

						<div class="form-group text-center">

							<h3 class="overall-sat">Overall are you satisfied by the conducted event?</h3>
							

							
							<input style="border: 0px;width: 1.5em;height: 1.5em;" class="circle" type="radio" name="experience" value="good">
							<label style="font-size:25px;" for="experience" class="radio-inline">Yes</label>
							

							
							<br>


							
								<input style="border: 0px;width: 1.5em;height: 1.5em;" class="circle" type="radio" name="experience" value="bad">

								<label style="font-size:25px;" for="experience" class="radio-inline">No</label>
						</div>

							<div class="form-group">
								
									<label for="fullName" class="col-md-12">Full Name*<br>
									<input class="form-control" type="text" id="text" required="" name="fullName" placeholder="Full Name"></label>
							</div>

							<div class="form-group">
								<label for="phone" class="col-md-12">Phone*<br>
								<input class="form-control" type="number" name="phone" id="text" required="" placeholder="Contact number"></label>
							</div>
							

						</div>



						<div class="col-md-6 col-xs-12">

							<div class="form-group">

								<label for="mail" class="col-md-12">Email*<br>
								<input class="form-control" name="mail" type="text" id="text" required="" placeholder="Email ID"></label>

							</div>

							<div class="form-group">

								<label for="suggestion" class="col-md-12">Suggestions*<br>
								<textarea class="form-control" name="suggestion" id="message" required="" placeholder="Please give us your valuable feedback!" cols="48" rows="5"></textarea></label>

							</div>


						</div>

						<div>
					
							<button class="btn btn-primary feedback-sub-btn">Submit</button>

						</div>
						<div style="visibility: hidden;">

							<label for="eventID" class="eventID">
							<input type="text" name="eventID" value='.$eventId.'>
						</label><br></div>

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
  </body>
</html>

