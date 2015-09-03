<?php
$connection = mysql_connect("localhost", "root", "") or die("Cannot connect");
$db = mysql_select_db("members", $connection) or die("Cannot select db");
session_start();
$target_dir = "uploads/";
$email=$_SESSION['email'];
$licensenumber=$_POST['licensenumber'];
$votenumber=$_POST['votenumber'];
$target_file1 = $target_dir . basename($_FILES["image1"]["name"]);
$target_file2 = $target_dir . basename($_FILES["image2"]["name"]);
$target_file3 = $target_dir . basename($_FILES["image3"]["name"]);
$uploadOk = 1;
$imageFileType1 = pathinfo($target_file1,PATHINFO_EXTENSION);
$imageFileType2 = pathinfo($target_file2,PATHINFO_EXTENSION);
$imageFileType3 = pathinfo($target_file3,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) 
{
    $check1 = getimagesize($_FILES["image1"]["tmp_name"]);
    $check2 = getimagesize($_FILES["image2"]["tmp_name"]);
    $check3 = getimagesize($_FILES["image3"]["tmp_name"]);
    if($check1 !== false) 
	{
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
	if($check2 !== false) 
	{
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
	if($check3 !== false) 
	{
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
$temp1=explode(".",$_FILES["image1"]["name"]);
$temp2=explode(".",$_FILES["image2"]["name"]);
$temp3=explode(".",$_FILES["image3"]["name"]);
$filename1=$email.'-user.'.end($temp1);
$filename2=$email.'-license.'.end($temp2);
$filename3=$email.'-vote.'.end($temp3);
move_uploaded_file($_FILES["image1"]["tmp_name"],"uploads/".$filename1);
move_uploaded_file($_FILES["image2"]["tmp_name"],"uploads/".$filename2);
move_uploaded_file($_FILES["image3"]["tmp_name"],"uploads/".$filename3);
$sql="INSERT INTO `photodetails`(`EMAIL`, `USERPHOTO`, `LICENSEPHOTO`, `LICENSENUMBER`, `VOTEPHOTO`, `VOTENUMBER`) VALUES ('$email','uploads/$filename1','uploads/$filename2','$licensenumber','uploads/$filename3','$votenumber')";
mysql_query($sql) or die("photo");
echo "Your account will be verified and notified soon.";
header("refresh:0;url=index.php");
?>