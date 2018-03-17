<?php 

function redirect(){
  require_once 'connection.php';
  if(filesize('connection.php')==0) {
    header("Location: install.php");
  }
  else {
    header("Location: home.php");
    exit();
  }
}

redirect();


?>