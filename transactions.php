<?php
session_start();
include("credits.php");
$username=$_SESSION['username'];
$name=$_SESSION['name'];
$email=$_SESSION['email'];
$credits=$_SESSION['credits'];
$connection = mysql_connect("localhost", "root", "") or die("Cannot connect");
$db = mysql_select_db("members", $connection) or die("Cannot select db");
?>
<html>
    <title>My Transactions</title>
    <head>
	<link rel="stylesheet"  href="bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="star-rating.css" media="all" rel="stylesheet" type="text/css"/>
    <script src="jquery.min.js" type="text/javascript"></script>
    <script src="jquery-2.1.3.min.js" type="text/javascript"></script>
    <script src="star-rating.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="style.css" />
	</head>
    <style>
		@font-face
		{
			font-family:'halflings-regular';
			src:url(fonts/glyphicons-halflings-regular.woff);
		}
        #details
        {
            position:absolute;
            top:200px;
			left:250px;
        }
		.setoffers
		{
			table-layout:fixed;
			width:875px;
			margin-left:240px;
			margin-top:225px;
		}
		.setrides
		{
			table-layout:fixed;
			width:875px;
			margin-left:240px;
			margin-top:20px;
		}
		.setrides1
		{
			table-layout:fixed;
			width:875px;
			margin-top:225px;
			margin-left:240px;
		}
		body
		{
			background:#98e3d5;
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
		<li id="username"><a href="#"><?php echo $name; ?></a>
            <ul>
                <li><a href="profile.php">Profile</a></li>
                <li><a href="#">Transactions</a></li>
				<li><a href="settings.php">Settings</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </li>
	</ul></div>
	</div>
		<div id="details">
		<ul class="nav nav-tabs">
  			<li role="presentation" class="active" id="history"><a href="#">History</a></li>
  			<li role="presentation" id="offers"><a href="#">Upcoming Offers</a></li>
  			<li role="presentation" id="rides"><a href="#">Upcoming Rides</a></li>
		</ul>
		</div>
		<div id="dhistory">
			<?php
                    $sql="SELECT * FROM `offers` WHERE USERNAME='$username' order by `DATE`";
                    $query = mysql_query($sql);
                    $rows = mysql_num_rows($query);
                    echo '<div id="offers">';
                    if($rows==0 )
                    {
                        echo '<table class="table offers setoffers"><tr><td colspan="4">No History.</td></tr></table>';
                    }
                    else
                    {
                        echo '<table class="table offers setoffers"><tr><th>Trip Id</th><th>From</th><th>To</th><th>TripType</th><th>Date</th><th>Car</th><th>Rating</th></tr><tbody>';
                        while( $row = mysql_fetch_array( $query ) )
                        {
							$trip=$row['TRIPID'];
							$avg=mysql_query("select sum(RATING) as avgvalue from rides where tripid='$trip'");
							$avgvalue=mysql_fetch_array($avg);
							//echo "{$row['TRIPID']}";
							//echo "{$avgvalue['avgvalue']}";
							//echo "{$row['NORATED']}";
							if($row['NORATED']>0)
								$avgvalue['avgvalue']=$avgvalue['avgvalue']/$row['NORATED'];
							else
								$avgvalue['avgvalue']="-";
                        	echo "<tr><td>{$row['TRIPID']}</td><td>{$row['SOURCE']}</td><td>{$row['DESTINATION']}</td><td>{$row['TRIPTYPE']}</td><td>{$row['DATE']}</td><td>{$row['CAR']}</td><td>";
							$up=number_format((float)$avgvalue['avgvalue'],1,'.','');
							if($avgvalue['avgvalue']=="-")
							{
								echo "-";
							}
							else if($avgvalue['avgvalue']<=1)
							{
								echo "<font color=#ac2925>$up</font>";
							}
							else if($avgvalue['avgvalue']<=2)
							{
								echo "<font color=#eea236>$up</font>";
							}
							else if($avgvalue['avgvalue']<=3)
							{
								echo "<font color=#46b8da>$up</font>";
							}
							else if($avgvalue['avgvalue']<=4)
							{
								echo "<font color=#204d74>$up</font>";
							}
							else if($avgvalue['avgvalue']<=5)
							{
								echo "<font color=#398439>$up</font>";
							}
							else{}
							echo "</td></tr>\n";
                        }
                        echo '</table>';
                    }
                    echo '</div>';
                    $sql="SELECT * FROM RIDES WHERE USERNAME='$username'";
                    $query = mysql_query($sql);
                    $rows = mysql_num_rows($query);
                    echo '<div id="rides">';
                    if($rows==0 )
                    {
                        echo '<table class="table rides setrides"><tr><td colspan="4">No Rides Joined</td></tr></table>';
                    }
                    else
                    {
                        echo '<table class="table rides setrides"><tr><th>Trip Id</th><th>Offered By</th><th>From</th><th>To</th><th>TripType</th><th>Date</th><th width=200px>Rating</th></tr><tbody>';
                        while( $row = mysql_fetch_array($query))
                        {
                            $sql1="SELECT * FROM OFFERS WHERE TRIPID='{$row['TRIPID']}'";
                    		$query1 = mysql_query($sql1);
							while( $row1 = mysql_fetch_array($query1))
							{
                            	echo "<tr><td>{$row['TRIPID']}</td><td>{$row1['USERNAME']}</td><td>{$row['SOURCE']}</td><td>{$row['DESTINATION']}</td><td>{$row['TRIPTYPE']}</td><td>{$row['DATE']}</td><td width=200px>";
								if($row['RATING']==0)
								{
									if($row['DATE']>=date("Y-m-d"))
									{
										echo "Your ride has not been finished.";
									}
									else
										echo "<div class=container><input id=input-21e value=0 type=number class=rating min=0 max=5 step=0.5 data-size=xs></div></td></tr>\n";
								}
								else
								{
									echo "{$row['RATING']}/5.0";
								};
							}
                        }
                        echo '</table>';
                    }
                    echo '</div>';?>
		</div>
		<div id="doffers" hidden>
			<?php
					$date=date("Y-m-d");
                    $sql="SELECT * FROM `OFFERS` where USERNAME='$username' AND `DATE` >= DATE_ADD(CURDATE(),INTERVAL 2 DAY);";
                    $query = mysql_query($sql);
                    $rows = mysql_num_rows($query);
                    echo '<div id="offers">';
                    if($rows==0 )
                    {
                        echo '<table class="table offers setoffers"><tr><td colspan="4">No Upcoming Offers.</td></tr></table>';
                    }
                    else
                    {
                        echo '<table id="canceloffer" class="table offers setoffers"><tr><th>Trip Id</th><th>From</th><th>To</th><th>TripType</th><th>Date</th><th>Car</th><th>Cancel</th></tr>';
                        while( $row = mysql_fetch_array( $query ) )
                        {                        
                        echo "<tr><td>{$row['TRIPID']}</td><td>{$row['SOURCE']}</td><td>{$row['DESTINATION']}</td><td>{$row['TRIPTYPE']}</td><td>{$row['DATE']}</td><td>{$row['CAR']}</td><td><button id=cancel class='btn btn-danger'><strong>x </strong>Cancel</button></td></tr>\n";
                        }
                        echo '</table>';
                    }
                    echo '</div>';
				?>
		</div>
		<div id="drides" hidden>
			<?php
					//$date=date("Y-m-d");
					$sql="SELECT * FROM `RIDES` where USERNAME='$username' AND `DATE` >= DATE_ADD(CURDATE(),INTERVAL 2 DAY);";
                    $query = mysql_query($sql);
                    $rows = mysql_num_rows($query);
                    echo '<div id="rides">';
                    if($rows==0 )
                    {
                        echo '<table class="table rides setrides1"><tr><td colspan="4">No Upcoming Rides.</td></tr></table>';
                    }
                    else
                    {
                        echo '<table id="cancelride" class="table rides setrides1"><tr><th>Trip Id</th><th>Offered By</th><th>From</th><th>To</th><th>TripType</th><th>Date</th><th>Cancel</th></tr><tbody>';
                        while( $row = mysql_fetch_array($query))
                        {
                            $sql1="SELECT * FROM OFFERS WHERE TRIPID='{$row['TRIPID']}'";
                    		$query1 = mysql_query($sql1);
							while( $row1 = mysql_fetch_array($query1))
							{
                            	echo "<tr><td>{$row['TRIPID']}</td><td>{$row1['USERNAME']}</td><td>{$row['SOURCE']}</td><td>{$row['DESTINATION']}</td><td>{$row['TRIPTYPE']}</td><td>{$row['DATE']}</td><td><button id=cancel class='btn btn-danger'><strong>x </strong>Cancel</button></td></tr>\n";
							}
                        }
                        echo '</table>';
                    }
                    echo '</div>';
			?>
		</div>
    </body>
	<script src="jquery-2.1.3.min.js"></script>
	<script src="script.js"></script>
	<script>
		$("#history").click(function(){
			$("#history").addClass("active");
			$("#offers").removeClass("active");
			$("#rides").removeClass("active");
			$("#dhistory").show();
			$("#doffers").hide();
			$("#drides").hide();
		});
		$("#offers").click(function(){
			$("#history").removeClass("active");
			$("#offers").addClass("active");
			$("#rides").removeClass("active");
			$("#dhistory").hide();
			$("#doffers").show();
			$("#drides").hide();
		});
		$("#rides").click(function(){
			$("#history").removeClass("active");
			$("#offers").removeClass("active");
			$("#rides").addClass("active");
			$("#dhistory").hide();
			$("#doffers").hide();
			$("#drides").show();
		});
	</script>
</html>