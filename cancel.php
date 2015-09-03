<?php
session_start();
$connection = mysql_connect("localhost", "root", "") or die("Cannot connect");
$db = mysql_select_db("members", $connection) or die("Cannot select db");
$username=$_SESSION['username'];
$name=$_SESSION['name'];
$action=$_REQUEST['type'];
call_user_func($action,$_REQUEST,$connection);
function ride($data)
{
	$tripid=$data['id'];
	$username=$_SESSION['username'];
	$sql1="SELECT * FROM `RIDES` WHERE TRIPID='$tripid' AND USERNAME='$username'";
	$sql2="SELECT * FROM `OFFERS` WHERE TRIPID='$tripid'";
	$sql3="SELECT * FROM `CLIENTS` WHERE USERNAME='$username'";
	$query1=mysql_query($sql1);
	$query2=mysql_query($sql2);
	$query3=mysql_query($sql3);
	$row1=mysql_fetch_array($query1);
	$row2=mysql_fetch_array($query2);
	$row3=mysql_fetch_array($query3);
	$seatsavailable=$row2['SEATSAVAILABLE']+$row1['NOOFSEATS'];
	mysql_query("UPDATE `offers` SET `SEATSAVAILABLE`='$seatsavailable' WHERE TRIPID='$tripid'");
	$credits=$row3['CREDITS']+$row1['AMOUNT'];
	mysql_query("UPDATE `clients` SET `CREDITS`='$credits' WHERE USERNAME='$username'");
	mysql_query("DELETE FROM `RIDES` WHERE TRIPID='$tripid'");
}
function offer($data)
{
	$tripid=$data['id'];
	$username=$_SESSION['username'];
	$sql1="SELECT * FROM `RIDES` WHERE TRIPID='$tripid' AND USERNAME='$username'";
	$sql2="SELECT * FROM `OFFERS` WHERE TRIPID='$tripid'";
	$sql3="SELECT * FROM `CLIENTS` WHERE USERNAME='$username'";
	$query1=mysql_query($sql1);
	$query2=mysql_query($sql2);
	$query3=mysql_query($sql3);
	$row1=mysql_fetch_array($query1);
	$row2=mysql_fetch_array($query2);
	$row3=mysql_fetch_array($query3);
	mysql_query("DELETE FROM `RIDES` WHERE TRIPID='$tripid'");
	mysql_query("DELETE FROM `OFFERS` WHERE TRIPID='$tripid'");
}