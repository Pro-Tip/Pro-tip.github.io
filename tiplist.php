<html>
<body>

<?php
$con=mysqli_connect("localhost","root","Sandman1","test");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

if (!mysqli_query($con,$sql)) {
  die('Error: ' . mysqli_error($con));
}
echo "Thanks for the tip! <br>";

$result = mysqli_query($con,"SELECT * FROM tips1");
echo "<table border='0'>
<tr>
<th>Tip</th>
<th>Description</th>
<th>User</th>
<th>Location</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
  echo"<tr>";
  echo "<td>" . $row['tip'] . "</td>" . "<td>" . $row['description'] ."</td>" . "<td>" . $row['username'] . "</td>" . "<td>" . $row['location'] . "</td>";
  echo"</tr>";
}

mysqli_close($con);
?>










</body>
</html>