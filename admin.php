<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Admin</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <div id="cont">
        
        <div id="main">
            <div id="head">
                
            </div>
            <div id="con">               
                    <h1 style="font-size:40px">View Staff</h1>
                    <br><br>
                    <table class="center">
                    <tr>
                        <th style="font-size:18px">Sl No</th>
                        <th style="font-size:18px">Name</th>
                        <th style="font-size:18px">Email</th>
                        <th style="font-size:18px">Phone Number</th>
                        <th style="font-size:18px">Hall</th>
                        <th style="font-size:18px">Booked Date</th>
                        <th style="font-size:18px">Status</th>
                        <th style="font-size:18px">Action</th>
                       

                    </tr>
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
                  
                    $sql="SELECT * FROM boooking_details WHERE VOIDED =0";
                    $result=$con->query($sql);
                   
                   

                    $i=1;
                    if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
					 
                      echo "<tr style='font-size: 18px;'>
					  <input type="hidden" id="dist_'.$iid.'" value=".$row['booking_id'].">
                      <td>$i</td>
                      <td>" . $row['name']. "</td>
                      <td>" . $row['email']. "</td>
                      <td>" . $row['phone_number']. "</td>
                      <td>" . $row["hall_name"]. "</td>
                      <td>" . $row["event_date"]. "</td>
                      <td>" . $row["booked_status"]. "</td>
                      <td>" . '<i class="material-icons" onclick="Remove()">delete</i>'. "</td>
                     
                      </tr>
                      ";
                      $i++;
                    }
                    } else {
                    echo "0 results";
                    }

                    $con->close();
                    ?>
                    
                </table>
            </div>
        </div>
    </div>

  <script>
function Remove() {
</body>
</html>