<?php 
	session_start();
	$_SESSION[ 'views'] = 1;
	//if(IsSet($_SESSION [" username "] ) && $_SESSION [ "username" ] == "") {
	?>
<?xml version = "1.0"?>
  <!DOCTYPE html PUBLIC "-//w3c//DTD XHTML 1.1//EN"
  "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
  <html xmlns="http://www.w3.org/1999/xhtml">


 <!-- Author: Denzel Ketter-->
  
   <head>
    <meta charset="utf-8">
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="dk_schoolbook.css" /> 
    <script src ="jquery.min.js"></script>

		<style "text/css">
			input[type=text] {

			width: 130px;
			float: right;
			transition: width 0.5s ease-in-out; /*animation*/
			-webkit-transition: width 0.5s ease-in-out; /*animation*/

							}

			input[type=text]:focus {
		
					width: 50%; /*when input field is clicked, change to full width*/

		
									}


			tr: nth-child(even) { 
			background-color: #f2f2f2;
			text-align: left;
			font-size: 12px;
							}		
		</style>

    </head>

  <body>

  	<!-- retrieve php session variables here -->
  	<?php echo "Pageviews=". $_SESSION['views']; ?>
    <div id="container">
      <header id="header"> 
      	<img src="./images/logo.png" alt="logo" class="logosize" />
	</header>
	
			
      <!--left menu-->
      <nav id="nav">
		
		<div class="tab">
			<button class="classlinks" onclick="openTab(event, 'WebDev')"> <img src="./images/webdev.png" alt="menu" class="menuimage" />  IS448 - Web Dev </button>
			<button class="classlinks" onclick="openTab(event, 'Stat')"> <img src="./images/statistics1.png" alt="stat" class="menuimage" />  STAT351 - Statistics </button>
			<button class="classlinks" onclick="openTab(event, 'Art')"> <img src="./images/art.png" alt="art" class="menuimage" />  ART380 - Graphics </button>
			<button class="classlinks" onclick="openTab(event, 'Data')"> <img src="./images/database.png" alt="data" class="menuimage" />  IS410 - Database Dev </button>
			<button class="classlinks" onclick="openTab(event, 'Econ')"> <img src="./images/world1.png" alt="econ" class="menuimage" />  ECON375 - World Econ </button>
		</div>
	  </nav>
	  <!--Nav Bar-->

        <div id="WebDev" class="classesmenu"> 
			<h3> IS448 - Web Dev </h3> 
		</div>
        
		<div id="Stat" class="classesmenu">
			<h3> STAT351 - Statistics </h3>
		</div>

        <div id="Art" class="classesmenu">  
			<h3> ART380 - Graphics </h3> 
		</div>

        <div id="Data" class="classesmenu"> 
			<h3>IS410 - Database Dev</h3>
		</div>

        <div id="Econ" class="classesmenu"> 
			<h3> ECON375 - World Econ</h3> 
		</div>

		
	  <main id="main">
		<form action="#" method="get" role="search">	
		
			<input type="text" name="searchbar" placeholder="Search...">

		<div class="toptab">
			<button class="toptablinks" autofocus> <img src="./images/home.png" alt="home" class="btnImage" /> &nbsp; &nbsp; Home </button>
			<button class="toptablinks"> <img src="./images/profile.png" alt="profile" class="btnImage" />&nbsp; &nbsp; Profile </button>
			<button class="toptablinks"> <img src="./images/notifications.png" alt="notifications" class="btnImage" />&nbsp; &nbsp; Notifications </button>
			<!--logout button -->
			<a href="./logout.php">
			<img class="btnImage" src="./images/small-logout.png" alt="logout" align="right" /> </a>	
		</div>

		</form>
		
			
	
      <!--Chat Box-->
	  <nav id="chat-nav">
	  <div class="nav-tab">
   
		  <a class="tablinks" href="./groupchat.html"><img src="./images/users2.png" alt="SchoolBook" class="btnImage" />&nbsp;&nbsp;Groups  </a> 
          <a class="tablinks" href="./classmates.html"><img src="./images/users.png" alt="SchoolBook" class="btnImage" />&nbsp;&nbsp;Classmates </a>
          <a class="tablinks" href="./inbox.html"><img src="./images/inbox.png" alt="SchoolBook" class="btnImage" />&nbsp;&nbsp;Inbox </a>
          <a class="tablinks" href="./settings.html"><img src="./images/settings.png" alt="SchoolBook" class="btnImage" />&nbsp;&nbsp;Settings </a>
	  </div>
	  </nav>


        <div class="dropdown">
          <select>
            <option value="webdev"> IS448 - Web Dev </option>
            <option value="stat"> STAT351 - Statistics </option>
            <option value="art"> ART 380 - Graphics </option>
            <option value="database"> IS410 - Database Dev </option>
            <option value="econ"> ECON375 - World Econ </option>
          </select>
		</div>
		<div class="chatroom">
			<iframe src="./chat/newsfeed_chat.php" name="chat_frame" height="1000" width="1000">
			</iframe>
	

          <!-- highlighted group chatting
          <table>
            <tr>
              <td><img class="btnImage" src="./images/female-icon.png" alt="female"/> Jane Doe </td>
            </tr>
            <tr>
              <td> <b> @John Doe </b> Yaaay I'll stop by right after my 11:30! </td>
            </tr>
            <tr>
              <td><img class="btnImage" src="./images/male-icon.png" alt="male" /> John Doe </td>
            </tr>
            <tr>
              <td> We're selling muffins and cookies for only a dollar at the Commons Breezeway! See you all there! </td>
            </tr>
            <tr style="border: 1px solid black">
              <td style="text-align: left"> <img class="btnImage" src="./images/smiley.png" alt="smiley"/><input type="text" id="chatInput" /> Send message... <input style ="button" value="Send" id="sendBtn"/> </td>
              <td style="text-align: right"> <img class="btnImage" src="./images/folder.png" alt="folder" /> </td>
            </tr>
          </table> -->
		  

        </div>
      </main>
      <footer id="footer"> <img class="footerimage" src="./images/umbc.png" alt="footer" /> </footer>
    </div>

	<!-- javascript for class links -->
	<script type= "text/javascript">
		function openTab(event, className) 
			{

				var i, classesmenu, classlinks, chatroom;
				var d = new Date();

				

				classesmenu = document.getElementsByClassName("classesmenu");
				for (i = 0; i < classesmenu.length; i++) {
					classesmenu[i].style.display = "none";

				}

				classlinks = document.getElementsByClassName("classlinks");
				for (i = 0; i < classlinks.length; i++) {
					classlinks[i].className = classlinks[i].className.replace(" active", "");

				
				}

		
				document.getElementById(className).style.display = "flex";
				event.currentTarget.className += " active";

			}
	
				document.getElementById("timedate").innerHTML = Date();

			
	</script>

  </body>

</html>