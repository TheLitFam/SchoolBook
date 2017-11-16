<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>SchoolBook</title>
		<link href="vg_schoolbook.css" type="text/css" rel="stylesheet">
  </head>
<body>

<?php

  $error='';
  if (isset($_POST['submit'])) {

    if (empty($_POST['newpassword']) || empty($_POST['confirmpassword'])) {
      $error = "<p style=\"color:white;\"> Passwords do not match </p>";
      echo "$error";
    }
    else {
      $email=$_POST['email'];
      $new=$_POST['newpassword'];
      $confirm=$_POST['confirmpassword'];

      $db = mysqli_connect("studentdb-maria.gl.umbc.edu","gy63575","gy63575","gy63575");

	  if (mysqli_connect_errno())
		  exit("Error - could not connect to MySQL");
      $email = stripslashes($email);
      $new = stripslashes($new);
      $confirm = stripslashes($confirm);
    $email = mysqli_real_escape_string($db, $email);
    $new = mysqli_real_escape_string($db, $new);
    $confirm = mysqli_real_escape_string($db, $confirm);

    if ($new <> $confirm){

      $error = "<p style=\"color:white;\"> Passwords do not match </p>";
      echo "$error";
    }
    else  {
      mysqli_query($db, "UPDATE USER SET password='$new' WHERE email ='$email'");
      echo '<script language="javascript">';
      echo 'alert("You successfully changed your password!")';
      echo '</script>';

      header("location: https://swe.umbc.edu/~plumikh1/is448/SchoolBook/usecase2.php");
	  die();

    }

  mysqli_close($db);
}
}
?>
<a href="resetpassword.html">Go back to Reset Password page</a>
</body>
</html>
