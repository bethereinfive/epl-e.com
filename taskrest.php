<?php
$mysqli = new mysqli("localhost","oxiahyal_epl","oxiahyal_epl","oxiahyal_epl");

// Check connection
if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}

$sql = "SELECT plan_id,id FROM `users`";

if ($result = $mysqli -> query($sql)) {
  while ($row = $result -> fetch_object()) {

    $user_id = $row->id;
    $plan = "SELECT totalorder FROM `plans` WHERE `id`='$row->plan_id'";

    $tasks = $mysqli -> query($plan);
    $planrow = $tasks -> fetch_assoc();
    $totalorder = $planrow['totalorder'];


   $sql = "UPDATE users SET task='$totalorder' WHERE id='$user_id'";
   if ($mysqli->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
      echo "Error updating record: " . $conn->error;
    }

    //   print_r($user_id);
  }
  $result -> free_result();
}



?>
