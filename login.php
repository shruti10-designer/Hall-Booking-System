<?php

session_start();

	$user=$_POST['email'];
    $pass=$_POST['pass'];
  //  $typeofacc=$_POST['typeofacc'];
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


$sql="SELECT * FROM user WHERE email='$user'";

$result=$con->query($sql);

    $row = $result->fetch_assoc();
	$dbusername=$row['email'];  
    $dbpassword=$row['user_pass'];  
	$isAdmin = $row['is_admin'];  
      if($dbpassword == $pass)
      {
		   echo "<script type='text/javascript'>
			// alert('in if loop');
   
			</script>";
        $_SESSION['user']=$user;
        $msg="success";
	//	if($isAdmin == 1) {
	//		 $loc="admin.php";
	//	} else {
			$loc="index.html";
	//	}
        echo "<script type='text/javascript'>
        alert('$msg');
		
        window.location.href='$loc';
        </script>";
      }
    
	else 
	{
    $msg="invalid password";
    $loc="login.html";
    echo "<script type='text/javascript'>
    alert('$msg');
    window.location.href='$loc';
    </script>";
	}
  

      $con->close();
?>