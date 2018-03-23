<?php session_start();
ini_set('display_errors', 1);
// print_r($_SESSION);
if(isset($_SESSION['user'])){

  $user1=$_SESSION['user'];
  echo "Welcome ".$user1."";
  echo "<br>";
  echo "Successfully logged";
}
?>