<?php
$con=mysqli_connect("localhost","root","Sandman","test");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// escape variables for security
$tip = mysqli_real_escape_string($con, $_POST['tip']);
$description = mysqli_real_escape_string($con, $_POST['description']);
$location = mysqli_real_escape_string($con, $_POST['location']);

$sql="INSERT INTO Tips (location, tip, description)
VALUES ('$location', '$tip', '$description')";

if (!mysqli_query($con,$sql)) {
  die('Error: ' . mysqli_error($con));
}
echo "<html><body><p>Thanks for the tip!</p> <br><br> <a href=\"index.html\">Go Home</a></body></html>";

mysqli_close($con);
?>
