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
        $name=$_POST['name'];
        $username=$_POST['username'];
        $password=$_POST['password'];
        $email=$_POST['email'];
        $contact=$_POST['contact'];
        $profession=$_POST['profession'];
        $gender=$_POST['gender'];
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
        $query = mysql_query("select * from clients where email='$email'");
        $rows = mysql_num_rows($query);
        if ($rows > 0)
        {
            echo "Already Registered. Please Login";
            header("refresh:0;url=index.php");
        } 
        else 
        {
            $query=mysql_query("INSERT INTO `clients`(`NAME`,`USERNAME`, `PASSWORD`, `GENDER`, `CONTACT`, `EMAIL`, `PROFESSION`) VALUES ('$name','$username','$password','$gender','$contact','$email','$profession')");
            echo '<html><title>goto:cabs;<title><body><link rel="stylesheet" type="text/css" href="bootstrap.css" />
            <div id="options" class="alert alert-success"><strong>Registered successfully.</strong> Redirecting to the login page,please wait....<br>If not, <a href="index.php">click here</a></div></body></html>';
            header("refresh:0;url=index.php");
        }
        mysql_close($connection); // Closing Connection
    }
?>