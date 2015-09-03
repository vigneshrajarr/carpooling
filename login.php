<?php
    session_start(); // Starting Session
    $error=''; // Variable To Store Error Message
    if (empty($_POST['username']) || empty($_POST['password']))
    {
        $error = "Username or Password is invalid";
    }
    else
    {
        // Define $username and $password
        $username=$_POST['username'];
        $password=$_POST['password'];
        // Establishing Connection with Server by passing server_name, user_id and password as a parameter
        $connection = mysql_connect("localhost", "root", "") or die("Cannot connect");
        // To protect MySQL injection for Security purpose
        $username = stripslashes($username);
        $password = stripslashes($password);
        $username = mysql_real_escape_string($username);
        $password = mysql_real_escape_string($password);
        // Selecting Database
        $db = mysql_select_db("members", $connection) or die("Cannot select db");
        // SQL query to fetch information of registerd users and finds user match.
        $query = mysql_query("select * from clients where password='$password' AND username='$username'");
        $rows = mysql_num_rows($query);
        if ($rows > 0)
        {
            if($row=mysql_fetch_array($query))
            {
				if($row['STATUS']==1 || $row['STATUS']==0)
				{
					$_SESSION['username']=$username; // Initializing Session
                	$_SESSION['name']=$row['NAME'];
					$_SESSION['credits']=$row['CREDITS'];
					$_SESSION['email']=$row['EMAIL'];
					$_SESSION['status']=$row['STATUS'];
					$_SESSION['password']=$row['password'];
                	//header("location:home.php"); // Redirecting To Other Page
					header("location:home.php");
				}
				if($row['STATUS']==-1)
				{
					echo "Sorry, your identification shows us that you have a criminal case filed against your name. Hence your account has been dismissed by the authority. Redirecting, if not <a href=index.php>click here</a>....";
					header("refresh:2s;url=index.php");
				}
            }
        } 
        else 
        {
            $error = "Username or Password is invalid";
        }
        mysql_close($connection); // Closing Connection
    }
?>