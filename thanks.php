<?php
$con=mysqli_connect("localhost","root","Sandman1","test");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// escape variables for security
$name = mysqli_real_escape_string($con, $_POST['uname']);
$tip = mysqli_real_escape_string($con, $_POST['tip']);
$description = mysqli_real_escape_string($con, $_POST['description']);
$location = mysqli_real_escape_string($con, $_POST['location']);
$type = mysqli_real_escape_string($con, $_POST['type']);

$sql="INSERT INTO tips1 (username, tip, description, location, type)
VALUES ('$name', '$tip', '$description', '$location', '$type')";

$result = mysqli_real_query($con,"SELECT * FROM tips1 WHERE name='JohnM2'");

if (!mysqli_query($con,$sql)) {
  die('Error: ' . mysqli_error($con));
}
echo "Thanks for the tip! <br>";
while($row = mysqli_fetch_array($result)) {
    echo "Share your tip with <a href=tips.php?id=".$row['uname'].">this link</a>";
}


mysqli_close($con);
?>