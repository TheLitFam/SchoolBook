<!DOCTYPE html>
<!-- Priyanka Ranade, IS448, Processing Form-->
<html lang="EN">

<head>
  <title> Blogview </title>
  <!--<link rel="stylesheet" type="text/css" href="form_proc.css" /> </head>-->

<body>
  <?php
        error_reporting(E_ALL);
	#connect to mysql database
	$db = mysqli_connect("studentdb-maria.gl.umbc.edu","gy63575","gy63575","gy63575");

	if (mysqli_connect_errno()) {
        echo "Error";
     exit("Error - could not connect to MySQL");   
    }
      
/*getting all blog posts*/
$get_query = "SELECT username FROM USER";

/*print ("CHECK PROGRAM IS WORKING  MESSAGE: The query is: $get_query </br>");*/

$result = mysqli_query ($db, $get_query);

if (!$result) {
print ("Error-query could not be executed");
$error = mysqli_error();
print "<p> . $error . </p>";

exit;
}

#check how many rows have been returned by the query

$num_rows = mysqli_num_rows ($result);
/*print ("CHECK PROGRAM IS WORKING MESSAGE: Number of rows returned: $num_rows <br />");*/

?>
    <div class="textcenter">
      <p class="heading">Classmates</p>
      <?php
             error_reporting(E_ALL);
      
       while ($row_array = mysqli_fetch_array($result)) {
         
           
           print("<div class='record'>");
           print("<table>");
           print ("<tr>");
            print ("<td> $row_array[title] </td>");
            print ("</tr>");
           
           
           print ("<tr>");
            print ("<td> $row_array[post] </td>");
            print ("</tr>");
           
           print ("<tr>");
            print ("<td> $row_array[tags] </td>");
            print ("</tr>");
            
           print("</table>");
           print ("</div>");
           print ("<br/>");
           
       }
        
        ?>
        <br/> <a href="blogpost.html">Enter another blogpost</a> </body>

</html>