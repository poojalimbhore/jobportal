<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Login Page</title>
</head>
<body>
<form method="post" action="home.php">
  <table>
    <tr>
      <td>Username*</td>
      <td><input type="text" name="username" placeholder="Enter valid username"></td>
    </tr>
    <tr>
     <td>Password*</td>
     <td><input type="password" name="password" placeholder="Enter valid password"></td>
    </tr>
    <tr>
      <td><input type="Submit" value="Login"></td>
    </tr>
  </table>
</form>
<?php
include "connection.php";
$con=mysqli_connect($databases['host'],$databases['user'],$databases['pass'],$databases['database']);
if(isset($_POST['username']) && isset($_POST['password'])) { 
  $user=$_POST['username'];
  $password=$_POST['password'];
  $passenc=md5($_POST['password']);
  $sql="SELECT username from users where username='$user'";
  $sql2="SELECT password from users where password='$passenc'";
  $result=mysqli_query($con,$sql);
  $result2=mysqli_query($con,$sql2);
  if(mysqli_num_rows($result) > 0 ) {
    echo "Valid Username";
    echo "<br>";
  if(mysqli_num_rows($result2) > 0){
    echo "Valid Password";
  $_SESSION['user']=$_POST['username'];
  echo "<br>";
  print_r($_SESSION['user']);
  }
   else{
      echo "Invalid Password";
    }
}
  else {
    echo "Invalid Username/Password";
  }
}

?>
</body>
</html>
