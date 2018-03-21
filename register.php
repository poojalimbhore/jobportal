<html>
<head>
    <title> Registration form</title>
    <script type="text/javascript" src="validation.js"></script>
</head>
<body style="background-color:Grey;">
  <form name="jobportal" method="POST" action="login.php">
  <h1><center>Register and find your dream job</center></h1>
    <table>
      <tr>
        <td>UserName*</td>
        <td><input type="text" placeholder="Enter username here" name="uname" onblur="validateUsername()" ></td>
        <td><div type="text" ><img src="" id="username" height="25" width="30"></div></td>
      </tr>
      <tr>
        <td>Email id*</td>
        <td><input type="text" placeholder="Enter your valid email" name="email" onblur="validateEmail()"></td>
        <td><div type="text" id="email_error"><img src="" id="email1" height="25" width="30"></div></td>
      </tr>
      <tr>
        <td>Role*</td>
        <td><select><option value="User">User</option>
                                <option value="Company">Company</option>
                                <option value="Admin">Admin</option>
                    </select>
        </td>
      </tr>
      <tr>
        <td>Created_date*</td>
        <td><input type="date" name="cdate" ></td>
        <td></div></td>
      </tr>
      <tr>
      <tr>
        <td>Status*</td>
        <td><select><option value="Active">Active</option><option value="Non-Active">Non-Active</option></select></td>
        <td><div></div></div></td>
      </tr>
        <td>Password*</td>
        <td><input type="password" placeholder="Enter 6 chracter password" id="password" name="password" onkeyup="matchPassword()"></td>
        <td><div type="text" id="message" ></div></td>
      </tr>
      <tr>
         <td>Confirm Password*</td>
         <td><input type="password" placeholder="Reenter your password" id="confirm_password" onkeyup="matchPassword()"></td>
         <td><div type="text" id="message"></div></td>
      </tr>
      <tr>
        <td><input type="Submit" value="Submit" name="submit" onclick="validateform()"></td>
      </tr>
      <tr>
        <td>Already Member?</td>
        <td><input type="Submit" value="Login"></td>
      </tr>
    </table>
  </form>
</body>

<?php

include ("connection.php");

$con = mysqli_connect($databases['host'],$databases['user'],$databases['pass'],$databases['database']);

//mysqli_select_db($con,$databases['database']);
  if(isset($_POST['uname']) && isset($_POST['email']) && isset($_POST['password'])){
  $user = $_POST['uname'];
  $pass= $_POST['password'];
  $email= $_POST['email'];
  $user_error="SELECT username from users where username='$user'";
  $mail_error ="SELECT email from users where email='$email'";

  $user_result =mysqli_query($con,$user_error);
  $mail_result =mysqli_query($con,$mail_error);
if (mysqli_num_rows($user_result) > 0) {
  echo "Username already exist";
}
  else if(mysqli_num_rows($mail_result) > 0) {
    echo "Email already exist";# code...
  }
else{
  
  $sql = "INSERT INTO users (username, email, password)
     VALUES ('".$_POST["uname"]."','".$_POST["email"]."','".$_POST["password"]."')";

    if(mysqli_query($con,$sql)) {
      echo "1 record inserted";
    }
}
}
?>
</html>