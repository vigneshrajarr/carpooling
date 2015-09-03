<?php
	session_start();
	$email=$_SESSION['email'];
	$smoking=$_GET['smoking'];
	$drinks=$_GET['drinks'];
	$eatables=$_GET['eatables'];
	$pets=$_GET['pets'];
	$loquacious=$_GET['loquacious'];
	$accompanier=$_GET['accompanier'];
	$connection = mysql_connect("localhost", "root", "") or die("Cannot connect");
	$db = mysql_select_db("members", $connection) or die("Cannot select db");
	$query=mysql_query("select * from `preferences` where EMAIL='$email'");
	$rows=mysql_num_rows($query);
	if($rows==0)
		mysql_query("INSERT INTO `preferences`(`EMAIL`,`SMOKING`, `PETS`, `EATABLES`, `ACCOMPANIER`, `DRINKS`, `LOQUACIOUS`) VALUES ('$email','$smoking','$pets','$eatables','$accompanier','$drinks','$loquacious')");
	else
		mysql_query("UPDATE `preferences` SET `SMOKING`='$smoking',`PETS`='$pets',`EATABLES`='$eatables',`ACCOMPANIER`='$accompanier',`DRINKS`='$drinks',`LOQUACIOUS`='$loquacious' WHERE EMAIL='$email'");
?>