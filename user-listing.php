<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>User-listing</title>
</head>
<body>
<form action="" method="get">
  <table>
    <tr>
      <td>Admin</td>
      <td><a href="admin_edit.php">Edit</td>
    </tr>
     <tr>
      <td>User</td>
      <td><a href="profile_edit.php">Edit</td>
    </tr>
    <tr>
      <td>Company</td>
      <td></td>
    </tr>
  </table>
</form>
   
<?php
 include "connection.php";
$Username=$_SESSION['user'];
print_r($Username);
$con=mysqli_connect($databases['host'],$databases['user'],$databases['pass'],$databases['database']);
$sql="SELECT uid,username FROM users where username='$Username'";
//print_r($sql);
$result=mysqli_query($con,$sql);
while(mysqli_num_rows($result) > 0){
   $row=mysqli_fetch_assoc($result);
   $id=$row['uid'];
   print_r($id);
  
   header("Location:profile_edit.php?uid=" . $id); 
   print_r($row); 
   exit;
}
?>
</body>
</html>