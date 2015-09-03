<?php
include('login.php');
include("credits.php");
$username=$_SESSION['username'];
$name=$_SESSION['name'];
$credits=$_SESSION['credits'];
$status=$_SESSION['status'];
if($status==0)
{
	header("Location:offerverification.php");
}
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
            (function()
            {
                var today = new Date().toISOString().split('T')[0];
                document.getElementsByName("date")[0].setAttribute('min', today);
                document.getElementById('date').valueAsDate = new Date();
            })();
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
    <script type="text/javascript" src="script.js"></script>
    <body>
        <br><br><br>
    <div class="menu">
	<div style="float:left"><img src="gotocabs.png" height=70px width=275px alt="logo"></div>
	<div style="float:left; margin-left:20px;margin-top:20px"><ul>
        <li><a href="home.php">Home</a></li>
        <li><a href="#">Offer</a></li>
        <li><a href="home.php">Join</a></li>
		<li id="username"><a href="#"><?php echo $name; echo " ";if($status==0) echo'<img height="20px" title="Your account has not been verified yet." width="20px" src="unverified.gif" alt="unverified">'; else echo'<img height="20px" width="25px" src="verified.png" title="Verified Account."  alt="verified">';?></a>
            <ul>
                <li><a href="profile.php">Profile</a></li>
                <li><a href="transactions.php">Transactions</a></li>
				<li><a href="settings.php">Settings</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </li>
	</ul></div>
	</div><br><br><br><br>
    <div id="register">
        <form class="form-horizontal" action="offerpublish.php" method="post">
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="from">From</label>  
  <div class="col-md-2">
  <input id="from" name="from" type="text" placeholder="" class="form-control input-md name" required>
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="to">To</label>  
  <div class="col-md-2">
  <input id="to" name="to" type="text" placeholder="" class="form-control input-md name" required>
    
  </div>
</div>

<!-- Multiple Radios -->
<div class="form-group">
  <label class="col-md-4 control-label" for="triptype">Trip Type</label>
  <div class="col-md-4">
  <div class="radio">
    <label for="triptype-0">
      <input type="radio" name="triptype" id="triptype-0" value="One-Way Trip" checked="checked" required>
      One-Way Trip
    </label>
	</div>
  <div class="radio">
    <label for="triptype-1">
      <input type="radio" name="triptype" id="triptype-1" value="Round Trip" required>
      Round Trip
    </label>
	</div>
  </div>
</div>
            <!-- Prepended text-->
<div class="form-group">
  <label class="col-md-4 control-label" for="price">Price</label>
  <div class="col-md-2">
    <div class="input-group">
      <span class="input-group-addon">&#8377;</span>
      <input id="price" name="price" class="form-control" placeholder="" type="number" required>
    </div>
    
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="cars" required>Select a car</label>
  <div class="col-md-2">
        <?php 
                $connection = mysql_connect("localhost", "root", "") or die("Cannot connect");
                $db = mysql_select_db("members", $connection) or die("Cannot select db");
                $result= mysql_query("SELECT * FROM cars where username='$username'");
                echo '<select id="cars" name="cars" class="form-control">';
                while($row= mysql_fetch_assoc($result))
                {
                    echo "<option value=".$row['REGNUM'].">".$row['REGNUM']." - ".$row['BRAND']."</option>";
                }
                echo "</select>";
?>
    </select>
      <a id="cars" class="btn btn-success"href="registercar.php">+ Add a car</a>
  </div>
</div>
        <!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="seatsoffered">Seats Offered</label>  
  <div class="col-md-2">
  <input id="seatsoffered" name="seatsoffered" type="number" placeholder="" max="10" class="form-control input-md" required>
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="date">Date of Journey</label>
  <div class="col-md-2">
    <div class="input-group">
        <input id="date" type="date" name="date" class="form-control" required>
    </div>
    
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" for="time">Time</label>
  <div class="col-md-2">
    <input id="time" name="time" type="time" value="00:00" class="form-control" required>
  </div>
</div><br>
<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="submit"></label>
  <div class="col-md-4">
    <input type="submit" id="submit" name="submit" class="btn btn-primary" value="Publish">
  </div>
</div>
</form>
</div>
    </body>
</html>