<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Login Page</title>
</head>
<body>
<form method="post" action="">
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
      <td><input type="submit" value="login"></td>
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
  $sql="SELECT username from users where username='$user' && password='$passenc'";
  $result=mysqli_query($con,$sql);
  if(mysqli_num_rows($result) > 0 ) {
    $row=mysqli_fetch_array($result);
    echo "Valid Username";
    echo "<br>";
    echo "Valid Password";
    $_SESSION['user']=$_POST['username'];
   // print_r($_SESSION);
  header("location:user-listing.php");
  exit();
}
  else {
    echo "Invalid Username/Password";
  }
}
?>
</body>
</html>