<!DOCTYPE html>
<html lang="EN">
	<head>
		<title>Send Invites</title>
		<link rel="stylesheet" type="text/css" href="schoolbook_groupForm.css">
	</head>
	<body>
		<header id="header"> 
		
			<a href="groupchat.html" > <img src="logo.png" class="logosize" /> </a> 
			<h1>
				Form a new group:
			</h1>
		</header>
		
		
		<div class="initial">
		<?php
			
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
			#this is where the chat name will be added to the database
			?>
			
			<p>			
				Group Name: <?php print($name); ?>
				# of Members: <?php print($num); ?> <br/>
				<a href="group_formation_initial.html" > Edit Group </a>
			</p>
		</div>
			
		<div class="names">
			
			<form name="parameters" action="group_formation_invite_results.php" method="post">				
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
					Send Invites
				</button>
			</form>		
		
		</div>

		<footer id="footer"> <img class="footerimage" src="umbc.png" /> </footer>
		</div>
	</body>
	
</html>
