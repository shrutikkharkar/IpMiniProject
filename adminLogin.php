<!doctype html>
<html lang="en">
  <head>
    <title>Admin Login</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <style>
      
      .container{
          display: flex;
          flex-direction: column;
          justify-content: center;
          
      }

      .page-header{
        text-align: center;
        font-size: 2em;
        color: cadetblue;
        padding-top: 20px;
      }
      
      

      .btn{
          left: 0;
        
      }

      form{
          height: 500px;
          display: flex;
          /* justify-content: center; */
          align-items: center;
          align-self: center;
          flex-direction:column;
          /* border: 5px solid rgb(92, 199, 167); */
          background-color: rgb(227, 245, 239);
          padding-top: 70px;
          padding-right: 50px;
          padding-left: 30px;
          
          box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
          
          
      }

      .fromDiv{
          
          /* margin-top:10%; */
          display: flex;
          justify-content: center;
          align-items: center;
          align-content: center;
          align-self: center;
          
      }

      label {
          font-size:1.6em;
          padding-top: 20px;
          padding-left: 15px;
          display: inline-block;
          text-align: right;
      }

      input {
          height:50px;
          width: 300px;
          font-size:20px;
          margin-bottom: 30px;
          border:none;
          padding-left:10px;
          padding-right:10px;
          
      }


      button{
          
          margin-bottom: 20px;
          margin-top: 10px;
      }

      #login {
          margin-top: 20px;
          margin-bottom:20px;
          width:100px;
      }

      #ShowPassword{
          width: 20px;
          margin-left: 39%;
      }





  </style>
  <body>
      
    <div class="container">

        <div class="page-header">
            <h1>VCET-IT Events</h1>
        </div>


        <div>
            <nav class="nav" id="home">
              <button type="button" class="btn btn-info" >
                <a class="nav-link active" href="index.html" style="color: white;">Home</a>
              </button>
      
            </nav>
        </div>

        <?php

    
        
        $con = mysqli_connect("localhost","root","","event") or die("Connection failed") ;

        if(!empty($_POST['save']))
        {
            $username = $_POST['userName'];
            $password = $_POST['password'];
            
            $password = md5($password);
            $sql = "SELECT * FROM admin WHERE Username = '$username' AND Password = '$password'";
            $result =mysqli_query($con,$sql);
            $count = mysqli_num_rows($result);
            if ($count>0)
            {
                
                header("Location: eventControl.php");
                exit();
            }
            else{
                
                echo'<div class="alert alert-danger">
                    <strong>Warning!</strong> Invalid Username of Password.
                </div>';
            }
        }
       
       
        
        ?>

        <div class="fromDiv">
            <form method="post">

                <div>

                    <input type="text" placeholder="Enter Username" name="userName" id="adminUsername">

                </div>

                <div>

                    <input type="password" style="margin-bottom:0" placeholder="Enter Password" name="password" id="adminPassword"><br>
                    <div style="dispaly:flex;flex-direction:row;">
                    <input style="margin-top:0;margin-left:0;" type="checkbox" name="ShowPassword" id="ShowPassword">
                    <span style="float: right;padding-right: 160px;padding-top: 14px;">Show Password</span></div>
                </div>

                <input class="btn btn-primary" type="submit" name="save" id="login" value="Login">
               
                
            </form>
        </div>












    </div>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script>

      $(document).ready(function(){
    

        // $('#goTo').onload(function(){
        //     window.location.href = "eventControl.php";
        // })

        // Function to show password
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
</html>