<!DOCTYPE html>
<html>
<head>
<title>Update Customer</title>

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
        $custUser = $_POST['custUser'];
        $custFirstName = $_POST['custFirstName'];
        $custLastName = $_POST['custLastName'];
        $custEmail = $_POST['custEmail'];
        $address1 = $_POST['address1'];
        $postcode = $_POST['postcode'];
        $city = $_POST['city'];
        $country = $_POST['country'];

	$result1=mysqli_query($con, "UPDATE customer SET
                      custFirstName = '$custFirstName',
                      custLastName = '$custLastName',
                      custEmail = '$custEmail'
                      WHERE custUser = '$custUser'");

  $result2=mysqli_query($con, "UPDATE address SET
                      address1 = '$address1',
                      postcode = '$postcode',
                      city = '$city',
                      country = '$country'
                      WHERE custUser = '$custUser'");


  echo "<script>alert('Record updated successfully');window.location='CustDetails.php'</script>";
}

?>
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
<div class="form-container">

<form action="" method="POST">
<h2>Update Info</h2>

<?php
$custUser = $_GET['custUser'];

$result = mysqli_query($con, "SELECT * FROM customer WHERE custUser = '$custUser'");
while($res = mysqli_fetch_array($result))
{
  $custUser = $res['custUser'];
  $custFirstName = $res['custFirstName'];
  $custLastName = $res['custLastName'];
  $custEmail = $res['custEmail'];

}

$result1 = mysqli_query($con, "SELECT * FROM address WHERE custUser = '$custUser'");
while($res = mysqli_fetch_array($result1))
{
  $address1 = $res['address1'];
  $postcode = $res['postcode'];
  $city = $res['city'];
  $country = $res['country'];

}
?>


<form id="customer" name = "customer" action = "" method = "POST" required>

<label for="custUser">Username: </label>
<input type = "hidden" id = "custUser" name = "custUser" value = "<?php echo $_GET['custUser'];?>">
<?php echo $custUser;?><br><br>

<label for="custFirstName">First Name: </label>
<input type="text" id = "custFirstName" name = "custFirstName" value="<?php echo $custFirstName;?>" maxlength = "20" required>

<label for="custLastName">Last Name: </label>
<input type="text" id = "custLastName" name = "custLastName" value="<?php echo $custLastName;?>" maxlength = "20" required><br><br>

<label for="custEmail">Email: </label>
<input type="text" id = "custEmail" name = "custEmail" value="<?php echo $custEmail;?>" required><br><br>

<label for="address1">Address: </label>
<input type="text" id = "address1" name = "address1" value="<?php echo $address1;?>" required><br><br>

<label for="city">City: </label>
<input type="text" id = "city" name = "city" value="<?php echo $city;?>" required><br><br>

<label for="postcode">Postcode: </label>
<input type="text" id = "postcode" name = "postcode" maxlength='5'size="7" value="<?php echo $postcode;?>"
onkeypress='return event.charCode >= 48 && event.charCode <= 57' required autofocus><br><br>

<label for="country">Country: </label>
<input type="text" id = "country" name = "country" value="<?php echo $country;?>" required><br><br>

<input type="submit" name="update" value= "update data" class="form-btn">
<br>
</div>
</form>
</body>


</html>
