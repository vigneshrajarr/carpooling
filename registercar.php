<?php
include('login.php');
include("credits.php");
$username=$_SESSION['username'];
$name=$_SESSION['name'];
$credits=$_SESSION['credits'];
?>
<html>
    <title>Register Your Car</title>
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
        .name
        {
            text-transform:capitalize;
        }
        </style>
    </head>
    <link rel="stylesheet" type="text/css" href="bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="style.css" />
    <body>
    <br><br><br>
    <div class="menu">
	<div style="float:left"><img src="gotocabs.png" height=70px width=275px alt="logo"></div>
	<div style="float:left; margin-left:20px;margin-top:20px"><ul>
        <li><a href="home.php">Home</a></li>
        <li><a href="offer.php">Offer</a></li>
        <li><a href="home.php">Join</a></li>
		<li id="username"><a href="#"><?php echo $name; ?></a>
            <ul>
                <li><a href="profile.php">Profile</a></li>
                <li><a href="transactions.php">Transactions</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </li>
	</ul></div>
	</div>
        <div id="joinoptions">
        <form class="form-horizontal" action="registercar1.php" method="post">
            <!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="regnum">Registration Number</label>  
  <div class="col-md-2">
  <input id="regnum" name="regnum" type="text" placeholder="" class="form-control input-md name" required>
    
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="brand">Brand</label>  
  <div class="col-md-2">
  <input id="brand" name="brand" type="text" placeholder="" class="form-control input-md name" required>
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="model">Model</label>  
  <div class="col-md-2">
  <input id="model" name="model" type="text" placeholder="" class="form-control input-md name">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="seatsavailable">Seats Available</label>  
  <div class="col-md-2">
  <input id="seatsavailable" name="seatsavailable" type="number" placeholder="" class="form-control input-md" onkeypress="return isNumber(event) max=5">
    
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="color">Colour</label>
  <div class="col-md-2">
    <select id="color" name="color" class="form-control">
      <option value="Black">Black</option>
      <option value="Blue">Blue</option>
      <option value="Brown">Brown</option>
      <option value="Gray">Gray</option>
      <option value="Green">Green</option>
      <option value="Red">Red</option>
      <option value="Silver">Silver</option>
      <option value="White">White</option>
      <option value="Yellow">Yellow</option>
      <option value="Others">Others</option>
    </select>
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="comfortlevel">Comfort Level</label>
  <div class="col-md-2">
    <select id="comfortlevel" name="comfortlevel" class="form-control">
      <option value="Basic">Basic</option>
      <option value="Normal">Normal</option>
      <option value="Comfortable">Comfortable</option>
      <option value="Luxury">Luxury</option>
    </select>
  </div>
</div>
            <!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="luggage">Luggage</label>
  <div class="col-md-2">
    <select id="comfortlevel" name="luggage" class="form-control">
      <option value="Small">Small</option>
      <option value="Medium">Medium</option>
      <option value="Large">Large</option>
    </select>
  </div>
</div>
            <!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="singlebutton"></label>
  <div class="col-md-4">
    <input type="submit" id="addcar" name="addcar" class="btn btn-primary" value="Add Car">
  </div>
</div>
</form>
        </div>
    </body>
</html>