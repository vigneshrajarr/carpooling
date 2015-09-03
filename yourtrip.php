<?php
$tripid=$_GET['tripid'];
$connection = mysql_connect("localhost", "root", "") or die("Cannot connect");
$db = mysql_select_db("members", $connection) or die("Cannot select db");
$offer=mysql_query("select * from `offers` where TRIPID='$tripid'");
$ride=mysql_query("select * from `ride` where tripid='$tripid'");
//trip details
$rowoffers=mysql_fetch_assoc($offer);
$source=$rowoffers['SOURCE'];
$destination=$rowoffers['DESTINATION'];
$triptype=$rowoffers['TRIPTYPE'];
$date=$rowoffers['DATE'];
$time=$rowoffers['TIME'];
$price=$rowoffers['PRICE'];
$car=$rowoffers['CAR'];
$seatsoffered=$rowoffers['SEATSOFFERED'];
$seatsavailable=$rowoffers['SEATSAVAILABLE'];
$offeredby=$rowoffers['USERNAME'];
//echo "$source";
//echo "$destination";
////echo "$triptype";
//echo "$date";
$time = date("h:i A", strtotime("{$rowoffers['TIME']}"));
//echo "$time";
//echo "$price";
//echo "$car";
//echo "$seatsoffered";
//echo "$seatsavailable";
//echo nl2br("\n");

//preferences
$client=mysql_query("select * from `clients` where USERNAME='$offeredby'");
$rowclients=mysql_fetch_assoc($client);
$name=$rowclients['NAME'];
$gender=$rowclients['GENDER'];
$contact=$rowclients['CONTACT'];
$email=$rowclients['EMAIL'];
$profession=$rowclients['PROFESSION'];
//echo "$gender";
//echo "$contact";
//echo "$email";
//echo "$profession";
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
//echo "$smoking";
//echo "$pets";
//echo "$eatables";
//echo "$accompanier";
//echo "$drinks";
//echo "$loquacious";

//car details
$car=mysql_query("select * from `cars` where USERNAME='$offeredby'");
$rowcars=mysql_fetch_assoc($car);
$brand=$rowcars['BRAND'];
$model=$rowcars['MODEL'];
$color=$rowcars['COLOR'];
$noofseats=$rowcars['NOOFSEATS'];
$comfortness=$rowcars['COMFORTNESS'];
$luggage=$rowcars['LUGGAGE'];
$regnum=$rowcars['REGNUM'];
//echo "$brand";
//echo "$model";
//echo "$color";
//echo "$noofseats";
//echo "$comfortness";
//echo "$luggage";
//echo "$regnum";
$sql=mysql_query("select USERPHOTO from `photodetails` where EMAIL='$email'");
$row=mysql_fetch_assoc($sql);
$userphoto=$row['USERPHOTO'];
$tripdetails=array('source'=>$source,'destination'=>$destination,'triptype'=>$triptype,'date'=>$date,'time'=>$time,'price'=>$price,'seatsoffered'=>$seatsoffered,'seatsavailable'=>$seatsavailable,'name'=>$name,'gender'=>$gender,'email'=>$email,'profession'=>$profession,'smoking'=>$smoking,'pets'=>$pets,'eatables'=>$eatables,'accompanier'=>$accompanier,'drinks'=>$drinks,'loquacious'=>$loquacious,'brand'=>$brand,'model'=>$model,'color'=>$color,'comfortness'=>$comfortness,'luggage'=>$luggage,'regnum'=>$regnum,'userphoto'=>$userphoto,'contact'=>$contact,'title1'=>$title1,'title2'=>$title2,'title3'=>$title3,'title4'=>$title4,'title5'=>$title5,'title6'=>$title6);
echo json_encode($tripdetails);
?>