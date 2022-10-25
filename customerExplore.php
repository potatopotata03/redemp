<!DOCTYPE html>
<html>
<head><title>Products</title></head>
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
table, th, td {
  border:1px solid black;
  padding: 10px;
}
</style>
</head>
<body>
  <header class="header">
  <div class="flex">
    <a href="home.php" id="logo">FREEBIES</a>
    <nav>
      <a href="customerHome.php">Home</a>
      <a href="customerExplore.php">Products</a>
      <a href="custRequest.php">Requests</a>
      <a href="contactCust.php">Contact</a>
      <a href="custDetails.php">Profile</a>
      <a href="logoutConfirmCust.php">Logout</a>
    </nav>

  </div>
</header>
<div>

<h2>Products</h2>

<body>
<?php
$servername="localhost";
$username="root";
$password="";
$dbname="redempsystem";

$con = mysqli_connect($servername, $username, $password, $dbname);

if(mysqli_connect_errno()) {
  echo "Could not connect to server!". mysqli_connect_error();
}

$sql= "SELECT * FROM item";
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
   echo "<table><tr><th>No.:</th><th>Item Name:</th><th>Item Description:</th><th>Vendor Name:</th><th>Action</th></tr>";
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
     echo "<tr><td>" . $row["itemID"]. "</td><td>" . $row["itemName"]. "</td><td>" . $row["itemDesc"]. "</td><td>" . $row["vendorUser"]. "</td><td>"?><a href="confirmRequest.php?itemID=<?php echo $row['itemID'];?>">Request Item</a><?php "</td></tr>";
  }
     echo "</table>";
}else {
   echo "0 results";
}


$con->close();
?>


</body>
</html>
