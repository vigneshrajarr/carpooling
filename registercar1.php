<?php
session_start();
    $username=$_SESSION['username'];
    $regnum=$_POST['regnum'];
    $brand=$_POST['brand'];
    $model=$_POST['model'];
    $seatsavailable=$_POST['seatsavailable'];
    $color=$_POST['color'];
    $comfortlevel=$_POST['comfortlevel'];
    $luggage=$_POST['luggage'];
    $connection = mysql_connect("localhost", "root", "") or die("Cannot connect");
    $db = mysql_select_db("members", $connection) or die("Cannot select db");
    $query = mysql_query("select * from cars where username='$username' and regnum='$regnum'");
    $rows=mysql_num_rows($query);
    if($rows>0)
    {
        echo 'Already registered, Register another car. Redirecting....';
        header("refresh:0;url=registercar.php");
    }
    else
    {
        $query=mysql_query("INSERT INTO `cars`(`USERNAME`, `REGNUM`, `BRAND`, `MODEL` , `COLOR`, `NOOFSEATS`, `COMFORTNESS`, `LUGGAGE`) VALUES ('$username','$regnum','$brand','$model','$color','$seatsavailable','$comfortlevel','$luggage')");
        echo 'Registered Successfully...Redirecting....';
        header("refresh:0;url=offer.php");
    }
?>