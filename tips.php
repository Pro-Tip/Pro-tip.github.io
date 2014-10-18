<?php
$con=mysqli_connect("localhost","root","Sandman1","test");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
echo"<head>Pro-Tip</head>";
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

echo"<a href='https://twitter.com/share' class='twitter-share-button' data-text='Added a Tip on @Pro-TipApp' data-via='MohnJoosemiller'>Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>";

mysqli_close($con);
?>