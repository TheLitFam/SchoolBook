
<?php
//include('login.php'); // Includes Login Script

//if(isset($_SESSION['login_user'])){
//header("location: https://swe.umbc.edu/~plumikh1/is448/SchoolBook/newsfeed.html");
//die();
//}
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>SchoolBook</title>
		<link href="vg_schoolbook.css" type="text/css" rel="stylesheet">

	</head>
	<body>
	<img src="home.png" alt="Home" style= "width: 55px; height: 70px;">
		<div class="container">

    <div class="row">
        <div class="col-md-12">

					<div class="wrap">


<p class="form-title">

SchoolBook <br>
Sign In</p>
<form class="login" method="post" action="login.php">

<input type="text" placeholder="Username" name="uName" maxlength ="25"/>

<input type="password" placeholder="Password" name="password" maxlength = "25" />

<input type="submit" name = "submit"/>
<div class="remember-forgot">
<div class="row">
<div class="col-md-6">
<div class="checkbox">

<label>
<input type="checkbox" />
Remember Me
</label>
</div>
</div>
 <div class="col-md-6 forgot-pass-content">
<a href="forgetpassword.html" class="forgot-pass">Forgot Password</a>
</div>
</div>
</div>
</form>
</div>
</div>
</div>
</div>

	</body>
	</html>
