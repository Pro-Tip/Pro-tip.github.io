<?php
$con=mysqli_connect("localhost","root","Sandman1","test");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$post_id = mysqli_real_escape_string($con, $_GET['id']);

$result = mysqli_query($con,"SELECT * FROM tips1
WHERE id='$post_id'");
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