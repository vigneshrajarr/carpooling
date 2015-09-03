<?php
    session_start();
	$password=$_GET['password'];
	$cardnumber=$_GET['cardnumber'];
	$credits=$_GET['credits'];
    $tripid=$_SESSION['TRIPID'];
    $username=$_SESSION['username'];
    $source=$_SESSION['FROM'];
    $destination=$_SESSION['TO'];
    $triptype=$_SESSION['TRIPTYPE'];
    $date=$_SESSION['DATE'];
    $time=$_SESSION['TIME'];
    $price=$_SESSION['PRICE'];
    $brand=$_SESSION['BRAND'];
    $color=$_SESSION['COLOR'];
    $noofseats=$_SESSION['noofseats'];
    $comfortness=$_SESSION['COMFORTNESS'];
    $seatsavailable=$_SESSION['SEATSAVAILABLE'];
	$email=$_SESSION['email'];
	$creditsvalue=$_SESSION['credits'];
   	$connection = mysql_connect("localhost", "root", "") or die("Cannot connect");
    $db = mysql_select_db("members", $connection) or die("Cannot select db");
	$query=mysql_query("select * from `bank` where cardnumber='$cardnumber'");
	while($row=mysql_fetch_array($query))
	{
		$amount=$row['AMOUNT'];
		$nooftransfers=$row['NOOFTRANSFERS'];
	}
	$query=mysql_query("SELECT * FROM `bank` where cardnumber='$cardnumber' AND email='$email'");
		if(mysql_num_rows($query)>0)
		{
			$echo="";
			while($cards=mysql_fetch_array($query))
			{
				if($password==$cards['PASSWORD'])
				{
					$updateamount=0;
					if($credits=="1")
					{
						$updateamount=($noofseats*$price)-$creditsvalue;
						mysql_query("UPDATE `clients` SET `CREDITS`=0 WHERE `EMAIL`='$email'");
					}
					else
					{
						$updateamount=$noofseats*$price;
					}
					mysql_query("INSERT INTO `rides`(`TRIPID`, `USERNAME`, `SOURCE`, `DESTINATION`, `TRIPTYPE`, `DATE`, `HOUR`, `PRICE`, `BRAND`, `COLOUR`, `NOOFSEATS`, `COMFORTNESS`, `AMOUNT`,`RATING`) VALUES ('$tripid','$username','$source','$destination','$triptype','$date','$time','$price','$brand','$color','$noofseats','$comfortness','$updateamount',0)");
        			$update=$seatsavailable-$noofseats;
        			mysql_query("UPDATE `offers` SET `SEATSAVAILABLE`='$update' WHERE `TRIPID`='$tripid'");
					$balanceamount=$amount-$updateamount;
					$nooftransfers=$nooftransfers+1;
					mysql_query("UPDATE `bank` SET `AMOUNT`='$balanceamount',`NOOFTRANSFERS`='$nooftransfers'  WHERE `EMAIL`='$email'");
					$echo="Registered Successfully.";
    			}
				else
					$echo="Authentication failure. Please try again.";
			}
			echo $echo;
		}
?>


