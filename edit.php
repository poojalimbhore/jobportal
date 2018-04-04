
<!DOCTYPE html>
<html>
<head>
  <title>Edit_Particular_users</title>
</head>
<body>
<form name="jobportal" action="edit.php" method="post">
<?php
ini_set('display_errors', 1);
if (isset($_GET['uid'])) {
  # code...
  $id=$_GET['uid'];

//print_r($id);
include "connection.php";
$con=mysqli_connect($databases['host'],$databases['user'],$databases['pass'],$databases['database']);
//$id=$_GET['uid'];
$sql="SELECT * from users where uid='$id'";
$result=mysqli_query($con,$sql);
if (mysqli_num_rows($result) > 0) {
  $row=mysqli_fetch_assoc($result);
  //echo $row['username'];
  # code...
}
//while ($row=mysqli_fetch_assoc($result)) {
  //echo $row['username'];
  //echo $row['email'];
  //echo $row['role'];
?>
<table>
    <tr>
      <td>Username</td>
      <td><input type="text" name="uname" value="<?php echo $row['username']; ?>"></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><input type="text" name="email" value="<?php echo $row['email'];?>"></td>
    </tr>
    <tr>
      <td>Role</td>
      <td><select name="role"><option value="admin">Admin</option>
                                                    <option value="company">Company</option>
                                                    <option value="employee">Employee</option></select></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" value="Update"></td>
    </tr>
  </table>
</form>
<?php 
}
//echo "$id";
ini_set('display_errors', 1);
if (isset($_POST['uname']) && isset($_POST['email'])) {
  $username=$_POST['uname'];
  $email=$_POST['email'];
$sql1="UPDATE users set username='$username',email='$email' where uid='$id'";
print_r($sql1);
$res=mysqli_query($con,$sql1) or die("error");
print_r($res);
if($res) {
  echo "Record updated successfully";
  # code...
}
else {
  echo "Failed";
}
}
?>
</body>
</html>