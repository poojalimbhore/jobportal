<?php

ini_set('display_errors', 1);
function create_tables() {
   
   $con = mysqli_connect($_POST['host'], $_POST['username'], $_POST['password'], $_POST['database']);
    mysqli_select_db($con, $_POST['database']);
          
        $result= "CREATE TABLE users
        (
        uid INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(30) NOT NULL,
        email VARCHAR(30) NOT NULL,
        password VARCHAR(50) NOT NULL,
        created_date TIMESTAMP,
        status tinyint(1) DEFAULT NULL,
        role VARCHAR(30) NOT NULL
        )";

            if (mysqli_query($con,$result)) 
            {
            echo "Table users created successfully";
            echo "<br>";
            echo "<br>";
            } 
            else 
            {
            echo "Error creating table: " . mysqli_error($con);
            echo "<br>";
            echo "<br>";
            }
            //Create table content
                $result= "CREATE TABLE conent(
                cid INT(11) NOT NULL,
                type VARCHAR(30) NOT NULL,
                title VARCHAR(30) NOT NULL,
                uid INT(11) NOT NULL,
                created TIMESTAMP,
                status TINYINT(1)
                 DEFAULT NULL
                 )";

                if(mysqli_query($con,$result))
                {
                  echo "Table content created successfullly";
                  echo "<br>";
                  echo "<br>";
                }
                else
                {
                  echo "Error creating table:" . mysqli_error($con);
                  echo "<br>";
                  echo "<br>";
                }

            // Create table page
                        $result= "CREATE TABLE page(
                        cid INT(11) NOT NULL,
                        description VARCHAR(30) NOT NULL
                                  )";
                        if(mysqli_query($con,$result))
                        {
                          echo "Table Page Created Successfully";
                          echo "<br>";
                          echo "<br>";
                        }
                        else
                        {
                          echo "Error creating table:" . mysqli_error($con);
                          echo "<br>";
                          echo "<br>";
                        }

                              //Create table job
                              $result= "CREATE TABLE job 
                              (
                              cid INT(11) NOT NULL,
                              description VARCHAR(255) NOT NULL,
                              experience  FLOAT(20) NOT NULL,
                              salary  FLOAT(20) NOT NULL

                              )";
                              if(mysqli_query($con,$result))
                              {

                                echo "Table job created successfully";
                                echo "<br>";
                                echo "<br>";
                              }
                              else
                              {

                                echo "Error creating table" . mysqli_error($con);
                                echo "<br>";
                                echo "<br>";
                              }

                      //create table application 
                                    $result= "CREATE TABLE application 
                                    (
                                    cid INT(11),
                                    cover_letter VARCHAR(255),
                                    resume VARCHAR(255)
                                    )";
                                    if(mysqli_query($con,$result))
                                    {
                                      echo "Table application created successfully";
                                      echo "<br>";
                                      echo "<br>";
                                    }
                                    else
                                    {
                                      echo "Error creating table:" . mysqli_error($con);
                                      echo "<br>";
                                      echo "<br>";
                                    }


                                            }



                                            ?>