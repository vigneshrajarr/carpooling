<?php
session_start();
    $username=$_SESSION['username'];
    $from=$_POST['from'];
    $to=$_POST['to'];
    $triptype=$_POST['triptype'];
    $price=$_POST['price'];
    $car=$_POST['cars'];
    $date=$_POST['date'];
    $time=$_POST['time'];
    $seatsoffered=$_POST['seatsoffered'];
    $connection = mysql_connect("localhost", "root", "") or die("Cannot connect");
    $db = mysql_select_db("members", $connection) or die("Cannot select db");
    $sql="SELECT TRIPID FROM `offers` order by TRIPID DESC LIMIT 1";
    $query=mysql_query($sql);
    while($rows=mysql_fetch_array($query))
    {
        $tripid=$rows['TRIPID']+1;
    }
    $sql="INSERT INTO `offers`(`TRIPID`, `USERNAME`, `SOURCE`, `DESTINATION`, `TRIPTYPE`, `DATE`, `TIME` , `PRICE`, `CAR`,`SEATSOFFERED`, `SEATSAVAILABLE`,`NORATED`) VALUES ('$tripid','$username','$from','$to','$triptype','$date','$time','$price','$car','$seatsoffered','$seatsoffered',0)";
    $query=mysql_query($sql);
    echo 'Registered Successfully...Redirecting....';
    header("refresh:0;url=offer.php");
?>