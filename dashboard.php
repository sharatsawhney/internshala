<?php
    session_start();
    if(isset($_SESSION['id'])){
		$link = mysqli_connect("127.0.0.1","root","Root@123","intern");
		if(mysqli_connect_error()){
			die("The connection was not established!");
		}
		$query = "SELECT email FROM users WHERE id = '".$_SESSION['id']."'";
		$run = mysqli_query($link,$query);
		$row = mysqli_fetch_array($run);
	}else{
		header('Location: index.php');
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

		<title>Dashboard</title>

		
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
			<li><a href="index.php">Home</a></li>
			<li><a href="login.php">Login</a></li>
			<li><a href="signup.php">Signup</a></li>
			<li style="position:absolute;right:2%;background-color:brown;"><a href="index.php?logout=1"  ><strong>Logout</strong></a></li>
		  </ul>
		</div>
	  </div>
	  </nav> 

      <div id="sidebar" style="background-color:lightgrey;position:fixed;left:0px;height:100%;width:20%;margin-top:50px;">
	    <h4 class="text-center lead">Hello,</h4>
		<h3 class="text-center"><strong><?php $data =  $row[0]; $short = substr($data,0,strpos($data,"@") ); echo strtoupper($short); ?></strong></h3>
		<hr style="border-color:red;width:75%;"><br><br>
		<div class="list-group">
		  <a  class="list-group-item text-center" style="height:100px"><strong>Applied Workshops</strong></a>
		  
        </div>
	  </div>
	  
	  <div id="main" style="position:absolute;right:0%;width:80%;height:100%;margin-top:50px;">
	    <div class="jumbotron text-center">
          <h1>Enrolled Workshops</h1>
          <p>Internshala</p>
  
        </div>
		<ul class="list-group">
		  <?php  
		    $query2 = "SELECT * FROM users WHERE id = '".$_SESSION['id']."'";
			$run2 = mysqli_query($link,$query2);
			$row2 = mysqli_fetch_array($run2);
			$workshops = $row2['workshops'];
			$array = array_map("intval",explode(",",$workshops));
			$i = 1;
			$num  = sizeof($array) -1;
			if(sizeof($array) >1){
			while($i <= $num):
		  ?>	
		  <li class="list-group-item"><?php
            $query3 = "SELECT heading FROM workshops WHERE id = '".$array[$i]."'";
            $run = mysqli_query($link,$query3);
            $row = mysqli_fetch_array($run);
            echo $row[0];
			$i = $i + 1;
		  ?></li>
			<?php  endwhile;}else{ echo "<div class='alert alert-warning'>You have not subscribed for any workshop!</div>";}?>
        </ul>
	  </div>
	
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    
      <script src="bootstrap.js"></script>
	</body>
</html>	