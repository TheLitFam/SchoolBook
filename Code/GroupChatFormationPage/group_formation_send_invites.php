<!--Author: Mikhail Plungis -->
<!DOCTYPE html>
<html lang="EN">
	<head>
		<title>Send Invites</title>
		<link rel="stylesheet" type="text/css" href="schoolbook_groupForm.css"/>
	</head>
	<body>
		<div id="header"> 
		
			<a href="groupchat.html" ><img src="schoolbook-logo.png" alt="schoolbook_logo" class="logosize" /></a> 
			<h1>
				Form a new group:
			</h1>
		</div>
		
		
		<div class="initial">
		<?php
			session_start();
			$login_name = $_SESSION["login_user"];
			
			$name = $_POST["group_name"];
			$num = $_POST["nMembers"];
				
			if($name == "" or $num == ""){					
				print("<p>You left the required fields blank!<br/> <a href=\"group_formation_initial.html\" > Edit Group </a></p>");
				$name = "Invalid";
				$num = "Invalid";
			}
				
			if($num != "Invalid") 
			{	
				settype($num, "integer");
				
				if($num <= 0){					
					print("<p>You must invite at least one new member!<br/> <a href=\"group_formation_initial.html\" > Edit Group </a></p>");
				}
			}
			#this is where the chat name and admin name will be added to the database
			$schoolbookDB = mysqli_connect("studentdb-maria.gl.umbc.edu","gy63575","gy63575","gy63575");
			
			$createGroup = "INSERT INTO GROUPCHATS(groupName, adminUserName) VALUES ('$name', '$login_name')";
			
			$query = mysqli_query($schoolbookDB, $createGroup);
			
		?>
			
			<p>			
				Group Name: <?php print($name); ?> <br/>
				# of Members: <?php print($num); ?> <br/>
				<a href="group_formation_initial.html" > Edit Group </a>
			</p>
		</div>
			
		<div class="names">
			
			<form class="login" name="parameters" action="group_formation_invite_results.php" method="post">				
				<?php 
				$count = 1;
				while($count <= $num){
					$cStr = $count;
					settype($cStr, "string");
					print("<input type=\"text\" name=\"names$cStr\" maxlength=\"50\"> <br/>");	
					$count++;
				}
					
				?>
				<button type="submit">
					<img src="button_submit.png" alt="Send Invites"/>
				</button>
			</form>		
		
		</div>

	</body>
	
</html>
