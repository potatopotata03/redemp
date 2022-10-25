<html>
<head>
      <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
<title>Register Customer</title>

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
/*    text-align: center;*/
    width: 500px;
  }

  .form-container form label{
    margin: 5px;
  }

  .form-container form h2{
    text-transform: uppercase;
    margin-bottom: 10px;
    color: #333;
    text-align: center;
  }

  .form-container form input,
  .form-container form select{
    width: 100%;
    padding: 10px 15px;
    font-size: 15px;
    margin: 8px 0;
    margin-bottom: 20px;
    background: #eee;
    border-radius: 5px;
  }

  .form-container form select option{
    background: #fff;
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
// connect databse
$con = mysqli_connect("localhost", "root", "", "redempsystem");

if(mysqli_connect_errno()) {
  echo "Could not connect to server!". mysqli_connect_error();
}
$data = $_POST;
if (isset($_POST['submit']) && isset($_POST['custUser'])) {
  if ( empty($data['custUser']) || empty($data['custFirstName']) || empty($data['custLastName']) ||
  empty($data['custPass']) || empty($data['retype']) || empty($data['custEmail']) || empty($data['address1'])
  || empty($data['postcode']) || empty($data['city']) || empty($data['country']) ) {

  die('Please fill all requred fields!');
  }

  $custUser = $_POST['custUser'];
  $custFirstName = $_POST['custFirstName'];
  $custLastName = $_POST['custLastName'];
  $custPass = $_POST['custPass'];
  $retype = $_POST['retype'];
  $custEmail = $_POST['custEmail'];
  $address1 = $_POST['address1'];
  $postcode = $_POST['postcode'];
  $city = $_POST['city'];
  $country = $_POST['country'];

  if ($data['custPass'] !== $data['retype']) {
   die('Password and Confirm password should match!');
 }

 if (!preg_match("#[A-Z]+#",$data['custPass'])) {
  die('Password should at least have 1 Capital Letter!');
}
 if (!preg_match("#[a-z]+#",$data['custPass'])) {
 die('Password should at least have 1 Lowercase Letter!');
}
if (!preg_match("#[0-9]+#",$data['custPass'])) {
die('Password should at least have at least 1 Number!');
}

  $sql = "SELECT * FROM customer WHERE custUser='$custUser'";
  $res = mysqli_query($con, $sql);
  if (mysqli_num_rows($res) > 0) {
    die('Username has been taken!');
  }

  else {


  $sql1 = "INSERT INTO customer (custUser, custFirstName, custLastName, custPass, custEmail, Status)
  VALUES ('$custUser', '$custFirstName', '$custLastName', '$custPass', '$custEmail', 'CUSTOMER')";
  $result = mysqli_query($con, $sql1);

  $sql2 = "INSERT INTO address (addressID, address1, postcode, city, country, custUser)
  VALUES (NULL, '$address1', '$postcode', '$city', '$country', '$custUser')";

  $result = mysqli_query($con, $sql2);

  if($result) {
    echo "<script> alert('Successful Registration');
    window.location='loginCust.php'</script>";
  }
  else {
    echo "<script> alert('Unuccessful Registration');
    window.location='registerCust.php'</script>";
  }
 }
}


?>

<body>
  <header class="header">
  <div class="flex">
    <a href="home.php" id="logo">FREEBIES</a>

    <nav>
      <a href="home.php">Home</a>
      <a href="aboutus.php">About Us</a>
      <a href="contact.php">Contact Us</a>
      <a href="register.php">Register</a>
      <a href="login.php">Login</a>
    </nav>

  </div>
</header>

<section>
  <div class="form-container">
<form id="customer" name = "customer" action = "registerCust.php" method = "POST">
<h2>Register as Customer</h2>

<label for="custUser">Username: </label>
<input type="text" id = "custUser" name = "custUser" required><br><br>

<label for="custFirstName">First Name: </label>
<input type="text" id = "custFirstName" name = "custFirstName" maxlength = "20">

<label for="custLastName">Last Name: </label>
<input type="text" id = "custLastName" name = "custLastName" maxlength = "20"><br><br>

<label for="custPass">Password: </label>
<input type="password" id = "custPass" name = "custPass" required>

<label for="retype">Re-type Password: </label>
<input type="password" id = "retype" name = "retype" required><br><br>

<label for="custEmail">Email: </label>
<input type="email" id = "custEmail" name = "custEmail" required><br><br>

<label for="address1">Address: </label>
<input type="text" id = "address1" name = "address1" required><br><br>

<label for="city">City: </label>
<input type="text" id = "city" name = "city" required><br><br>

<label for="postcode">Postcode: </label>
<input type="text" id = "postcode" name = "postcode" maxlength='5'size="7"
onkeypress='return event.charCode >= 48 && event.charCode <= 57' required autofocus><br><br>

<label for="country">Country: </label>
<input type="text" id = "country" name = "country" required><br><br>


<input type="submit" value="Register" id="submit" name="submit" class="form-btn">
<input type = "reset" value = "Reset" id = "reset" name = "reset" class="form-btn">
<br><br>

<p><a href="registerVendor.php">Register As A Vendor</a></p><br>
<p><a href="login.php">Have an Account Already?</p></a><br>


</form>
</div>
</section>
</body>
</html>
