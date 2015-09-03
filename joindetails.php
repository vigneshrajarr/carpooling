<?php
session_start();
include("credits.php");
if(!isset($_SESSION['username']))
{
	header("Location:index.php");
}
$username=$_SESSION['username'];
$name=$_SESSION['name'];
$from=$_POST['from'];
$to=$_POST['to'];
$date=$_POST['date'];
$credits=$_SESSION['credits'];
$status=$_SESSION['status'];
?>
<html>
    <title>Home</title>
    <head>
    </head>
    <link rel="stylesheet" type="text/css" href="bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="style.css" />
    <script src="jquery-2.1.3.min.js"></script>
    <script src="script.js"></script>
    <style>
        #details
        {
            position:relative;
            top:100px;
        }
        #joindetails
        {
            margin:0px 200px 0px 200px;
            padding-top:0px;
        }
        .sample{
            display:none;
            background-color:rgba(0,0,250,0.1);
            color:black;
            border:0px;
            transition: background-color 0.5s;
        }
        .sample:hover
        {
            background-color:rgba(0,0,250,0.18);
        }
        .sample tr
        {
            line-height:100px;
        }
        #left
        {
            float:left;
            width:120px;
        }
        #middle1
        {
            float:left;
            width:300px;
            padding-left:40px;
        }
        #middle2
        {
            float:left;
            width:300px;
        }
        #right
        {
            float:left;
            width:200px;
        }
        #popup{
            position:fixed;
            top:0px;
            bottom:0px;
            left:0px;
            right:0px;
            text-align:center;
            opacity:0;
            background-color:rgba(0,0,0,0.8);
            z-index:9999;
            -webkit-transition: opacity 400ms ease-in;
	       -moz-transition: opacity 400ms ease-in;
	       transition: opacity 400ms ease-in;
	       pointer-events: none;
        }
         #popup:target
        {
            opacity:1;
            pointer-events: auto;
        }
        #close:target{
            opacity:0;
            pointer-events: none;
        }
        #inside
        {
            border-radius:5px;
            margin-top:270px;
            width:30%;
            display:block;
            background-color:white;
            margin-left:auto;
            margin-right:auto;
            padding:20px 0px;
            padding-top:10px;
        }
        .joindetails
        {
            border-collapse: collapse !important;
        }
        .header
        {
            font:22px sans-serif;
            padding:0px;
            border-bottom:1px solid #ccc9c9;
            padding-bottom:10px;
            margin-bottom:15px;
        }
        #info{
            font:12px sans-serif;
            text-align:right;
            color:gray;
        }
        .pop
        {
            margin:5px;
            margin-top:10px;
            margin-left:0px;
            background-color:rgb(100,100,100);
            color:white;
            border:0px solid black;
            padding:5px 10px;
            border-radius:2px;
            transition: background-color 0.2s,color 0.2s;
        }
        .pop:hover
        {
            background-color:rgb(00,0,00);
            color:white;
        }
        .rpop
        {
            margin:5px;
            margin-top:10px;
            margin-left:0px;
            background-color:rgb(100,100,100);
            color:white;
            border:0px solid black;
            padding:5px 10px;
            transition: background-color 0.2s,color 0.2s;
            cursor:not-allowed;
        }
        button:disabled
        {
            cursor:no-drop;
            background-color:rgb(175, 170, 170);
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
		<li id="username"><a href="#"><?php echo $name; echo " ";if($status==0) echo'<img height="20px" title="Your account has not been verified yet." width="20px" src="unverified.gif" alt="unverified">'; else echo'<img height="20px" width="25px" src="verified.png" title="Verified Account."  alt="verified">';?></a>
            <ul>
                <li><a href="profile.php">Profile</a></li>
                <li><a href="transactions.php">Transactions</a></li>
                <li><a href="profile.php">Credits (&#8377; <?php echo $credits;?>)</a></li>
				<li><a href="settings.php">Settings</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </li>
	</ul></div>
	</div>
		<fieldset><legend><strong>Seaarch For A CarPool : </strong></legend>
		<div id="home">
        <div id="joinoptions">
        <form class="form-vertical" action="joindetails.php" method="post">
<!-- Text input-->
<div class="form-group">
  
  <div class="col-md-3">
  <input id="from" name="from" type="text" placeholder="From" class="form-control input-md" value="<?php echo $from;?>">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <div class="col-md-3">
  <input id="to" name="to" type="text" placeholder="To" class="form-control input-md" value="<?php echo $to;?>">
    
  </div>
</div>

<div class="form-group">
  <div class="col-md-3">
        <input id="date" type="date" name="date" class="form-control" value="<?php echo $date;?>" required>
    </div>
</div>

<!-- Button -->
<div class="form-group">
  <div class="col-md-3">
    <input type="submit" id="submit" name="submit" class="btn btn-primary" value="Search">
  </div>
</div>
</form>
			<br><br><br>
			    </div>
			</fieldset>
        <div class="joindetails" id="joindetails">
            <?php
                    $connection = mysql_connect("localhost", "root", "") or die("Cannot connect");
                    $db = mysql_select_db("members", $connection) or die("Cannot select db");
                    $sql="SELECT * FROM `offers` WHERE source='$from' and destination='$to' and date='$date' AND USERNAME!='$username' ORDER BY `TRIPID` ASC ";
                    $query = mysql_query($sql);
                    $rows = mysql_num_rows($query);
                    echo '<div id="rides">';
                    if($rows==0 )
                    {
                        echo '<table class="table rides"><tr><td colspan="4">No Rides have been Offered or not available right now.</td></tr></table>';
                    }
                    else
                    {
                        echo '<table id="details" class="table rides"><tr><th>Trip Id</th><th>Offered By</th><th>TripType</th><th>Time</th></tr><tbody>';
                        $a=0;
                        while( $row = mysql_fetch_array($query))
                        {
                            $a++;
                            $time = date("h:i A", strtotime("{$row['TIME']}"));
                            $offerby=mysql_query("select * from clients where username='{$row['USERNAME']}'");
                            while($offeredby=mysql_fetch_array($offerby))
                                echo "<tr><td>{$row['TRIPID']}</td><td>{$offeredby['NAME']}</td><td>{$row['TRIPTYPE']}</td><td>$time</td></tr>\n";
                        }
                        echo '</tbody></table>';
                    }
                    echo '</div>';?>
        </div>
        <div id="popup" class="popup">
            <div id='align'>
            <div id="inside">
            <div id="info">(esc) to close&nbsp;&nbsp; </div>
            <div class="header">Confirm Seat(s)</div>
            <form action="transaction.php" method="post">
            	<input type="number" name="number" id="number" placeholder=" No. of Seat(s)" pattern="[0-9]+" max="<?php echo $_SESSION['SEATSAVAILABLE'];?>" title="Seats availble=<?php echo $_SESSION['SEATSAVAILABLE'];?>" required><br><br>
            	<input type="submit" id="bookseat" name="submit" value="Book My Seat(s)">
            </form>
        </div></div></div>
    </body>
</html>