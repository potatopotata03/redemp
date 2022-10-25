<?php
$con = mysqli_connect("localhost", "root", "", "redempsystem");

if(mysqli_connect_errno()) {
  echo "Could not connect to server!". mysqli_connect_error();
}
session_start();
//to prevent bypass
if (!(isset($_SESSION['vendorUser'])))
{
session_destroy();
header ("location:loginVendor.php");
}


?>
<html>
<body>
<fieldset>
<?php include ("vendorHome.php"); ?>
</fieldset>
</body><br><br>

</html>
