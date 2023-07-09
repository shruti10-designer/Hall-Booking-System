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
    
    $fullname = $_POST['fullname'];
    $phoneno = $_POST['phoneno'];
    $email = $_POST['email'];
    $hall = $_POST['selectedHall'];
    $clubName = $_POST['clubName'];
    $eventDate = $_POST['eventdate'];
    $eventDtls = $_POST['eventDtls'];
    $uidate = date("Y-m-d\Th:i:s", strtotime($eventDate));
	$currentDt = date("Y-m-d\Th:i:s");
	
   
  if($uidate < $currentDt) {
	   echo "<script type='text/javascript'>
      alert('Please select valid date');
	  window.location.href='bookhall1.html';
	  </script>";
  } else {
$sql="SELECT * FROM boooking_details WHERE hall_name='$hall' AND voided=0; ";

$result=$con->query($sql);

   
	$hallbooked = false;
	if($result->num_rows > 0)
	{
    //output data of each row
    //create an array
    $rows = array();
    //fill that array
		
    while($row = $result->fetch_assoc())
    {
		$dbhall=$row['hall_name'];  
    $dbbookingstatus=$row['booked_status'];  
	$dbeventdate=$row['event_date']; 
	$dbdate = date("Y-m-d\TH:i:s", strtotime($dbeventdate));

	
	
       if($dbbookingstatus == 'BOOKED' && $uidate == $dbdate)
      {
	//	  echo "<script type='text/javascript'>
    //  alert('matched, hall booked');
	//  </script>";
		  $hallbooked = true;
		  break;
	  }
    }
}
	
	if($hallbooked == true) {
    echo "<script type='text/javascript'>
			alert('Hall already booked!');
	
	  
			window.location.href='bookhall1.html';
      </script>";
	} else {
	
		   $sql="INSERT INTO boooking_details (name ,email ,phone_number,event_date,event_details,club_name,hall_name,booked_status ) 
		VALUES ('$fullname', '$email','$phoneno','$uidate','$eventDtls','$clubName','$hall','BOOKED');";
		$con->query($sql);
		$last_id = $con->insert_id;
		$msg='Success id = '.$last_id;
		  $con->close();
		   
		   $loc="psuccess.html";
      echo "<script type='text/javascript'>
      alert('$msg');
      window.location.href='$loc';
      </script>";
	}
  }
     
?>