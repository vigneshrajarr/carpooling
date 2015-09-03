<?php
session_start();
include("credits.php");
$username=$_SESSION['username'];
$name=$_SESSION['name'];
$credits=$_SESSION['credits'];
$seats=$_POST['number'];
$price=$_SESSION['PRICE'];
$email=$_SESSION['email'];
$_SESSION['noofseats']=$seats;
$seats=$_SESSION['noofseats'];
$status=$_SESSION['status'];
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
		<script type="text/javascript" src="script.js"></script>
		<style>
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
    </head>
    <link rel="stylesheet" type="text/css" href="bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="style.css" />
    <style>
		#nameoncard
		{
			text-transform:uppercase;
		}
		.name
		{
			text-transform:capitalize;
		}
        #details
        {
            position:relative;
            top:100px;
        }
		#total
		{
			position:absolute;
			margin-left:225px;
			margin-top:100px;
			width:900px;
			border:1px solid black;
			padding:8px;
			border-radius:5px;
		}
		#carddetails
		{
			margin-left:225px;
			margin-top:150px;
			//height:450px;
			width:900px;
			border:1px solid black;
			padding:50px;
			border-radius:5px;
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
		<li><a href="#"><?php echo $name; ?></a>
            <ul>
                <li><a href="profile.php">Profile</a></li>
                <li><a href="transactions.php">Transactions</a></li>
                <li><a href="profile.php">Credits (&#8377; <?php echo $credits;?>)</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </li>
	</ul></div>
	</div>
		<br><br><br>
	<div id="total">
		<div id="left" style="float:left">No. of Seats : <?php echo $seats?></div>
		<div id="right" style="float:right">Amount : &#8377;<?php $total=$seats*$price; echo $total;?></div>
		</div>
		<div id="carddetails">
			<form class="form-horizontal">
			<!-- Text input
<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="savedcards">Saved Cards</label>
  <div class="col-md-4">
    <select id="savedcards" name="savedcards" class="form-control name">
		<?php 
			$connection = mysql_connect("localhost", "root", "") or die("Cannot connect");
        	$db = mysql_select_db("members", $connection) or die("Cannot select db");
        	$query=mysql_query("select * from `bank` where EMAIL='$email'");
			while($row=mysql_fetch_array($query))
			{
				echo "<option value=".$row['CARDNUMBER'].">".$row['NAME']." - ".$row['CARDNUMBER'];
			}
        	mysql_close($connection); // Closing Connection
		?>
    </select><a id="addnewcard">+ Add New Card</a>
  </div>
</div>
<div id="addacard" hidden>
<div class="form-group">
  <label class="col-md-4 control-label" for="name"></label>  
  <div class="col-md-4">
  <input id="nameofbank" name="nameofbank" type="text" placeholder="Name of Bank" class="form-control input-md name" required>
  </div>
</div>
<!-- Text input-->
				<div class="form-group">
  <label class="col-md-4 control-label" for="name"></label>  
  <div class="col-md-4">
  <input id="nameoncard" name="nameoncard" type="text" placeholder="Name on Card" class="form-control input-md" required>
  </div>
</div>
	<div class="form-group">
  <label class="col-md-4 control-label" for="name"></label>  
  <div class="col-md-4">
  <input id="password" name="password" type="password" placeholder="Password" class="form-control input-md" required>
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" for="cardnumber"></label>  
  <div class="col-md-4">
  <input id="cardnumber" name="cardnumber" type="text" placeholder="Card Number" onkeypress=" return isNumber(event)" class="form-control input-md" required>
  </div>
</div>
<!-- Multiple Radios -->
<div class="form-group">
  <label class="col-md-4 control-label" for=""></label>
  <div class="col-md-4">
  <div class="radio">
    <label for="-0">
      <input type="radio" name="cardtype" id="cardtype" value="Visa" checked="checked">
      Visa
    </label>
	</div>
  <div class="radio">
    <label for="-1">
      <input type="radio" name="cardtype" id="cardtype" value="Master Card">
      Master Card
    </label>
	</div>
  <div class="radio">
    <label for="-2">
      <input type="radio" name="cardtype" id="cardtype" value="Mastero">
      Mastero
    </label>
	</div>
  <div class="radio">
    <label for="-3">
      <input type="radio" name="cardtype" id="cardtype" value="American Express">
      American Express
    </label>
	</div>
  </div>
</div>
				<div class="form-group">
  <label class="col-md-4 control-label" for=""></label>  
  <div class="col-md-4">
  <input id="date" name="date" placeholder="Date of Expiry" class="form-control input-md" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="date" required>
    
  </div>
</div>
	
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for=""></label>  
  <div class="col-md-2">
  <input id="cvv" name="cvv" type="text" placeholder="CVV" onkeypress="return isNumber(event)" maxlength="3" class="form-control input-md" required>
    
  </div>
</div>
	<div class="form-group">
  <label class="col-md-4 control-label" for="save"></label>
  <div class="col-md-4">
    <input type="button" id="save" name="save" class="btn btn-success" value="Save">
  </div>
</div>
				</div>
<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="submit"></label>
  <div class="col-md-4">
	  <button type="button" id="bookseat" name="submit" class="btn btn-primary" value="Book My Seat(s)">Book</button>
  </div>
</div>
				<div class="form-group">
  <label class="col-md-4 control-label" for=""></label>
  <div class="col-md-4">
    <label class="checkbox-inline" for="0">
      <input type="checkbox" name="credits" id="credits" value="1" checked>
      Use my Credits
    </label>
  </div>
</div>
			</form>
		</div>
		<div id="popup" class="popup">
            <div id='align'>
            <div id="inside">
            <div id="info">(esc) to close&nbsp;&nbsp; </div>
            <div class="header">Enter the Card Password</div>
			<form>
            	<input type="password" name="password" id="password" placeholder=" Password" title="Enter the card password to proceed payment process." required><br><br>
            	<input type="button" id="bookaseat" name="submit" value="Book My Seat(s)">
			</form>
        </div></div></div>
		<script src="jquery-2.1.3.min.js"></script>
		<script src="script.js"></script>
    </body>
</html>