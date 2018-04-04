
<!DOCTYPE html>
<html>
<head>
  <title>Edit_Particular_users</title>
</head>
<body>
<form name="jobportal" action="edit.php" method="post">
<?php
ini_set('display_errors', 1);
include "connection.php";
$con=mysqli_connect($databases['host'],$databases['user'],$databases['pass'],$databases['database']);
if(isset($_GET['uid'])){
$id=$_GET['uid'];
print_r($id);
//$id=$_GET['uid'];
$sql="SELECT * from users where uid='$id'";

$result=mysqli_query($con,$sql);
if (mysqli_num_rows($result) > 0) {
  $row=mysqli_fetch_assoc($result);
  echo $row['username'];
  echo $row['uid'];

  # code...

//while ($row=mysqli_fetch_assoc($result)) {
  //echo $row['username'];
  //echo $row['email'];
  //echo $row['role'];
?>
<table>
    <tr>
      <td><input  type="hidden" name="id" value="<?php echo $row['uid'];?>"></td>
    </tr>
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
}
ini_set('display_errors', 1);
ini_set("track_errors", 1);
if (!empty($_POST['uname']) && !empty($_POST['email'])) {
  echo "string";
  $username=$_POST['uname'];
  $email=$_POST['email'];
  $id1=$_POST['id'];
  print_r($username);
  
  $sql1="UPDATE users set username='$username',email='$email' where uid='$id1'";
  print_r($sql1);
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