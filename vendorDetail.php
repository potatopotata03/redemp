<!DOCTYPE html>
<html>
<head><title>Vendor Details</title></head>
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
    margin: 0 1rem;
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

<h2>My Details</h2>
<?php
$servername="localhost";
$username="root";
$password="";
$dbname="redempsystem";

$con = mysqli_connect($servername, $username, $password, $dbname);

if(mysqli_connect_errno()) {
  echo "Could not connect to server!". mysqli_connect_error();
}
session_start();

If (isset($_POST['vendorUser'])) {
  $vendorUser = $_POST['vendorUser'];
  $vendorPass = $_POST['vendorPass'];

  $query = mysqli_query($con, "SELECT * FROM vendor WHERE vendorUser = '$vendorUser'
    AND vendorPass = '$vendorPass'");
  $row = mysqli_fetch_assoc($query);

  if (mysqli_num_rows($query) == 0 || $row['vendorPass']!= $vendorPass)
  {
   echo "<script>alert('Username or Password is wrong');
    window.location='vendorHome.php'</script>";
  }
  else {
    $_SESSION['vendorUser'] = $vendorUser;
    header("Location: vendorDetail.php");

  }
}
$vendorUser = $_SESSION['vendorUser'];

$sql= "SELECT * FROM vendor WHERE vendorUser = '$vendorUser'";
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_array($result)) {
  echo "Username: ". $row['vendorUser']."<br>";
  echo "First Name: ".$row['vendorFirstName']."<br>";
  echo "Last Name: ". $row['vendorLastName']."<br>";
  echo "Store Name: ".$row['vendorName']."<br>";
  echo "Email: ".$row['vendorEmail']."<br>";
  echo "Contact: ".$row['vendorContact']."<br>";
  echo "Social Tag: ".$row['socialTag']."<br><br><br>" ;
  ?>
<a href="updateVendor.php?vendorUser=<?php echo $row['vendorUser'];?>">Update My Details</a>
<?php  }
}else {
  echo "0 results";
}

?>


<br>
<br>
</html>
