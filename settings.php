<?php
session_start();
include("credits.php");
$username=$_SESSION['username'];
$name=$_SESSION['name'];
$password=$_SESSION['password'];
$credits=$_SESSION['credits'];
$status=$_SESSION['status'];
$contact=$_SESSION['contact'];
$profession=$_SESSION['profession'];
$email=$_SESSION['email'];
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
		#photoid
		{
			margin-left:80px;
			margin-top:40px;
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
		.down
		{
			margin-left:40px;
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
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </li>
	</ul></div>
	</div>
    <br>
		<div class="form-horizontal">
<fieldset>

<!-- Form Name -->
<legend>Update your Details</legend>

<!-- Text input-->
<div style="float:left;width:200px">
	<?php
		$connection = mysql_connect("localhost", "root", "") or die("Cannot connect");
    	$db = mysql_select_db("members", $connection) or die("Cannot select db");
		$query=mysql_query("select * from `photodetails` where email='$email'");
		$row=mysql_fetch_assoc($query);
		echo '<img src='.$row['USERPHOTO'].' id="photoid" height=100px width=100px style="border-radius:99px;" alt="profile image">';
		//echo "$data";
		echo "<span class='btn btn-primary down'>$email</span>";
	?>
</div>
<div style="float:left;width:50%">
<div class="form-group">
  <label class="col-md-4 control-label" for="name"></label>  
	<div class="form-inline">
  <div id="ers1" class="col-md-8">
  <input id="name" name="name" type="text" placeholder="Name" class="form-control input-md" readonly value="<?php echo "$name";?>">
    <button id="e1" name="editupdate" class="btn btn-warning glyphicon glyphicon-pencil"></button>
	<button id="r1" name="removeupdate" class="btn btn-danger glyphicon glyphicon-remove" style="display:none"></button>
	<button id="s1" name="saveupdate" class="btn btn-success glyphicon glyphicon-floppy-disk" style="display:none"></button>
  </div>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="username"></label>  
	<div class="form-inline">
  <div id="ers2" class="col-md-8">
  <input id="username" name="username" type="text" placeholder="Username" class="form-control input-md" readonly value="<?php echo "$username";?>">
    <button id="e2" name="editupdate" class="btn btn-warning glyphicon glyphicon-pencil"></button>
	<button id="r2" name="removeupdate" class="btn btn-danger glyphicon glyphicon-remove" style="display:none"></button>
	<button id="s2" name="saveupdate" class="btn btn-success glyphicon glyphicon-floppy-disk" style="display:none"></button>
  </div>
  </div>
</div>

<!-- Password input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="newpassword"></label>
	<div class="form-inline">
  <div id="ers3" class="col-md-8">
    <input id="password" name="password" type="password" placeholder="Password" class="form-control input-md" readonly value="<?php echo "$password";?>">
    <button id="e3" name="editupdate" class="btn btn-warning glyphicon glyphicon-pencil"></button>
	<button id="r3" name="removeupdate" class="btn btn-danger glyphicon glyphicon-remove" style="display:none"></button>
	<button id="s3" name="saveupdate" class="btn btn-success glyphicon glyphicon-floppy-disk" style="display:none"></button>
  </div>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="contact"></label>  
	<div class="form-inline">
  <div id="ers4" class="col-md-8">
  <input id="contact" name="contact" type="text" placeholder="Contact" class="form-control input-md" readonly value="<?php echo "$contact";?>">
    <button id="e4" name="editupdate" class="btn btn-warning glyphicon glyphicon-pencil"></button>
	<button id="r4" name="removeupdate" class="btn btn-danger glyphicon glyphicon-remove" style="display:none"></button>
	<button id="s4" name="saveupdate" class="btn btn-success glyphicon glyphicon-floppy-disk" style="display:none"></button>
  </div>
  </div>
</div>

<!-- Select Basic -->
<div class="form-group form-inline">
  <label class="col-md-4 control-label" for="profession"></label>
  <div id="ers5" class="col-md-8">
    <select id="profession" name="profession" class="form-control" style="width:195px" readonly value="<?php echo "$profession";?>">
      <option value="Student">Student</option>
      <option value="Skilled Worker">Skilled Worker</option>
      <option value="Unskilled Worker">Unskilled Worker</option>
    </select>
	<button id="e5" name="editupdate" class="btn btn-warning glyphicon glyphicon-pencil"></button>
	<button id="r5" name="removeupdate" class="btn btn-danger glyphicon glyphicon-remove" style="display:none"></button>
	<button id="s5" name="saveupdate" class="btn btn-success glyphicon glyphicon-floppy-disk" style="display:none"></button>
	</div>
	</div>
</fieldset>
</div>
    </body>
	<script src="jquery-2.1.3.min.js"></script>
	<script src="script.js"></script>
	<script>
		$(document).on('click','button',function(){
			if(this.id.match("[a-z]")=="e")
			{
				var id1=this.id;
				//alert(id1);
				var data=id1.match("[0-9]");
				var id1="#e"+parseInt(data);
				var id2="#r"+parseInt(data);
				//alert(id2);
				var id3="#s"+parseInt(data);
				$(id1).hide();
				//alert($(id1).parent().html());
				$("#"+$(id1).parent().attr('id')+" input[type=text]").attr('readonly',false);
				$("#"+$(id1).parent().attr('id')+" input[type=text]").focus();
				$("#"+$(id1).parent().attr('id')+" input[type=text]").val($("#"+$(id1).parent().attr('id')+" input[type=text]").val());
				$("#"+$(id1).parent().attr('id')+" input[type=password]").attr('readonly',false);
				$("#"+$(id1).parent().attr('id')+" input[type=password]").focus();
				$("#"+$(id1).parent().attr('id')+" input[type=password]").val($("#"+$(id1).parent().attr('id')+" input[type=password]").val());
				$("#"+$(id1).parent().attr('id')+" select").attr('readonly',false);
				//alert(text);
				$(id2).show();
				$(id3).show();
			}
			if(this.id.match("[a-z]")=="r")
			{
				//alert("r");
				var id1=this.id;
				//alert(id1);
				var data=id1.match("[0-9]");
				var id1="#e"+parseInt(data);
				var id2="#r"+parseInt(data);
				//alert(id2);
				var id3="#s"+parseInt(data);
				$(id1).hide();
				//alert($(id1).parent().html());
				$("#"+$(id1).parent().attr('id')+" input[type=text]").attr('readonly',true);
				$("#"+$(id1).parent().attr('id')+" input[type=password]").attr('readonly',true);
				$("#"+$(id1).parent().attr('id')+" select").attr('readonly',true);
				$(id1).show();
				$(id2).hide();
				$(id3).hide();
			}
			if(this.id.match("[a-z]")=="s")
			{
				//alert("s");
				var id1,id2,id3;
				id1=this.id;
				var data=id1.match("[0-9]");
				id1="#e"+parseInt(data);
				id2="#r"+parseInt(data);
				id3="#s"+parseInt(data);
				var updatevalue;
				if($(this).parent().attr('id')=="ers1")
				{
					var which="name";
					updatevalue=$("#"+$(id1).parent().attr('id')+" input[type=text]").val();
				}
				else if($(this).parent().attr('id')=="ers2")
				{
					var which="username";
					updatevalue=$("#"+$(id1).parent().attr('id')+" input[type=text]").val();
				}
				else if($(this).parent().attr('id')=="ers3")
				{
					var which="password";
					updatevalue=$("#"+$(id1).parent().attr('id')+" input[type=password]").val();
				}
				else if($(this).parent().attr('id')=="ers4")
				{
					var which="contact";
					updatevalue=$("#"+$(id1).parent().attr('id')+" input[type=text]").val();
				}
				else if($(this).parent().attr('id')=="ers5")
				{
					var which="profession";
					updatevalue=$("#"+$(id1).parent().attr('id')+" select").val();
				}
				//alert(which);
				//alert(updatevalue);
				$.ajax({
					url:"updatedetails.php?which="+which+"&updatevalue="+updatevalue,
					type:"GET",
					cache:false,
					success:function(data)
					{
						$("#"+$(id1).parent().attr('id')+" input[type=text]").attr('readonly',true);
						$("#"+$(id1).parent().attr('id')+" input[type=password]").attr('readonly',true);
						$("#"+$(id1).parent().attr('id')+" select").attr('readonly',true);
						$(id1).show();
						$(id2).hide();
						$(id3).hide();
					}
				});
			}
		});
	</script>
</html>
