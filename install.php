<!-- <!DOCTYPE html>
<html>
<head>
	<title>Create Database</title>
</head>
<body>
<form method="POST" >
<table>

<tr>	
	<td>Enter HostName</td>		
		<td><input type="text" name="host"></td>		
</tr>

<tr>	
	<td>Enter Username</td>		
		<td><input type="text" name="username"></td>
</tr>

<tr>	
	<td>Enter Password</td>		
		<td><input type="password" name="password" ></td>
</tr>

<tr>	
	<td>Enter DatabaseName</td>	
		<td><input type="text" name="database"></td>
</tr>

<tr>	
	<td colspan="2"><input type="submit" value="Submit" name="submit"></td>	
</tr>

</table>

</form> -->
<?php


  ini_set('display_errors', 0);		

  if(filesize('connection.php') == 0){
    ?>

    <!DOCTYPE html>
<html>
<head>
  <title>Create Database</title>
</head>
<body>
<form method="POST" >
<table>

<tr>  
  <td>Enter HostName</td>   
    <td><input type="text" name="host"></td>    
</tr>

<tr>  
  <td>Enter Username</td>   
    <td><input type="text" name="username"></td>
</tr>

<tr>  
  <td>Enter Password</td>   
    <td><input type="password" name="password" ></td>
</tr>

<tr>  
  <td>Enter DatabaseName</td> 
    <td><input type="text" name="database"></td>
</tr>

<tr>  
  <td colspan="2"><input type="submit" value="Submit" name="submit"></td> 
</tr>

</table>

</form>
<?php
 
  
if (isset($_POST['host']) && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['database'])) {	
        // Create database
       $con = mysqli_connect($_POST['host'], $_POST['username'], $_POST['password']);
       if($con){
        echo "Connected Successfully";
        echo "<br>";
       $query = "CREATE DATABASE " . $_POST['database'];
          //$query="CREATE DATABASE $databases['database'];";
          if (mysqli_query($con,$query))
           {
          echo "Database created";
          echo "<br>";
          echo "<br>";
          require_once "create_tables.php";
          create_tables(); //function call to create tables
          write_database_credentials();	
          }
          else
          {
          echo "Database name already exist";
          echo "<br>";
          echo "<br>";
        
          mysqli_select_db($con, $_POST['database']);
          $result=mysqli_query($con, "SHOW TABLES");
	   $count= mysqli_num_rows($result);
	   if($count!=0)
	   {
	      echo "Database contains tables";
		echo "<br>";
	   }
	else
        {
	   echo "Database does not contains tables";
	   echo "<br>";
	   echo "<br>";
          require_once "create_tables.php";
	    create_tables();
           write_database_credentials();
	  }
  }
}
    else{

        die("Please fill out all details correctly") ;
        }
  }
}

else{
  echo "This site already has database setup";

  ?>
<a href="home.php" >Click Here </a>

  <?php
  //header("Location: home.php");
}


function write_database_credentials() {

  $databases = ' <?php 
    $databases = array(
      "host" => "' . $_POST['host'] . '",
      "user" => "' . $_POST['username'] . '",
      "pass" =>  "' . $_POST['password'] . '",
      "database" => "' . $_POST['database'] . '",
    ); 
?>';
     // $con = mysqli_connect($databases['hostname'],$databases['user'],$databases['pass'],$databases['database']);
     $file = 'connection.php';
     $current= file_get_contents($file);
     
     $current= $databases;
     $file = file_put_contents($file, $current);
}			  			
?>


</body>
</html>
   