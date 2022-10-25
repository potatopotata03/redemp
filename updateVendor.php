<!DOCTYPE html>
<html>
<head>
<title>Update Vendor</title>
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


  .form-container{
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 20px;
    padding-bottom: 60px;
    background: #eee;
  }

  .form-container form{
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 5px 10px rgba(0, 0, 0, .1);
    background: #fff;
    width: 500px;
  }

  .form-container form label{
    margin: 10px;
  }

  .form-container form h2{
    text-transform: uppercase;
    margin-bottom: 10px;
    color: #333;
    text-align: center;
  }

  .form-container form input{
    width: 100%;
    padding: 10px 15px;
    font-size: 15px;
    margin: 8px 0;
    margin-bottom: 20px;
    background: #eee;
    border-radius: 5px;
  }

  .form-container form .form-btn{
    background: #fbd0d9;
    color: crimson;
    text-transform: capitalize;
    font-size: 15px;
    cursor: pointer;
  }

  .form-container form .form-btn:hover{
    background: crimson;
    color: #fff;
  }

  .form-container form p{
    margin-top: 10px;
    font-size: 15px;
    color: #333;
      text-align: center;
  }

  .form-container form p a{
    color: crimson;
  }

  </style>
</head>
<?php

$servername="localhost";
$username="root";
$password="";
$dbname="redempsystem";

$con = mysqli_connect($servername, $username, $password, $dbname);
//$db = mysqli_select_db($con,'updateVen');

if(mysqli_connect_errno()) {
  echo "Could not connect to server!". mysqli_connect_error();
}


if(isset($_POST['update'])){
  $vendorUser = $_POST['vendorUser'];
  $vendorFirstName = $_POST['vendorFirstName'];
    $vendorLastName = $_POST['vendorLastName'];
  $vendorName = $_POST['vendorName'];
  $vendorEmail = $_POST['vendorEmail'];
  $vendorContact = $_POST['vendorContact'];
  $socialTag = $_POST['socialTag'];

  $result=mysqli_query(
  $con, "UPDATE vendor SET
      vendorFirstName = '$vendorFirstName',
    vendorLastName ='$vendorLastName',
    vendorName = '$vendorName',
    vendorEmail = '$vendorEmail',
    vendorContact = '$vendorContact',
    socialTag = '$socialTag'
    WHERE vendorUser='$vendorUser'");

    echo "<script>alert('Record updated successfully');window.location='vendorDetail.php'</script>";
}

?>
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
 <div class="form-container">

<form action="" method="POST">
<h2>Update Info</h2>
<?php
$vendorUser = $_GET['vendorUser'];

$result = mysqli_query($con, "SELECT * FROM vendor WHERE vendorUser = '$vendorUser'");
while($res = mysqli_fetch_array($result))
{

    $vendorUser=$res['vendorUser'];
  $vendorFirstName=$res['vendorFirstName'];
    $vendorLastName =$res['vendorLastName'];
  $vendorName=$res['vendorName'];
  $vendorEmail=$res['vendorEmail'];
  $vendorContact=$res['vendorContact'];
  $socialTag=$res['socialTag'];
}

?>

<form id="vendor" name = "vendor" action = "" method = "POST">

<label for="vendorUser">Username: </label>
<input type = "hidden" id = "vendorUser" name = "vendorUser" value = "<?php echo $_GET['vendorUser'];?>">
<?php echo $vendorUser;?><br><br>

<label for="vendorFirstName">First Name: </label>
<input type="text" id = "vendorFirstName" name = "vendorFirstName" value="<?php echo $vendorFirstName;?>" maxlength = "20" required>

<label for="vendorLastName">Last Name: </label>
<input type="text" id = "vendorLastName" name = "vendorLastName" value="<?php echo $vendorLastName;?>" maxlength = "20" required><br><br>

<label for="vendorEmail">Email: </label>
<input type="text" id = "vendorEmail" name = "vendorEmail" value="<?php echo $vendorEmail;?>" required><br><br>

<label for="socialTag">Social Tag: </label>
<input type="text" id = "socialTag" name = "socialTag" value="<?php echo $socialTag;?>" required><br><br>

<label for="vendorName">Store Name: </label>
<input type="text" id = "vendorName" name = "vendorName" value="<?php echo $vendorName;?>" required><br><br>

<label for="vendorContact">Contact: </label>
<input type="text" id = "vendorContact" name = "vendorContact" value="<?php echo $vendorContact;?>" required><br><br>

<input type="submit" name="update" value= "update data" class="form-btn">
<br>
</div>
</form>
</body>

</html>
