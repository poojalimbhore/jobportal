<!DOCTYPE html>
<html>
<head>
  <title>Edit User Form</title>
  <script type="text/javascript" src="js/validation.js"></script>
</head>
<body>
<form name="jobportal" method="post">
<?php

// Use get to get the uid. And then edit them.
//echo "<pre>"; print_r($_GET);
include "connection.php";
session_start();
ini_set('display_errors', 1);
//print_r($_SESSION);
$Username=$_SESSION['user'];
//print_r($Username);
$con=mysqli_connect($databases['host'],$databases['user'],$databases['pass'],$databases['database']);
$sql="SELECT uid,username,email FROM users where username='$Username'";
$result=mysqli_query($con,$sql);
//while($row=mysqli_fetch_array($result)){
  // print_r($row);
if(mysqli_num_rows($result) > 0 ){
$row = mysqli_fetch_assoc($result);
$name = $row["username"]; 
$user_id =  $row['uid'];
?>
  <table>
      <tr>
        <td>UserName*</td>
        <td><input type="text" name="uname" onblur="validateUsername()" value="<?php echo $row ['username'];?>"></td>
        <td><div type="text" ><img src="" id="username" height="25" width="30"></div></td>
      </tr>
      <tr>
        <td>Email id*</td>
        <td><input type="text" placeholder="Enter your valid email" name="email" onblur="validateEmail()" value="<?php echo $row ['email'];?>"></td>
        <td><div type="text" id="email_error"><img src="" id="email1" height="25" width="30"></div></td>
      </tr>
      <tr>
        <td><input type="submit" value="Submit" onclick="validateUser()"></td>
      </tr>
  </table>
</form>

<?php
ini_set('display_errors', 1);
}
ini_set('display_errors', 1);
if (isset($_POST['uname']) && isset($_POST['email'])) {
  $username=$_POST['uname'];
  $email=$_POST['email'];
  $sql1="UPDATE users set username='$username',email='$email' where username='$Username'";
  //print_r($sql1);
  
  $result=mysqli_query($con,$sql1);
  if($result) {
    echo "1 record updated";
  }
  else {
    echo "Failed";
  }
}
?>
</body>
</html>