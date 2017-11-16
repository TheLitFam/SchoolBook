<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>SchoolBook</title>
		<link href="vg_schoolbook.css" type="text/css" rel="stylesheet">
  </head>
<body>

<?php
  session_start();
  $error='';
  if (isset($_POST['submit'])) {

    if (empty($_POST['uName']) || empty($_POST['password'])) {
      $error = "<p style=\"color:white;\"> Username or Password is invalid </p>";
      echo "$error";
    }
    else {

      $username=$_POST['uName'];
      $password=$_POST['password'];

      $db = mysqli_connect("studentdb-maria.gl.umbc.edu","gy63575","gy63575","gy63575");

	  if (mysqli_connect_errno())
		  exit("Error - could not connect to MySQL");

      $username = stripslashes($username);
      $password = stripslashes($password);
    $username = mysqli_real_escape_string($db, $username);
    $password = mysqli_real_escape_string($db, $password);


    $query = mysqli_query($db, "SELECT * from USER where password='$password' AND username='$username'");


    $rows = mysqli_num_rows($query);

    if ($rows == 1) {
      $_SESSION['login_user']=$username;
      header("location: https://swe.umbc.edu/~plumikh1/is448/SchoolBook/newsfeed.php");
	  die();
    } else {
      $error = "<p style=\"color:white;\"> Username or Password is invalid </p>";
      echo "$error";
    }
    mysqli_close($db);
  }
}
?>
<a href="usecase2.php">Go back to Login page</a>
</body>
</html>
