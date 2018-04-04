<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
<form method="get">
   <table>
     <thead>
     <tr>
       <th>User-ID</th>
       <th>Username</th>
       <th>Email</th>
    </tr>
    </thead>
    <tbody>
<?php
ini_set('display_errors', 1);
include "connection.php";
$con=mysqli_connect($databases['host'],$databases['user'],$databases['pass'],$databases['database']);
//print_r($con);
$sql0="SELECT count(*) from users";
$ress=mysqli_query($con,$sql0);
$roww=mysqli_fetch_array($ress);
if (!(isset($_GET['page']))) {
  $start=$roww[0] - 5;
}
else {
  $start=$roww[0] - ($_GET['page'] * 5); 
}
$sql="SELECT * FROM users LIMIT $start,5";
$result=mysqli_query($con,$sql);
while ($row=mysqli_fetch_array($result)) {
 // echo $row['uid']." ".$row['username']. " " .$row['email'];
  ?>
  <?php
  echo "<br>";
  ?>
     <tr>
       <td><?php echo $row['uid'] ?></td>
       <td><?php echo $row['username']?></td>
       <td><?php echo $row['email']?></td>
       <td><a href="edit.php?uid=<?php echo $row['uid'] ?>">Edit</a></td>
     </tr>
   <?php
 }
   echo "<br>";
?>
</tbody>
   </table>
 </form>
<a href="admin_edit.php?page=1">1</a>
  <a href="admin_edit.php?page=2">2</a>
   <a href="admin_edit.php?page=next">Next</a>
</body>
</html>