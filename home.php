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
    <style>
		body
		{
			background:#98e3d5;
		}
		.fulldetails
		{
			background:#f04e4e;
			color:#eeeeee;
			position:fixed;
			bottom:170px;
			right:50px;
			padding:10px;
			width:95px;
			height:40px;
			border-radius:5px;
			cursor:pointer;
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
			height:175px;
            width:30%;
            display:block;
            background-color:white;
            margin-left:auto;
            margin-right:auto;
            padding:20px 0px;
            padding-top:10px;
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
    </style>
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
                <li><a href="settings.php">Settings</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </li>
	</ul></div>
	</div>
    <br>
		<fieldset><legend><strong>Seaarch For A CarPool : </strong></legend>
        <div id="home">
        <form class="form-vertical" action="joindetails.php" method="post">
<!-- Text input-->
<div class="form-group">
  
  <div class="col-md-3">
  <input id="from" name="from" type="text" placeholder="From" class="form-control input-md name" required>
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <div class="col-md-3">
  <input id="to" name="to" type="text" placeholder="To" class="form-control input-md name" required>
    
  </div>
</div>

<div class="form-group">
  <div class="col-md-3">
        <input id="date" type="date" name="date" class="form-control" value="" required>
    </div>
</div>

<!-- Button -->
<div class="form-group">
  <div class="col-md-2">
    <input type="submit" id="submit" name="submit" class="btn btn-primary" value="Search">
  </div>
</div>
			<br><br>
</form>
    </div>
    </fieldset>
		<div class="fulldetails" id="fulldetails">Trip Details</div>
		<div id="footer"><br>
			<div id="footercontents">
			<div class="facebook" style="float:left;background-image:url('facebook.png')"></div>
			<div class="twitter" style="float:left;background-size:9px 18px;background-image:url('twitter.png')"></div>
			<div class="googleplus" style="float:left;background-size:16px 18px;background-image:url('googleplus.png')"></div>
			<div class="linkedin" style="float:left;background-size:18px 18px;background-image:url('linkedin.png')"></div>
			<div class="pinterest" style="float:left;background-size:18px 18px;background-image:url('pinterest.png')"></div><br><br><br>
			</div>
			<div style="margin-left:480px;color:#eeeeee;">Terms of Service - About - Privacy - Settings - Contact<br><br></div>
			<span id="copyrights">&copy; Copyright 2015. goto:cabs;</span>
		</div>
		<div id="popup" class="popup">
            <div id='align'>
            <div id="inside">
            <div id="info">(esc) to close&nbsp;&nbsp; </div>
            <div class="header">Trip ID</div>
			<form id="tripdetails">
            	<input type="text" name="detailtripid" id="detailtripid" placeholder=" Your Trip ID" pattern="[0-9]+" required><br><br>
            	<input type="button" id="detailsoftrip" name="submit" value="Get Detials">
			</form>
				<div class="windows8" hidden>
<div class="wBall" id="wBall_1">
<div class="wInnerBall">
</div>
</div>
<div class="wBall" id="wBall_2">
<div class="wInnerBall">
</div>
</div>
<div class="wBall" id="wBall_3">
<div class="wInnerBall">
</div>
</div>
<div class="wBall" id="wBall_4">
<div class="wInnerBall">
</div>
</div>
<div class="wBall" id="wBall_5">
<div class="wInnerBall">
</div>
</div><br><br>
					
</div>
				<span id="send" hidden>Sending id...</span>
				<span id="fetch" hidden>Fetching Details...</span>
				<div id=tripdetailscontent hidden></div>
				<div id=bookinresult hidden>
					<form action="transaction.php" method="post">
            			<input type="number" name="number" id="number" placeholder=" No. of Seat(s)" pattern="[0-9]+" max="<?php echo $_SESSION['SEATSAVAILABLE'];?>" title="Seats availble=<?php echo $_SESSION['SEATSAVAILABLE'];?>" required>
						<span style="margin-left:20px"><input type="submit" id="bookseat" name="submit" value="Book My Seat(s)"></span>
            		</form>
				</div>
        </div></div></div>
    </body>
	<script src="jquery-2.1.3.min.js"></script>
	<script src="script.js"></script>
</html>