<?php
session_start();
include("credits.php");
$username=$_SESSION['username'];
$name=$_SESSION['name'];
$credits=$_SESSION['credits'];
$status=$_SESSION['status'];
if($status==1)
{
	header("Location:offer.php");
}
?>
<html>
    <title>Home</title>
    <head>
    </head>
	
    <link rel="stylesheet" type="text/css" href="bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="style.css" />
    <style>
        .form
        {
			position:relative;
            margin-top:100px;
            margin-left:300px;
        }
		.alert1
		{
			margin-left:400px;
			margin-top:200px;
		}
    </style>
    <body>
    <br><br><br>
    <div class="menu">
	<div style="float:left"><img src="gotocabs.png" height=70px width=275px alt="logo"></div>
	<div style="float:left; margin-left:20px;margin-top:20px"><ul>
        <li><a href="home.php">Home</a></li>
        <li><a href="offer.php">Offer</a></li>
        <li><a href="home.php">Join</a></li>
		<li><a class="username" href="#"><?php echo $name; ?></a>
            <ul>
                <li><a href="profile.php">Profile</a></li>
                <li><a href="transactions.php">Transactions</a></li>
                <li><a href="profile.php">Credits (&#8377; <?php echo $credits;?>)</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </li>
	</ul></div>
	</div>
        <br><br><br><br>
        <div class="form">
    <form class="form-horizontal" action="upload.php" method="post" enctype="multipart/form-data">
<div class="form-group">
  <label class="col-md-4 control-label" for="image1">User's Photo</label>
  <div class="col-md-4">
    <input id="image1" name="image1" class="input-file" type="file" required>
  </div>
</div>

<!-- File Button --> 
<div class="form-group">
  <label class="col-md-4 control-label" for="image2">License</label>
  <div class="col-md-4">
    <input id="image2" name="image2" class="input-file" type="file" required>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="licensenumber"></label>  
  <div class="col-md-2">
  <input id="licensenumber" name="licensenumber" type="text" placeholder="License Number" class="form-control input-md" minlength="15" maxlength="15" pattern="[a-zA-Z0-9]+" required>
    
  </div>
</div>

<!-- File Button --> 
<div class="form-group">
  <label class="col-md-4 control-label" for="image3">Voter's ID</label>
  <div class="col-md-4">
    <input id="image3" name="image3" class="input-file" type="file" required>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="voteridnumber"></label>  
  <div class="col-md-2">
  <input id="votenumber" name="votenumber" type="text" placeholder="Voter's ID number" class="form-control input-md" pattern="[a-zA-Z0-9]+" minlength="15" maxlength="15" required>
    
  </div>
</div>
        <div class="form-group">
  <label class="col-md-4 control-label" for="submit"></label>
  <div class="col-md-4">
    <button id="submit" name="submit" class="btn btn-primary">Submit</button>
      

  </div>
</div>
</form>
        </div>
<div><span class="alert alert-success alert1"><strong>Attention!</strong>Your Identification is not Verified. Fill the above details to become eligible to offer.</span></div>
    </body>
</html>