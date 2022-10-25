
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Request Item</title>
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

  #cancel{
    width: 100%;
    padding: 10px 204px;
    font-size: 15px;
    margin: 8px 0;
    margin-bottom: 20px;
    border-radius: 5px;
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
$con = mysqli_connect("localhost", "root", "", "redempsystem");

if(mysqli_connect_errno()) {
  echo "Could not connect to server!". mysqli_connect_error();
}
session_start();
$custUser = $_SESSION['custUser'];
$query = mysqli_query($con, "SELECT * FROM customer WHERE custUser = '$custUser'");
while($row = mysqli_fetch_array($query))
{
  $custUser= $row['custUser'];
  $custFirstName = $row['custFirstName'];
  $custLastName = $row['custLastName'];
}

$query2 = mysqli_query($con, "SELECT * FROM address WHERE custUser = '$custUser'");
while($row = mysqli_fetch_array($query2))
{
  $address1= $row['address1'];
  $postcode = $row['postcode'];
  $city = $row['city'];
  $country = $row['country'];
}

$itemID = $_GET['itemID'];

$result = mysqli_query($con, "SELECT * FROM item WHERE itemID = '$itemID'");
while($res = mysqli_fetch_array($result))
{
  $itemID = $res['itemID'];
  $vendorUser = $res['vendorUser'];
}
?>

<body>

<section>
  <div class="form-container">
    <form action="custRequest.php" method="POST">
      <h2>Request For A Sample</h2><br>
      <p>Please insert your details</p><br>
      <input type = "hidden" name = "reqID" value = "<?php echo $reqID; ?>">
      <label>Date Request: </label>
      <input type="text" name="dateRequest" placeholder="YYYY-MM-DD" required><br>
      <label>Username: </label>
      <input type="text" name="custUser" value="<?php echo $custUser;?>" required><br>
      <label>First Name: </label>
      <input type="text" name="custFirstName" value="<?php echo $custFirstName;?>" required><br>
      <label>Last Name: </label>
      <input type="text" name="custLastName" value="<?php echo $custLastName;?>" required><br>
      <label>Contact Number: </label>
      <input type="text" name="contactNum" required><br>
      <label>Address Line 1: </label>
      <input type="text" name="address" value="<?php echo $address1;?>" required><br>
      <label>Postcode: </label>
      <input type="text" name="postcode" value="<?php echo $postcode;?>"required><br>
      <label>City: </label>
      <input type="text" name="city" value="<?php echo $city;?>"required><br>
      <label>Country: </label>
      <input type="text" name="country" value="<?php echo $country;?>"required><br>
      <label>Item No: </label>
      <?php echo $itemID ?>
      <input type="hidden" name="itemID" required value="<?php echo $itemID ?>"><br><br>
      <label>Vendor Name: </label>
      <?php echo $vendorUser ?>
      <input type="hidden" name="vendorUser" required value="<?php echo $vendorUser?>"><br>
      <input type="submit" value="Request Item" class="form-btn" name="conRequest"><a href="custRequest.php" name="request"></a>
      <a href="customerExplore.php" class="form-btn" id="cancel">Cancel</a>
    </form>
  </div>
</section>
</body>
</html>
