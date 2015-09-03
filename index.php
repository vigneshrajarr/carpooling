<?php
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Car Pooling</title>
	<link rel="stylesheet" type="text/css" href="engine1/style.css" />
    <link rel="stylesheet" type="text/css" href="index.css" />
	<script type="text/javascript" src="engine1/jquery.js"></script>
</head>
    <style>
        .name
        {
            text-transform:capitalize;
        }
    </style>
<body>
    <div id="wrap">
    <br><br><br>
    <div>
        <table align="right" class="table">
            <tr>
                <td class="active">Home</td><td></td><td></td>
                <td class="td">Features</td><td></td><td></td>
                <td class="td">Terms</td><td></td><ttd></td>
                <td class="td">Advertising</td><td></td><ttd></td>
                <td class="td">Tour</td><td></td><ttd></td>
            </tr>
        </table>
        <br>
    </div>
    <br><br>
    <div class="container">
	<div id="wowslider-container1">
	<div class="ws_images">
        <ul>
            <li><img src="data1/images/11.jpg" alt="" title="" id="wows1_0"/>The fast lane to happiness.</li>
            <li><img src="data1/images/21.jpg" alt="" title="" id="wows1_1"/>They run your pockets fastly, black and nasty, nappy and crafty.</li>
            <li><img src="data1/images/31.jpg" alt="" title="" id="wows1_2"/>Ride with your favourites.</li>
            <li><img src="data1/images/41.jpg" alt="" title="" id="wows1_3"/>No stress on tolls.</li>
            <li><img src="data1/images/51.jpg" alt="" title="" id="wows1_4"/>Book at a Click.</li>
        </ul>
    </div>
    <div class="ws_bullets">
        <a href="#" title=""><img src="data1/tooltips/6.png" alt=""/>1</a>
        <a href="#" title=""><img src="data1/tooltips/2.jpg" alt=""/>2</a>
        <a href="#" title=""><img src="data1/tooltips/3.jpg" alt=""/>3</a>
        <a href="#" title=""><img src="data1/tooltips/1.jpg" alt=""/>4</a>
        <a href="#" title=""><img src="data1/tooltips/4.png" alt=""/>5</a>
    </div>
	</div>
	<script type="text/javascript" src="engine1/wowslider.js"></script>
	<script type="text/javascript" src="engine1/script.js"></script>
    </div>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600' rel='stylesheet' type='text/css'>
        <link href="//netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.css" rel="stylesheet">
        <table align="center">
            <tr>
                <td rowspan="2">
                    <div class="signup">
                    <h1>Sign up</h1>
                    <form action="register.php" method="post">
                    <hr>
                        <label id="icon" for="name"><i class="icon-envelope "></i></label>
                        <input class="name" type="text" name="name" id="name" pattern="^[a-zA-Z ]+$" title="Should not contain Numbers" placeholder="Name"/>
                        <label id="icon" for="name"><i class="icon-envelope "></i></label>
                        <input type="email" name="email" id="name" placeholder="Email" required/>
                        <label id="icon" for="name"><i class="icon-user"></i></label>
                        <input type="text" name="username" id="name" placeholder="Username" required/>
                        <label id="icon" for="name"><i class="icon-shield"></i></label>
                        <input type="password" name="password" id="name" title="Atlest 1 uppercase, 1lowercase, 1 number and 1 special  character and minimum 8 characters." pattern="^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$" placeholder="Password" required/>
                        <label id="icon" for="contact"><i class="icon-headphones"></i></label>
                        <input type="number" name="contact" id="contact" max="9999999999" min="1000000000" placeholder="Contact" required/>
                        <label id="icon" for="profession"><i class="icon-shield"></i></label>
                        <select name="profession">
                            <option value="Student">Student</option>
                            <option value="Skilled Worker">Skilled Worker</option>
                            <option value="Unskilled Worker">Unskilled Worker</option>
                        </select>
                    <div class="gender">
                        <input type="radio" value="Male" id="male" name="gender" checked/>
                        <label for="male" class="radio" chec>Male</label>
                        <input type="radio" value="Female" id="female" name="gender" />
                        <label for="female" class="radio">Female</label>
                    </div>
                    <p>By clicking Register, you agree on our <a href="#terms">terms and condition</a>.</p>
                        <input type="submit" value="Register" class="button">
                </form>
            </div>
        </td>
        <td>
            <div class="signin">
                <h1>Sign in</h1>
                <form action="login.php" method="post">
                    <hr>
                    <div>
                    <label id="icon" for="name"><i class="icon-envelope "></i></label>
                    <input type="text" name="username" id="name" placeholder="Username" required/>
                    <label id="icon" for="name"><i class="icon-shield"></i></label>
                    <input type="password" name="password" id="name" placeholder="Password" required/>
                    </div>
                    <p style="margin-top:20px"><input type="submit" class="button" value="Login"></p>
                </form>
            </div>
        </td>
        <tr>
        <td>
            <div class="forgot">
                <h1>Forgot Password</h1>
                <form action="" method="post">
                    <hr>
                    <label id="icon" for="name"><i class="icon-envelope "></i></label>
                    <input type="email" name="username" id="name" placeholder="Email" required/>
                    <p style="margin-top:20px"><input type="submit" class="button" value="Retrieve"></p>
                </form>
            </div>
        </td>
        </tr>
    </tr>
    </table>
    <span id="terms">Terms and Conditions:</span><br>
    1. Illegal accounts will be automatically detected and deleted at regular times.<br>
    2. Posting malicious information leads to deactivation of the account.<br>
    3. Violation of rules is strictly against the law.<br>
    4. Payments will mot be processed for the members whose account has been deactivated for a specific time.<br>
    5. The company has the rights to change of modify the rules without any consideration.<br>
    6. Advertising through the testimonials would lead to suspension of the account.<br>
    7. If the user is found to be illegal, he would be handed over to the crime branch of our department.<br>
    </div>
</body>
</html>