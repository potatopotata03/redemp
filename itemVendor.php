<html>
<head>
      <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
<title>Item</title>

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

    /*Header*/
  .header{
    position: sticky;
    top: 0;
    left: 0;
    right: 0;
    z-index: 1000;
    background: white;
  }
  div{
    margin: 30px;
  }

    div h2{
    padding-bottom:10px ;
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

  table, th, td{
    padding: 5px;
  }


  </style>
  </head>

<?php

$con = mysqli_connect("localhost", "root", "", "redempsystem");

if(mysqli_connect_errno()) {
  echo "Could not connect to server!". mysqli_connect_error();
}

if(isset($_SESSION['vendorUser'])) {
  echo "&nbsp&nbsp&nbsp&nbspYour session is running " . $_SESSION['vendorUser'];
}


?>
<header class="header">
<div class="flex">
  <a href="home.php" id="logo">FREEBIES</a>

  <nav>
    <a href="vendorHome.php">Home</a>
    <a href="vendorExplore.php">Products</a>
    <a href="vendorRequest.php">Requests</a>
    <a href="contactVendor.php">Contact Us</a>
    <a href="vendorDetail.php">Profile</a>
    <a href="logoutConfirmVendor.php">Logout</a>
  </nav>


</div>
</header>
<section>



<style>
table, td, th {
  border: 1px solid black;
}
</style>
</head>
<div class="form-container">
<table>
<tr>
  <h3>Item </h3><br>
  <td colspan="5">
  <a href = "addItem.php">[+] Add Item</a></td>
</tr>
<tr>
  <td width = "40">No.</td>
  <td width = "100">Item Name</td>
  <td width = "200">Item Description</td>
  <td width = "100">Vendor Name</td>
  <td width = "120">Action</td>
</tr>

<?php
session_start();
$vendorUser = $_SESSION['vendorUser'];
$data1 = mysqli_query($con, "SELECT * FROM item WHERE vendorUser = '$vendorUser'");
$no = 1;

while ($info1=mysqli_fetch_array($data1)) {
?>
<tr>
  <td><?php echo $info1['itemID']; ?></td>
  <td><?php echo $info1['itemName']; ?></td>
  <td><?php echo $info1['itemDesc']; ?></td>
  <td><?php echo $info1['vendorUser']; ?></td>

  <td><a href="editItem.php?itemID=<?php echo $info1['itemID'];?>">Edit Item</a> |
  <a href="deleteItem.php?itemID=<?php echo $info1['itemID'];?>">Delete Item</a>
  </td>

</tr>

<?php $no++; } ?>
</table><br>
<a href="vendorExplore.php" class="btn">Go Back</a>
</div>
<br>
</html>
