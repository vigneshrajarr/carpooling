<?php
session_start();
		$email=$_SESSION['email'];
        $bankname=$_GET['bankname'];
		$username=$_GET['username'];
		$cardnumber=$_GET['cardnumber'];
		$type=$_GET['cardtype'];
		$cvv=$_GET['cvv'];
		$date=$_GET['date'];
		$password=$_GET['password'];
        $connection = mysql_connect("localhost", "root", "") or die("Cannot connect");
        $db = mysql_select_db("members", $connection) or die("Cannot select db");
        $rows=mysql_query("INSERT INTO `bank`(`NAME`, `USERNAME`, `PASSWORD`, `EMAIL` , `AMOUNT`, `NOOFTRANSFERS`, `CARDNUMBER`, `CARDTYPE`, `CVV`, `EXPIRY`) VALUES ('$bankname','$username','$password','$email','10000','0','$cardnumber','$type','$cvv','$date')");
        mysql_close($connection); // Closing Connection
?>