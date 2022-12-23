<?php   
       include('connect.php');
     session_start();  
  $des =  session_destroy();
if ($des == TRUE) {
header('location:login.php');
}
  
 header('location:login.php');



?>

