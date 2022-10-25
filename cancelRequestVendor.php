<?php
$con = mysqli_connect("localhost", "root", "", "redempsystem");

if(mysqli_connect_errno()) {
  echo "Could not connect to server!". mysqli_connect_error();
}

$reqID = $_GET['reqID'];
$sql = "DELETE FROM request where reqID = '$reqID'";
$result = mysqli_query($con, $sql);

//var_dump($sql);

if(!$result) {
  echo "<script>alert('Unsuccessful to cancel the request');
  window.location = 'vendorRequest.php'</script>";
}
else {
echo "<script>alert('You have successfully cancel the request');
window.location = 'vendorRequest.php'</script>";
}
