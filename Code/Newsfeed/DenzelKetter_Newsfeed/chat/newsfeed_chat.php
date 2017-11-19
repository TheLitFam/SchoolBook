<?php 
	include("dk_config.php");
	session_start();
	
  if (!$dbName) {
	  die("Connection failed: " . mysqli_connect_error());
  }
  
  $login_user = $_SESSION['login_user'];
  
  $getUser = "SELECT username FROM TEXTTHREAD WHERE username='$login_user'";
  $result = mysqli_query($dbName, $getUser);
  $user = "";

  //if a new post is submitted, post it to the url in realtime
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
	  $userPost = $_POST["userposts"];
	  
	  $escapeText = htmlentities(mysqli_real_escape_string($dbName, $userPost));
	  
	  //insert into chat
	  $insertQuery="INSERT INTO TEXTTHREAD (username, post_id, userposts) VALUES ('$login_user', 0, '$escapeText')";
   
	  //error check
	  if (!mysqli_query($dbName, $insertQuery)) {
		  echo ("Error:" . mysqli_error($dbName));
		  
	  }
	  
	  $user= $_POST["username"];
	}
	 
	  if ($user != "") 
       
		  $orderPosts ="SELECT * FROM TEXTTHREAD WHERE username='$user' ORDER BY post_id ASC";
	  else 
		  $orderPosts = "SELECT * FROM TEXTTHREAD ORDER BY post_id ASC";
	   
	  $postRows = mysqli_query($dbName, $orderPosts);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
	<title>Live Newsfeed</title>

<link type="text/css" rel="stylesheet" href="./dk_schoolbook.css" media="screen" />
</head>
<body>
	<div class="container">
		<header class="header">
			<h1>News Feed</h1>
			<h3>&nbsp;User: <?php echo $login_user ?></h3>
		</header>
		<main>
		<br/>
	<div class="newsFeed">
		<div id="newPost">
		<?php		
		while ($row2 = mysqli_fetch_assoc($postRows)) {		
			echo '' .$row2['username'] . ' : ' .$row2['userposts']. '</br>';
			}
		?>
		</div>
		<br/>
		<form id="postForm"  method="POST" action="newsfeed_chat.php">
			<input id="postInput" type="text" placeholder="What would you like to post today?" name="userposts"/>
			<input type="submit" name="postbtn" value="Post"/>
		</form>
	</div>
		</main>
	</div>
  </body>
</html>
				