<?php
    session_start();
	if(array_key_exists('logout',$_GET)){
		header('Location: index.php');
		session_unset();
		session_destroy();
		$link = mysqli_connect("127.0.0.1","root","Root@123","intern");
		if(mysqli_connect_error()){
			die("The connection was not established!");
		}
	}
	if($_GET){
		if(isset($_SESSION['id'])){
			$link = mysqli_connect("127.0.0.1","root","Root@123","intern");
		    if(mysqli_connect_error()){
			die("The connection was not established!");
		    }
			$query2 = "SELECT workshops FROM users WHERE id = '".$_SESSION['id']."'";
			$run2 = mysqli_query($link,$query2);
			$row2 = mysqli_fetch_array($run2);
			$list = $row2[0];
			if( !is_int(strpos($list,$_GET['workshopid']))){	
			$query3 = "UPDATE users SET workshops = CONCAT(workshops,',".$_GET['workshopid']."') WHERE id = '".$_SESSION['id']."'";
			$run3 = mysqli_query($link,$query3);
			header('Location: dashboard.php');
			}else{
				$message = "You have already applied for this workshop!";
			}
			
		}else{
			header('Location: login.php');
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

		<title>Workshopper</title>

		
		<link rel="stylesheet" href="bootstrap.css">

		<link href="style.css" rel="stylesheet">
    </head>

    <body>
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
			<li class="active"><a href="index.php">Home</a></li>
			<li><a href="login.php">Login</a></li>
			<li><a href="signup.php">Signup</a></li>
		  </ul>
		</div>
	  </div>
	</nav>

    
    <div class="jumbotron text-center ">
	    <?php  if(isset($message)){   echo $message;} ?>
        <h1>Workshopper</h1>
        <p>By Internshala</p>
        <p><a class="btn btn-primary btn-lg" href="http://www.internshala.com" role="button">Learn More</a></p>
    </div>


    
    <div class="container">
      <h1 class="text-center" style="font-size:50px;margin-top:40px;"><strong>Trending Workshops</strong></h1>
      <hr class="workshop-divider">
      <?php
	    $link = mysqli_connect("127.0.0.1","root","Root@123","intern");
		if(mysqli_connect_error()){
			die("The connection was not established!");
		}
	    $query = "SELECT * FROM workshops";
		$result = mysqli_query($link,$query);
		while($row = mysqli_fetch_array($result)):
	  ?>
      <div class="row workshops">
        <div class="col-md-7">
          <h2 class="workshop-heading"><?php  echo $row['heading'];?></h2>  
		  <h4 class="text-muted"><?php echo $row['extra'];  ?></h4>
          <p class="lead"><?php echo $row['details'];  ?></p>
        </div>
      </div>
	  <form>
	  <input type="hidden" name="workshopid" value="<?php echo $row['id'];   ?>">
      <button type="submit" class="btn btn-primary btn-lg btn-block">Apply</button>
	  </form>
      <hr class="workshop-divider">
      <?php endwhile;  ?>

      
      <footer>
        <p class="pull-right"><a href="#">Back to top</a></p>
        <p>&copy; 2017 Company, Inc. 
      </footer>

    </div>
	
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    
    <script src="bootstrap.js"></script>
  </body>
</html>
