<!--Author: Mikhail Plungis -->
<!DOCTYPE html>
<html lang="EN" >
	<head>
		<title>Invite Results </title>
		<link rel="stylesheet" type="text/css" href="schoolbook_groupForm.css"/>
	</head>
	<body>

		<div id="header"> 
		
			<a href="groupchat.html" ><img src="schoolbook-logo.png" alt="schoolbook_logo" class="logosize" /></a> 
			<h1>
				Invites Sent to... 
			</h1>
			
		</div>
		
		<div class="names">
		<?php
			#get group chat name
			session_start();
			$groupName = $_SESSION["groupName"];
			
			#get user names
			$names = array_values($_POST);	
			$userExists = [];
			
			#check each name against the database
			$schoolBookDB = mysqli_connect("studentdb-maria.gl.umbc.edu","gy63575","gy63575","gy63575");
			
			foreach($names as $name){
				
				$checkName = "SELECT * FROM USER WHERE username='$name'";
				$doCheck = mysqli_query($schoolBookDB, $checkName);
				
				if($doCheck){
					$userExists[$name] = true;
					$insertUser = "INSERT INTO ASSIGNEDGROUP (groupName, userName) VALUES ('$groupName', '$name')";
					$addUserToGroup = mysqli_query($schoolBookDB, $insertUser);
				}
				
				else {
					$userExists[$name] = false;
				}
			}
			
		?>
			
		<p>			
			<ul>
		
			<?php
				
			foreach($names as $name){
				if($userExists[$name])
					print("<li> Invite sent to $name! </li>");					
				else
					print("<li> User $name not found... </li>");
			}
				
			?>
				
			</ul>
		</p>
			
		<a href="groupchat.html"> Return to profile </a>
		</div>
			
	</body>
</html>
