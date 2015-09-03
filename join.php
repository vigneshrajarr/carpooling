<?php
include('login.php');
$username=$_SESSION['username'];
$name=$_SESSION['name'];
?>
<html>
    <title>Home</title>
    <head>
        <script>
            function isNumber(evt) 
            {
                evt = (evt) ? evt : window.event;
                var charCode = (evt.which) ? evt.which : evt.keyCode;
                if (charCode > 31 && (charCode < 48 || charCode > 57))
                {
                    return false;
                }
                return true;
            }
            

        </script>
        <style>
            .form
            {
                margin-left:350px;
            }
        </style>
    </head>
    <link rel="stylesheet" type="text/css" href="offer.css" />
    <link rel="stylesheet" type="text/css" href="bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link rel="stylesheet" type="text/css" href="profile.css" />
    <script type="text/javascript" src="script.js"></script>
    <body>
        <br><br><br>
        <div class="menu">
	<ul>
        <li><a href="home.php">Home</a></li>
        <li><a href="offer.php">Offer</a></li>
        <li><a href="home.php">Join</a></li>
		<li><a href=""><?php echo $name; ?></a>
            <ul>
                <li><a href="profile.php">Profile</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </li>
	</ul>
        </div>
        <br><br><br><br><br>
        <div class="form">
        <form class="form-vertical" action="joinresults.php" method="post">
<!-- Text input-->
<div class="form-group">
  
  <div class="col-md-2">
  <input id="from" name="from" type="text" placeholder="From" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <div class="col-md-2">
  <input id="to" name="to" type="text" placeholder="To" class="form-control input-md">
    
  </div>
</div>

<div class="form-group">
  <div class="col-md-2">
        <input id="date" type="date" name="date" class="form-control" value="" required>
    </div>
</div>

<!-- Button -->
<div class="form-group">
  <div class="col-md-4">
    <input type="submit" id="submit" name="submit" class="btn btn-primary" value="Search">
  </div>
</div>
</form>
            </div>

    </body>
</html>