<?php
session_start();
    if(isset($_SESSION['username']))
    {
        header("location:index.php");
    }
    include('dbConnection.php');
    include('functions.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="assets/css/login.css">
   

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>



</head>
<body>
<div id="box">
  <p id="flashlight">
    <span id="flash">&nbsp;&nbsp;WEBSTACK</span>
  </p>
</div>
	<center>
    <div class="form">
        <h2 id="head1">REGISTER</h2>
        <div class="inp">
        <div class="inputbox">
        	<form method="post" id="curform" name="currentform">
            <label>Email</label>
            <input id="email" required name="Email" type="text" placeholder="Enter Email" spellcheck="false">
             <label>Username</label>
            <input id="username" required name="Username" type="text" placeholder="Enter Name" spellcheck="false">
            <label>Password</label>
            <input id="password" required name="Password" type="text" placeholder="Password" spellcheck="false">
            <div class="inputbox">
            <input id="submitbtn"  class="btn btn-warning" type="submit" value="REGISTER">
        </div>
            </form>
        </div>
        </div>
    </div>
    <div class="alert">
  <span class="closebtn" onclick="this.parentElement.style.visibility='hidden';">&times;</span>
 <span id="info"> Please Enter Information :)</span>
</div>
    </center> 
    <style type="text/css">

            
html {
   font-family: Geneva, sans-serif;
  
}

#flashlight {
  color: hsla(0,0%,0%,0);
  perspective: 80px;
  outline: none;
}
#flash {
  display: inline-block;
  text-shadow: #bbb 0 0 1px, #fff 0 -1px 2px, #fff 0 -3px 2px, rgba(0,0,0,0.8) 0 30px 25px;
  color:white;
    
}
#box {
  text-align:left;
  min-width: 500px;
  font-size: 3em;
  font-weight: bold;
  -webkit-backface-visibility: hidden; /* fixes flashing */
  background-color:black;
}    	
			body
			{
				
    		background-repeat: no-repeat;
    		background-size:cover;
            background-color:#012127; 
    		}
			.form
			{
				background-color:#012127;  
        border:solid black;

			}
                .alert {
    padding: 20px;
    background-color: #f44336; /* Red */
    color: white;
    margin-bottom: 15px;
    visibility:hidden;
    position:fixed;
    width:40vw;
    right:15px;
    }

/* The close button */
.closebtn {
  margin-left: 15px;
  color: white;
  font-weight: bold;
  float: right;
  font-size: 22px;
  line-height: 20px;
  cursor: pointer;
  transition: 0.3s;
}

/* When moving the mouse over the close button */
.closebtn:hover {
  color: black;
}
body
{ /* For browsers that do not support gradients */
 }
h2
{
    background-image: repeating-linear-gradient(#3d405b, black 10%, black 20%);
    color:white;
    font-style: bold;
}

    </style>
</body>
<script>
  $("#submitbtn").click(function (e) { 
      e.preventDefault();
      let regex = /^([_\-\.0-9a-zA-Z]+)@([_\-\.0-9a-zA-Z]+)\.([a-zA-Z]){2,7}$/; 
      /*
      
                  */
      let ErrorString="";
      if(regex.test(document.querySelector("#email").value)==false)
      {
        ErrorString+="Email";
      }
      if(document.querySelector("#username").value.trim()=="")
      {
        ErrorString+=", Username";
      }
      if(document.querySelector("#password").value.trim()=="")
      {
        ErrorString+=", Password";
      }
      if(ErrorString.trim()!="")
      {
        document.getElementById("info").innerHTML="PLEASE PROVIDE VALID "+ErrorString;
                  document.querySelector(".alert").style.visibility="visible";
                  ErrorString="";
                  return false;
      }
      else
      {
        document.forms['curform'].submit();
      }
  });
</script>
<?php 
$con=ConnectDB();
if (isset($_POST['Username'])&& isset($_POST['Password'])&&isset($_POST['Email'])) {
	
	checkEmail($_POST['Username'],$_POST['Password'],$_POST['Email'],$con);

}
function checkEmail($username,$password,$email,$con)
{
// $email=mysqli_real_escape_string($con,$email);
 //$password=mysqli_real_escape_string($con,$password);
 //$username=mysqli_real_escape_string($con,$username);
  $query4insert="INSERT INTO wbs_user_info VALUES ('$email', NULL, '$username', '$password')";
 	if (mysqli_query($con,$query4insert)) {
 		$result=mysqli_query($con,"select USER_ID from wbs_user_info where EMAIL='$email'");
 		$row=mysqli_fetch_array($result);
    	$_SESSION['username']=$row['USER_ID'];
    	$_SESSION["allpage"]=true;
    	echo "<script>window.location.href='http://localhost/WebStack/index.php'</script>"	;
 	}
 else
 {
 	$msg="EMAIL IS ALREADY EXIST TRY DIFFERENT ONE";
 	echo "<script>document.getElementById('info').innerHTML='EMAIL IS ALREADY EXISTS TRY DIFFENT ONE';document.querySelector('.alert').style.visibility='visible';</script>";
 }
}
 ?>
</html>
