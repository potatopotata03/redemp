<?php
$con = mysqli_connect("localhost", "root", "", "redempsystem");

if(mysqli_connect_errno()) {
  echo "Could not connect to server!". mysqli_connect_error();
}

$itemID = $_GET['itemID'];
$result = mysqli_query($con, "DELETE FROM item WHERE itemID ='$itemID'");

if(!$result) {
  echo "<script>alert('Unsuccessful to delete the item');
  window.location = 'itemVendor.php'</script>";
}
else {
echo "<script>alert('You have successfully delete the item');
window.location = 'itemVendor.php'</script>";
}
?>
