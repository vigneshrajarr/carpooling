<?php
session_start();
if(isset($_SESSION['username']))
{
	echo("You are not authorised to view this page.You will be logged out shortly....");
	session_destroy();
	header("refresh:0;url=index.php");
}
$approved=0;
$declined=0;
$connection = mysql_connect("localhost", "root", "") or die("Cannot connect");
$db = mysql_select_db("members", $connection) or die("Cannot select db");
$sql1="select * from `clients` where STATUS=0";
$sql2="select * from `police`";
$query1=mysql_query($sql1);
$query2=mysql_query($sql2);
while($row1=mysql_fetch_array($query1))
{
	$email=$row1['EMAIL'];
	$sql3="select * from `photodetails` where EMAIL='$email'";
	$query3=mysql_query($sql3);
	$row3=mysql_fetch_assoc($query3);
	$row3license=$row3['LICENSENUMBER'];
	$row3vote=$row3['VOTENUMBER'];
	$row2number=mysql_num_rows($query2);
	while($row2=mysql_fetch_array($query2))
	{
		$row2license=$row2['LICENSENUMBER'];
		$row2vote=$row2['VOTENUMBER'];
		if($row2license==$row3license || $row2vote==$row3vote)
		{
			mysql_query("UPDATE `clients` SET `STATUS`=-1 WHERE EMAIL='$email'");
			$declined=$declined+1;
		}
		else
		{
			mysql_query("UPDATE `clients` SET `STATUS`=1 WHERE EMAIL='$email'");
			$approved=$approved+1;
		}
	}
}
/*echo "Accounts Approved : $approved";
echo nl2br("\n");
echo "Accounts Declined : $declined";*/
echo "Done.";
?>