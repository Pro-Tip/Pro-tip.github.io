<html>
<head>
  <link rel="stylesheet" type="text/css" href="http://bootswatch.com/darkly/bootstrap.min.css">
<style>
body {
  width:100vw;
  padding: 2% 10%;
}

</style>
</head>
<body>

<?php
$con=mysqli_connect("localhost","root","foo","test");
// Check connection
if (mysqli_connect_errno()) {
  echo "Uh-Oh, we can't find tips right now... If you're connected to the internet send us a bug report!" . mysqli_connect_error();
}

$location_id = mysqli_real_escape_string($con, $_GET['location']);
$result = mysqli_query($con,"SELECT * FROM Tips WHERE location='$location_id'");
echo "<table class=\"table-striped table-hover\" width=100%>
<tr>
<th font-size=36px>Tips</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
  echo"<tr>";
  echo"<td><a href=tips.php?id=".$row['id'].">" . $row['tip']."</a>" . "</td>";
  echo"</tr>";
}
echo "</table>";
mysqli_close($con);
?>







</body>
</html>
