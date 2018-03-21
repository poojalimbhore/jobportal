<!DOCTYPE html>
<html>
<head>
  <title>Login Page</title>
</head>
<body>
<form method="post">
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
</body>
<?php
include "connection.php";
$con=mysqli_connect($databases['host'],$databases['user'],$databases['pass'],$databases['database']);
if(isset($_POST['username']) && isset($_POST['password'])) { 
  $user=$_POST['username'];
  $password=$_POST['password'];
  $sql="SELECT username from users where username='$user'";
  $sql2="SELECT password from users where password='$password'";
  $result=mysqli_query($con,$sql);
  $result2=mysqli_query($con,$sql2);
  if(mysqli_num_rows($result) > 0 ) {
    echo "Valid Username";
    echo "<br>";
  if(mysqli_num_rows($result2) > 0){
    echo "Valid Password";
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
</html>
