<?php

    // Set connection variables
    $server = "localhost";
    $username = "root";
    $password = "";
    $db="hbs";

    // Create a database connection
    $con = mysqli_connect($server, $username, $password,$db);

    // Check for connection success
    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
    }
    
    $name = $_POST['name'];
    $pass = $_POST['pass'];
    $email = $_POST['email'];
 //   $mobile = $_POST['mobile'];
  //  $address = $_POST['address'];
 //   $city = $_POST['city'];
 //   $state = $_POST['state'];
  //  $pin = $_POST['pin'];

 
    $sql="INSERT INTO user (user_pass ,user_name ,email,is_admin ) VALUES ('$pass', '$name','$email',0);";
    $con->query($sql);
    $last_id = $con->insert_id;
    $msg='Success id = '.$last_id;
      $con->close();
 
    
      $loc="index.html";
      echo "<script type='text/javascript'>
      alert('$msg');
      window.location.href='$loc';
      </script>";
?>