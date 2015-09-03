<?php
        session_start();
		include("credits.php");
        $tripid=$_SESSION['TRIPID'];
        $connection = mysql_connect("localhost", "root", "") or die("Cannot connect");
        $db = mysql_select_db("members", $connection) or die("Cannot select db");
        $query = mysql_query("select * from `offers` where tripid='$tripid'");
        $rows = mysql_num_rows($query);
        if ($rows > 0)
        {
            if($row=mysql_fetch_array($query))
            {
                echo '<html><link href="bootstrap.css" type="text/css" rel="stylesheet"><link href="style.css" type="text/css" rel="stylesheet"><body>';
                echo '<form class="form-horizontal" action=bookaseat.php method=post>

<br><br><br><br>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="noofseats">No. of Seats</label>  
  <div class="col-md-2">
  <input id="noofseats" name="number" type="number" placeholder="" class="form-control input-md" required>
    
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="submit"></label>
  <div class="col-md-4">
    <button id="submit" name="submit" class="btn btn-info">Book Seats</button>
  </div>
</div>
</form>
</body></html>';
            }
        }
        mysql_close($connection); // Closing Connection
?>
