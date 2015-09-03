<?php
session_start();
$tripid=$_GET['tripid'];
$rating=$_GET['rating'];
$username=$_SESSION['username'];
$connection = mysql_connect("localhost", "root", "") or die("Cannot connect");
$db = mysql_select_db("members", $connection) or die("Cannot select db");
$query=mysql_query("select NORATED from offers where tripid='$tripid'");
$row=mysql_fetch_assoc($query);
$norated=$row['NORATED'];
mysql_query("UPDATE `rides` SET `RATING`='$rating' WHERE tripid='$tripid' and username='$username'");
$norated+=1;
mysql_query("UPDATE `OFFERS` SET `NORATED`='$norated' WHERE tripid='$tripid'");
echo "success";
?>