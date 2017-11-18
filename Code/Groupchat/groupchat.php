<?php
   include("config.php");
   session_start();
  if (!$db) {
      die("Connection failed: " . mysqli_connect_error());
  }
  // Get user from session
  $login_user = $_SESSION['login_user'];
  //$login_user = "gy63575";
  // Get classid, groupid from session.
  //$classid = $_SESSION['classid'];
  //$groupid = $_SESSION['groupid'];
    
  $classid = "IS410";
  $getGroups = "SELECT groupName FROM ASSIGNEDGROUP WHERE userName='$login_user'";
  $result = mysqli_query($db, $getGroups);
  $group = "";

  // If form is submited then
  // Get chat text from url
  if($_SERVER["REQUEST_METHOD"] == "POST") {
    $chatText=$_POST["chattext"];
 
    //escaping to avoid injections!
    $textEscaped = htmlentities(mysqli_real_escape_string($db, $chatText)); 
    //Insert into chat
    $insertQuery="INSERT INTO GROUPCHATS (groupName, senderUserName, class_Id,chattext) VALUES ('First','$login_user', 0, '$textEscaped')";
    //echo "insert query:" . $insertQuery;
    if (!mysqli_query($db, $insertQuery)){
       echo ("Error:" .mysqli_error($db));
    }
    //select group 
    $group=$_POST["group"];
  }

  //$sql = "select * from GROUPS where classNumber ='$classid'";
  //$chatsql = "select * from chat where classid ='" .$classid ."'";
  if($group != "")
	$chatsql = "SELECT * FROM GROUPCHATS WHERE groupName='$group' ORDER BY chatID ASC";  
  else
    $chatsql = "SELECT * FROM GROUPCHATS ORDER BY chatID ASC";
  //echo $sql;
  //$result = mysqli_query($db, $sql);
  $chatRows = mysqli_query($db, $chatsql);
?>
  

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>IS Chat Program</title>
   
    <link rel="stylesheet" href="css/main.css" type="text/css" media="screen" />
</head>
<body>
    <div class="container">
        <header class="header">
            <h1>Group Chat</h1>
            <h3>&nbsp;User:<?php echo $login_user ?></h3>
        </header>
        <main>
		   <form id="groupSelect" method="POST" action="groupchat.php">
             <select>
             <?php
             //load the dropdown for group
             while ($row = mysqli_fetch_assoc($result)) {
		       $group = $row['groupName'];
               echo "<option value=\"$group\"> $group </option>";
             }     
			 ?>
			 </select>
			 <input type="submit" name="submit" value="Select Group"/>
		  </form>
  
          <hr/>
          <div class="chat">
            <div id="chatOutput">
            <?php
            // load the dropdown for group
            while ($row2 = mysqli_fetch_assoc($chatRows)) {
               echo '' .$row2['senderUserName'] . ': ' .$row2['chattext']. '</br>';
            }     
            ?> 
            </div>
            <br/>
            <form id="chatform" method="POST" action="groupchat.php">
			   <input id="chatInput" type="text" placeholder="Input Text here" maxlength="128" name="chattext"/>
		   	   <input type="submit" name="submit" value="Submit"/> 
            </form>
          </div>
        </main>
    </div>
 </body>
</html>