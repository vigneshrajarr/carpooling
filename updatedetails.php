<?php
    session_start();
	$which=$_GET['which'];
    $updatevalue=$_GET['updatevalue'];
	$email=$_SESSION['email'];
    $connection = mysql_connect("localhost", "root", "") or die("Cannot connect");
    $db = mysql_select_db("members", $connection) or die("Cannot select db");
	if($which=="name")
	{
		mysql_query("UPDATE `clients` SET `NAME`='$updatevalue' WHERE `EMAIL`='$email'");
		$_SESSION['name']=$which;
	}
	if($which=="username")
	{
		mysql_query("UPDATE `clients` SET `USERNAME`='$updatevalue' WHERE `EMAIL`='$email'");
		$_SESSION['username']=$which;
	}
	if($which=="password")
	{
		mysql_query("UPDATE `clients` SET `PASSWORD`='$updatevalue' WHERE `EMAIL`='$email'");
		$_SESSION['password']=$which;
	}
	if($which=="contact")
	{
		mysql_query("UPDATE `clients` SET `CONTACT`='$updatevalue' WHERE `EMAIL`='$email'");
		$_SESSION['contact']=$which;
	}
	if($which=="profession")
	{
		mysql_query("UPDATE `clients` SET `PROFESSION`='$updatevalue' WHERE `EMAIL`='$email'");
		$_SESSION['profession']=$which;
	}
    mysql_close($connection);
?>