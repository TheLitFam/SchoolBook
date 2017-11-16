<!DOCTYPE html>
<html lang="EN">
	<head>
		<title>Invite Results </title>
		<link rel="stylesheet" type="text/css" href="schoolbook_groupForm.css">
	</head>
	<body>

		<header id="header"> 
		
			<a href="groupchat.html" > <img src="logo.png" class="logosize" /> </a> 
			<h1>
				Invites Sent to... 
			</h1>
			
		</header>
		
		<div class="names">
		<?php
			$names = array_values($_POST);	
			#this is where are the names in the array will be posted
		?>
			
		<p>			
			<ul>
		
			<?php
				
			foreach($names as $name){
			
				print("<li>$name</li>");					
						
			}
				
			?>
				
			</ul>
		</p>
			
		<a href="groupchat.html"> Return to profile </a>
		</div>
			
		<footer id="footer"> <img class="footerimage" src="umbc.png" /> </footer>
	</body>
</html>
