<?php 

session_start(); //init session
session_unset(); 
session_destroy(); //session destroyed
header ('location:login.php?message=logout');



?> //end of file