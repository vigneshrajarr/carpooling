<?php
session_start();
include("credits.php");
$username=$_SESSION['username'];
$name=$_SESSION['name'];
$credits=$_SESSION['credits'];
$status=$_SESSION['status'];
?>
<html>
    <title>Home</title>
    <head>
    </head>
    <link rel="stylesheet" type="text/css" href="bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="style.css" />
    <body>
    <br><br><br>
    <div class="menu">
	<div style="float:left"><img src="gotocabs.png" height=70px width=275px alt="logo"></div>
	<div style="float:left; margin-left:20px;margin-top:20px"><ul>
        <li><a href="#">Home</a></li>
        <li><a href="offer.php">Offer</a></li>
        <li><a href="home.php">Join</a></li>
		<li><a class="username" href="#"><?php echo $name; echo " ";if($status==0) echo'<img height="20px" title="Your account has not been verified yet." width="20px" src="unverified.gif" alt="unverified">'; else echo'<img height="20px" width="25px" src="verified.png" title="Verified Account."  alt="verified">';?></a>
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
	<div id="mainthreads" style="clear:both;margin:30px;margin-left:auto;margin-right:auto;">
		<div id="news" style="border-radius:5px; height:50px;width:500px;background-color:#eeeeee;margin-left:auto;margin-right:auto;">
			<span style="color:#354bc1;">News and Announcements</span>
		</div>
		<br>
		<div id="faq" style="border-radius:5px; height:50px;width:500px;background-color:#eeeeee;margin-left:auto;margin-right:auto;">
			<span>FAQ's</span>
		</div><br>
		<div id="support" style="border-radius:5px; height:50px;width:500px;background-color:#eeeeee;margin-left:auto;margin-right:auto;">
			<span>Support</span>
		</div>
	</div>
	<div id="userthreads">
		<?php
			$connection = mysql_connect("localhost", "root", "") or die("Cannot connect");
			$db = mysql_select_db("members", $connection) or die("Cannot select db");
			
		?>
		<div>
		</div>
		<a id="addatopic" name="addatopic">+ Add a Topic</a>
	</div>
    </body>
	<script src="jquery-2.1.3.min.js"></script>
	<script src="script.js"></script>
</html>