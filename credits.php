<?php
$email=$_SESSION['email'];
$connection = mysql_connect("localhost", "root", "") or die("Cannot connect");
$db = mysql_select_db("members", $connection) or die("Cannot select db");
$query = mysql_query("select * from clients where EMAIL='$email'");
$row=mysql_fetch_assoc($query);
$_SESSION['credits']=$row['CREDITS'];
$_SESSION['profession']=$row['PROFESSION'];
$_SESSION['password']=$row['PASSWORD'];
$_SESSION['contact']=$row['CONTACT'];
mysql_close($connection);
?>