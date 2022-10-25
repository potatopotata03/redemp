<!DOCTYPE html>
<html>
<head>
  <title>Request Details</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <style type="text/css">
  *{
    font-family: 'Poppins', sans-serif;
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    outline: none;
    border: none;
    text-decoration: none;
  }

  div{
    margin: 30px;
  }

    div h2{
    padding-bottom:10px ;
  }

  /*Header*/
  .header{
    position: sticky;
    top: 0;
    left: 0;
    right: 0;
    z-index: 1000;
    background: white;
  }

  .header .flex{
    display: flex;
    align-items: center;
    padding: 1rem;
    justify-content: space-between;
    position: relative;
    max-width: 1200px;
    margin: 0 auto;
  }

  .header .flex #logo{
    font-size: 1.5rem;
    color: black;
  }

  .header .flex nav a{
    margin:1rem;
    font-size: 1rem;
    color: black;
  }

  .header .flex nav a:hover{
    color: crimson;
  }

  .btn{
    background: #fbd0d9;
    color: crimson;
    text-transform: capitalize;
    font-size: 15px;
    cursor: pointer;
    padding: 5px;
  }

  .btn:hover{
    background: crimson;
    color: #fff;
  }

  body{
    background: #eee;
  }


}

nav a{
  border: none;
}
</style>
</head>

<body>
  <header class="header">
  <div class="flex">
    <a href="home.php" id="logo">FREEBIES</a>

    <nav>
      <a href="vendorHome.php">Home</a>
      <a href="vendorExplore.php">Products</a>
      <a href="vendorRequest.php">Requests</a>
      <a href="contactVendor.php">Contact</a>
      <a href="vendorDetail.php">Profile</a>
      <a href="logoutConfirmVendor.php">Logout</a>
    </nav>
  </div>
</header>
<div>
<h2>Request Details</h2>
<?php
// $custUser = $_GET['custUser'];
$servername="localhost";
$username="root";
$password="";
$dbname="redempsystem";
$con = mysqli_connect($servername, $username, $password, $dbname);

session_start();
$vendorUser = $_SESSION['vendorUser'];
$query = mysqli_query($con, "SELECT * FROM vendor WHERE vendorUser = '$vendorUser'");

if(mysqli_connect_errno()) {
  echo "Could not connect to server!". mysqli_connect_error();
}
if(isset($_POST['conRequest'])){
   //$reqID = $_POST['reqID'];
   $dateRequest = $_POST['dateRequest'];
   $custUser = $_POST['custUser'];
   $custFirstName = $_POST['custFirstName'];
   $custLastName = $_POST['custLastName'];
   $contactNum = $_POST['contactNum'];
   $address = $_POST['address'];
   $postcode = $_POST['postcode'];
   $city= $_POST['city'];
   $country= $_POST['country'];
   $itemID = $_POST['itemID'];
   $vendorUser = $_POST['vendorUser'];
}

$sql= "SELECT * FROM request WHERE vendorUser = '$vendorUser'";
//var_dump($sql);
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
  echo "Request ID: ".$row['reqID']."<br>";
  echo "Request Date: ".$row['dateRequest']."<br>";
  echo "First Name: ".$row['custFirstName']."<br>";
  echo "Last Name: ". $row['custLastName']."<br>";
  echo "Contact Number: ". $row['contactNum']."<br>";
  echo "Address: ".$row['address1']."<br>";
  echo "Postcode: ".$row['postcode']."<br>";
  echo "City:" .$row['city']."<br>";
  echo "Country: ".$row['country']."<br>";
  echo "Item ID: ".$row['itemID']."<br>";
  echo "Vendor Name: ".$row['vendorUser']."<br>";

?>

<a href="cancelRequestVendor.php?reqID=<?php echo $row['reqID'];?>" class="btn">Cancel Customer's Request</a>
<br>
<br>
<br>
<?php
  }
}
else {
  echo " You have no request from customers";
}

$con->close();
?>

</div>
</body>
</html>
