<!DOCTYPE html>
<html lang="en">
<head>
	<title>Create new Password</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/css?family=Roboto|Courgette|Pacifico:400,700" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/signin.css">
</head>
<body>
<div class="signin-form">
    <form action="" method="post">
		<div class="form-header">
			<h2>Create New Password</h2>
			<p>MyChat</p>
		</div>
		<div class="form-group">
			<label>Enter Password</label>
        	<input type="password" class="form-control" placeholder="Password" name="pass1" autocomplete="off" required="required">
        </div>
        <div class="form-group">
			<label>Confirm Password</label>
            <input type="password" class="form-control" placeholder="Confirm Password" name="pass2" autocomplete="off" required="required">
        </div>
		<div class="form-group">
			<button type="submit" class="btn btn-primary btn-block btn-lg" name="change">Change</button>
		</div>
    </form>
</div>
</body>
</html>
<?php 
// start session
session_start();

// include file
include("include/connection.php"); 

// change button is clicked
	if(isset($_POST['change'])){
		
		// get inputted value
		$user = $_SESSION['user_email'];
	    $pass1 = $_POST['pass1'];
	    $pass2 = $_POST['pass2'];

		// if the passwords r wrong...
	    if($pass1 != $pass2){
	        echo"
	          <div class='alert alert-danger'>
	            <strong>Your new password did't match with each other</strong> 
	          </div>
	        ";
		}
		// if the password is less than 8 characters
	    if($pass1 < 8 AND $pass2 < 8){
	        echo"
	          <div class='alert alert-danger'>
	            <strong>Use 8 or more than 8 characters</strong> 
	          </div>
	        ";
		}
		// if the pass and repass r the same then update the password row
	    if($pass1 == $pass2){
            $update_pass = mysqli_query($con, "UPDATE users SET user_pass='$pass1' WHERE user_email='$user'");
			session_destroy();
			// redirect user
            echo"
            	<script>alert('Go ahead and signin')</script>
            	<script>window.open('index.php','_self')</script>
            ";
        }
	
	}


?>