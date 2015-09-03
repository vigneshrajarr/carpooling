<?php
session_start();
include("credits.php");
$username=$_SESSION['username'];
$name=$_SESSION['name'];
$credits=$_SESSION['credits'];
$email=$_SESSION['email'];
$connection = mysql_connect("localhost", "root", "") or die("Cannot connect");
$db = mysql_select_db("members", $connection) or die("Cannot select db");
?>
<html>
    <title>Home</title>
    <head>
		<link rel="stylesheet" type="text/css" href="style.css" />
		<style>
		body
		{
			background:#98e3d5;
		}
		</style>
    </head>
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
                <li><a href="#">Profile</a></li>
                <li><a href="transactions.php">Transactions</a></li>
				<li><a href="settings.php">Settings</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </li>
	</ul></div>
	</div>
        <div id="options">
        <div id="left-div" style="float:left;">
            <table>
            <tr><td><a id="myrides" href="#"><input type="button" name="rides" value="My Rides" class="btn btn-primary size"></a></td></tr>
            <tr><td><a id="myoffers" href="#"><input type="button" name="offers" value="My Offers" class="btn btn-success size"></a></a></td></tr>
            <tr><td><a id="mycars" href="#"><input type="button" name="cars" value="My Cars" class="btn btn-warning size"></a></td></tr>
            <tr><td><a id="mypreferences" href="#"><input type="button" name="preferences" value="Preferences" class="btn btn-info size"></td></tr>
        </table>
        </div>
        <div id="right-div" style="float:left;margin-left:50px;">
                <?php
                    $sql="SELECT * FROM RIDES WHERE USERNAME='$username'";
                    $query = mysql_query($sql);
                    $rows = mysql_num_rows($query);
                    echo '<div id="rides">';
                    if($rows==0 )
                    {
                        echo '<table class="table rides"><tr><td colspan="4">No Rides Joined</td></tr></table>';
                    }
                    else
                    {
                        echo '<table class="table rides">
                            <tr>
                            <th>Trip Id</th>
                            <th>Offered By</th>
                            <th>From</th>
                            <th>To</th>
                            <th>TripType</th>
                            <th>Date</th>
                            </tr>
                            <tbody>';
                        while( $row = mysql_fetch_array($query))
                        {
							$sql1="SELECT * FROM OFFERS WHERE TRIPID='{$row['TRIPID']}'";
                    		$query1 = mysql_query($sql1);
							while( $row1 = mysql_fetch_array($query1))
							{
                            	echo "<tr><td>{$row['TRIPID']}</td><td>{$row1['USERNAME']}</td><td>{$row['SOURCE']}</td><td>{$row['DESTINATION']}</td><td>{$row['TRIPTYPE']}</td><td>{$row['DATE']}</td></tr>\n";
							}
                        }
                        echo '</tbody></table>';
                    }
                    echo '</div>';?>
                <?php
                    $sql="SELECT * FROM offers WHERE USERNAME='$username'";
                    $query = mysql_query($sql);
                    $rows = mysql_num_rows($query);
                    echo '<div id="offers" hidden>';
                    if($rows==0 )
                    {
                        echo '<table class="table offers"><tr><td colspan="4">No Rides Offered</td></tr></table>';
                    }
                    else
                    {
                        echo '<table class="table offers">
                        <thead>
                        <tr>
                        <th>Trip Id</th>
                        <th>From</th>
                        <th>To</th>
                        <th>TripType</th>
                        <th>Date</th>
                        <th>Car</th>
                        </tr>
                        </thead>
                        <tbody>';
                        while( $row = mysql_fetch_array( $query ) )
                        {                        
                        echo "<tr><td>{$row['TRIPID']}</td><td>{$row['SOURCE']}</td><td>{$row['DESTINATION']}</td><td>{$row['TRIPTYPE']}</td><td>{$row['DATE']}</td><td>{$row['CAR']}</td></tr>\n";
                        }
                        echo '</tbody></table>';
                    }
                    echo '</div>';
                    ?>
                <?php
                    $sql="SELECT * FROM cars WHERE USERNAME='$username'";
                    $query = mysql_query($sql);
                    $rows = mysql_num_rows($query);
					echo '<div id="cars" hidden>';
                    if($rows==0 )
                    {
                        echo '<table class="table cars"><tr><td colspan="4">No cars Added</td></tr></table>';
                        echo '<br><a href="registercar.php"><button type="button" class="btn btn-primary">+ Add a car</button></a>';
                    }
                    else
                    {
                        echo '<table class="table cars">
                        <thead>
                        <tr>
                        <th>Registration Number</th>
                        <th>Brand</th>
                        <th>Colour</th>
                        <th>No. of Seats</th>
                        <th>Comfortness</th>
                        </tr>
                        </thead>
                        <tbody>';
                        while( $row = mysql_fetch_array( $query ) )
                        {                        
                            echo "<tr><td>{$row['REGNUM']}</td><td>{$row['BRAND']}</td><td>{$row['COLOR']}</td><td>{$row['NOOFSEATS']}</td><td>    {$row['COMFORTNESS']}</td></tr>";
                        }
                        echo '<tr><td colspan=5><a href="registercar.php"><button class="btn btn-warning">+ Add a Car</button></a></td></tr></tbody></table>';
						echo "</div>";
                    }
            ?>
			<?php
                    echo '<div id="preferences" hidden>';
                    $sql="SELECT * FROM `preferences` WHERE EMAIL='$email'";
                    $query = mysql_query($sql);
					echo "<table class='table preferences'><thead><tr><th>Smoking</th><th>Drinks</th><th>Eatables</th><th>Pets</th><th>Loquacious</th><th>Accompanier</th></tr></thead><tbody>";
					$rows = mysql_num_rows($query);
					if($rows>0)
					{
                    	while( $row = mysql_fetch_array( $query ) )
						{                        
							echo "<tr><td><span class=smoking>{$row['SMOKING']}</span></td><td><span class=drinks>{$row['DRINKS']}</span></td><td><span class=eatables>{$row['EATABLES']}</span></td><td><span class=pets>{$row['PETS']}</span></td><td><span class=loquacious>{$row['LOQUACIOUS']}</span></td><td><span class=accompanier>{$row['ACCOMPANIER']}</span></td></tr>";
                    	}
					}
					echo '<tr><td colspan="6"><a href="#" id="update"><button type="button" class="btn btn-info">Update Preferences</button></a></td></tr></tbody></table>';
					echo "</div>";
            ?>
			<?php
					echo "<div id=updatepreferences hidden>";
echo '<form class=form-horizontal>';
echo '<div class="form-group">
  <label class="col-md-4 control-label" for="smoking">Smoking</label>
  <div class="col-md-2">
    <select id="smoking" name="smoking" class="form-control">
      <option value="Not Allowed">Not Allowed</option>
      <option value="Allowed">Allowed</option>
    </select>
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" for="pets">Pets</label>
  <div class="col-md-2">
    <select id="pets" name="pets" class="form-control">
      <option value="Not Allowed">Not Allowed</option>
      <option value="Allowed">Allowed</option>
    </select>
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" for="eatables">Eatables</label>
  <div class="col-md-2">
    <select id="eatables" name="eatables" class="form-control">
      <option value="Not Allowed">Not Allowed</option>
      <option value="Allowed">Allowed</option>
    </select>
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" for="loquacious">Loquacious</label>
  <div class="col-md-2">
    <select id="loquacious" name="loquacious" class="form-control">
      <option value="Preferred">Preferred</option>
      <option value="Not Preferred">Not Preferred</option>
    </select>
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" for="drinks">Drinks</label>
  <div class="col-md-2">
    <select id="drinks" name="drinks" class="form-control">
      <option value="Should not be a boozer">Should not be a boozer</option>
      <option value="May be a boozer">May be a boozer</option>
    </select>
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" for="accompanier">Accompanier</label>
  <div class="col-md-2">
    <select id="accompanier" name="accompanier" class="form-control">
      <option value="Ladies Only">Ladies Only</option>
      <option value="Gents Only">Gents Only</option>
      <option value="Gender Doesn\'t Matter1">Gender Doesn\'t Matter</option>
    </select>
  </div>
</div>
<!-- Button -->
<div class="form-group">
  <div class="col-md-4">
    <a href="#" id=updatevalues><button name="updatevalues" class="btn btn-info">Update</button></a>
  </div>
</div>';
					echo "</div></form>";
?>
        <script src="jquery-2.1.3.min.js"></script>
        <script src="script.js"></script>
        </div>
    </div>
    </body>
</html>