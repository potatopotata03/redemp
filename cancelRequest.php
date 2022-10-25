<?php
$con = mysqli_connect("localhost", "root", "", "redempsystem");

if(mysqli_connect_errno()) {
  echo "Could not connect to server!". mysqli_connect_error();
}

// $custUser = $_GET['custUser'];
// $itemID = $_GET['itemID'];
$reqID = $_GET['reqID'];
$result = mysqli_query($con, "DELETE FROM request where reqID = '$reqID'");

if(!$result) {
  echo "<script>alert('Unsuccessful to cancel the request');
  window.location = 'custRequest.php'</script>";
}
else {
echo "<script>alert('You have successfully cancel the request');
window.location = 'custRequest.php'</script>";
}
?>
