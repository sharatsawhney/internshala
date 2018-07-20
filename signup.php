<?php 
    session_start();
	if(isset($_SESSION['id'])){
	    header('Location: dashboard.php');
	}else{
		$link = mysqli_connect("127.0.0.1","root","Root@123","intern");
		if(mysqli_connect_error()){
			die("The connection was not established!");
		}
		if($_POST){
			if($_POST['email'] != "" && $_POST['password'] != ""){
				$query = "INSERT INTO users (email,password) VALUES ('".mysqli_real_escape_string($link,$_POST['email'])."','".mysqli_real_escape_string($link,md5($_POST['password']))."')";
				$result = mysqli_query($link,$query);
				$_SESSION['id'] = mysqli_insert_id($link);
				header('Location: dashboard.php');
			}else{
				$message = "Please Fill all the details!";
			}
		}
	}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<meta name="description" content="workshops">
		<meta name="author" content="intern">

		<title>Sign Up</title>

		
		<link rel="stylesheet" href="bootstrap.css">

		<link href="style.css" rel="stylesheet">
    </head>
	<body style="background:url('background.jpg') no-repeat center center fixed;background-size:100% 100%">
	  
	  <nav class="navbar navbar-inverse navbar-fixed-top">
	  <div class="container">
		<div class="navbar-header">
		  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		  </button>
		  <a class="navbar-brand" href="index.php">Workshopper</a>
		</div>
		<div id="navbar" class="navbar-collapse collapse">
		  <ul class="nav navbar-nav">
			<li><a href="index.php">Home</a></li>
			<li><a href="login.php">Login</a></li>
			<li class="active"><a href="signup.php">Signup</a></li>
		  </ul>
		</div>
	  </div>
	  </nav>

	  
	  <div class="wrapper">
	    <h4 style="margin-left:30px">Sign Up to Access our workshops!</h4><br>
	    <div class="signupform text-center" style="background-color:#F7F7F7;">
		  <img src="profile.png"><hr>
		  <?php if(isset($message)){echo $message; }  ?>
		  <form method="post">
		  <div class="form-group">
		    <input type="email" name="email" placeholder="Enter Your Email Address.." class="form-control">
		    <input type="password" name="password" placeholder="Password" class="form-control">
			<button type="submit" class="btn btn-primary btn-lg btn-block" style="margin:0 auto;width:83%;margin-top:10px;">Sign Up</button>
	   	  </div>  
		  </form>
	    </div>
	  </div>
	  
	  
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    
      <script src="bootstrap.js"></script>
	</body>
</html>	