<?php
 
 
 $user = "lgeoghegan01";

 $pw= "zYwfW9ZLCQTYpCqm";

 $server="lgeoghegan01.lampt.eeecs.qub.ac.uk";

 $db= "lgeoghegan01";
 
$conn = new mysqli($server, $user, $pw, $db);
 
 
if($conn->connect_error){
    echo $conn->connect_error;
}
 
 
?>