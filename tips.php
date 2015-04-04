<html><head><title>Pro-Tip</title>  <link rel="stylesheet" type="text/css" href="http://bootswatch.com/darkly/bootstrap.min.css"></head><body>
<?php
$con=mysqli_connect("localhost","root","Sandman","test");
// Check connection
if (mysqli_connect_errno()) {
  echo "Uh-Oh, we can't find the tip you're looking for... If you're connected to the internet send us a bug report!" . mysqli_connect_error();
}

$post_id = mysqli_real_escape_string($con, $_GET['id']);

$result = mysqli_query($con,"SELECT * FROM Tips
WHERE id='$post_id'");
while($row = mysqli_fetch_array($result)) {


echo"<div class=\"panel panel-primary\">
  <div class=\"panel-heading\">
    <h3 class=\"panel-title\">". $row['tip'] ."</h3>
  </div>
  <div class=\"panel-body\"><h2><a href=tiplist.php?location=".$row['location'].">".$row['location']. "</a></h2>". $row['description'] ."
  </div>
</div>";
}

echo"<a href='https://twitter.com/share' class='twitter-share-button' data-text='Added a Tip on @Pro-TipApp' data-via='MohnJoosemiller'>Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>";

mysqli_close($con);
?>
</body></html>
