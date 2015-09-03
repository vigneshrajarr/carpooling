<?php
session_start();
$con = mysql_connect("localhost","root","")or die("Cannot connect");
$db = mysql_select_db("members", $con) or die("Cannot select db");
$tripid = $_GET['id'];
$_SESSION['TRIPID']=$tripid;
//echo $tripid;
$sqlpreferences="";
$sql = "SELECT * FROM `offers` WHERE tripid='$tripid'";
if($query=mysql_query($sql))
{
    $sql = "SELECT * FROM `offers` WHERE tripid='$tripid'";
    $query=mysql_query($sql);
    if($row=mysql_fetch_array($query))
    {
		$offeredby=$row['USERNAME'];
        $triptype=$row['TRIPTYPE'];
        $time=$row['TIME'];
        $price=$row['PRICE'];
        $seatsavailable=$row['SEATSAVAILABLE'];
        $seatsoffered=$row['SEATSOFFERED'];
        $regnum=$row['CAR'];
        $_SESSION['FROM']=$row['SOURCE'];
        $_SESSION['TO']=$row['DESTINATION'];
        $sql = "SELECT * FROM `cars` WHERE regnum='$regnum'";
        $query=mysql_query($sql);
        if($rows=mysql_fetch_array($query))
        {
            $brand=$rows['BRAND'];
            $model=$rows['MODEL'];
            $color=$rows['COLOR'];
            $comfort=$rows['COMFORTNESS'];
            $luggage=$rows['LUGGAGE'];
        }
        $_SESSION['TRIPID']=$tripid;
        $_SESSION['TRIPTYPE']=$triptype;
        $_SESSION['DATE']=$row['DATE'];
        $_SESSION['TIME']=$row['TIME'];
        $_SESSION['PRICE']=$row['PRICE'];
        $_SESSION['SEATSAVAILABLE']=$seatsavailable;
        $_SESSION['BRAND']=$rows['BRAND'];
        $_SESSION['MODEL']=$rows['MODEL'];
        $_SESSION['COLOR']=$rows['COLOR'];
        $_SESSION['COMFORTNESS']=$rows['COMFORTNESS'];
        $_SESSION['LUGGAGE']=$rows['LUGGAGE'];
		$sql=mysql_query("select EMAIL from `CLIENTS` where USERNAME='$offeredby'");
		$row=mysql_fetch_assoc($sql);
		$email=$row['EMAIL'];
		$sql=mysql_query("select USERPHOTO from `photodetails` where EMAIL='$email'");
		$row=mysql_fetch_assoc($sql);
		$userphoto=$row['USERPHOTO'];
		$preferences=mysql_query("select * from `preferences` where email='$email'");
$rowpreferences=mysql_fetch_assoc($preferences);
	if($rowpreferences['SMOKING']=="Not Allowed")
	{
		$smoking="preferences/nosmoking.png";
		$title1="Smoking&nbsp;not&nbsp;allowed.";
	}
	else
	{
		$smoking="preferences/smoking.png";
		$title1="Smoking&nbsp;allowed.";
	}

	if($rowpreferences['PETS']=="Not Allowed")
	{
		$pets="preferences/petsnotallowed.png";
		$title2="Pets&nbsp;are&nbsp;not&nbsp;allowed.";
	}
	else
	{
		$pets="preferences/petsallowed.png";
		$title2="Pets&nbsp;are&nbsp;allowed.";
	}

	if($rowpreferences['EATABLES']=="Not Allowed")
	{
		$eatables="preferences/nofood.png";
		$title3="Food/Snacks&nbsp;are&nbsp;not&nbsp;allowed.";
	}
	else
	{
		$eatables="preferences/food.png";
		$title3="Food/Snacks&nbsp;are&nbsp;allowed.";
	}

	if($rowpreferences['ACCOMPANIER']=="Gents Only")
	{
		$accompanier="preferences/gentsonly.png";
		$title4="Preferred&nbsp;only&nbsp;Gents.";
	}
	else if($rowpreferences['ACCOMPANIER']=="Ladies Only")
	{
		$accompanier="preferences/ladiesonly.png";
		$title4="Preferred&nbsp;only&nbsp;Ladies.";
	}
	else
	{
		$accompanier="preferences/gender.png";
		$title4="Gents/Ladies&nbsp;doesn't&nbsp;matter.";
	}
		
	if($rowpreferences['DRINKS']=="Should not be a boozer")
	{
		$drinks="preferences/nodrinks.png";
		$title5="Boozers&nbsp;are&nbsp;not&nbsp;permitted.";
	}
	else
	{
		$drinks="preferences/drinks.png";
		$title5="Boozers&nbsp;can&nbsp;accompany.";
	}
		
	if($rowpreferences['LOQUACIOUS']=="Preferred")
	{
		$loquacious="preferences/talking.png";
		$title6="May&nbsp;be&nbsp;Loquacious.";
	}
	else
	{
		$loquacious="preferences/notalking.png";
		$title6="Should&nbsp;not&nbsp;be&nbsp;Loquacious.";
	}
$value=array('triptype'=>$triptype,'seatsoffered'=>$seatsoffered,'seatsavailable'=>$seatsavailable,'price'=>$price,'brand'=>$brand,'model'=>$model,'color'=>$color,'comfort'=>$comfort,'luggage'=>$luggage,'userphoto'=>$userphoto,'smoking'=>$smoking,'pets'=>$pets,'eatables'=>$eatables,'accompanier'=>$accompanier,'drinks'=>$drinks,'loquacious'=>$loquacious,'title1'=>$title1,'title2'=>$title2,'title3'=>$title3,'title4'=>$title4,'title5'=>$title5,'title6'=>$title6);
        echo json_encode($value);  
    }
}
?>