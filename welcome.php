<?php
$con=mysqli_connect("localhost","root","Sandman1","test");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// escape variables for security
$name = mysqli_real_escape_string($con, $_POST['name']);
$tip = mysqli_real_escape_string($con, $_POST['tip']);
$description = mysqli_real_escape_string($con, $_POST['description']);
$location = mysqli_real_escape_string($con, $_POST['location']);
$type = mysqli_real_escape_string($con, $_POST['type']);

$sql="INSERT INTO tips1 (username, tip, description, location, type)
VALUES ('$name', '$tip', '$description', '$location', '$type')";

if (!mysqli_query($con,$sql)) {
  die('Error: ' . mysqli_error($con));
}
echo "1 record added";

$result = mysqli_query($con,"SELECT * FROM tips1
WHERE type='$type'");

while($row = mysqli_fetch_array($result)) {
  echo $row['tip'] . " " . $row['description'] ." " . $row['name'] ." " . $row['location'];
  echo "<br>";
}

mysqli_close($con);
?>