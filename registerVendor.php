<html>
<head>
  <title>Register Vendor</title>

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
$con = mysqli_connect("localhost", "root", "", "redempsystem");

if(mysqli_connect_errno()) {
  echo "Could not connect to server!". mysqli_connect_error();
}

$data = $_POST;
if (isset($_POST['submit']) && isset($_POST['vendorUser'])) {
  if ( empty($data['vendorUser']) || empty($data['vendorFirstName']) || empty($data['vendorLastName']) ||
  empty($data['vendorPass']) || empty($data['retype']) || empty($data['vendorName']) || empty($data['vendorEmail'])
  || empty($data['vendorContact']) || empty($data['socialTag'])) {

  die('Please fill all required fields!');
  }

  $vendorUser = $_POST['vendorUser'];
  $vendorFirstName = $_POST['vendorFirstName'];
  $vendorLastName = $_POST['vendorLastName'];
  $vendorPass = $_POST['vendorPass'];
  $retype = $_POST['retype'];
  $vendorName = $_POST['vendorName'];
  $vendorEmail = $_POST['vendorEmail'];
  $vendorContact = $_POST['vendorContact'];
  $socialTag = $_POST['socialTag'];

  if ($data['vendorPass'] !== $data['retype']) {
   die('Password and Confirm password should match!');
  }

  if (!preg_match("#[A-Z]+#",$data['vendorPass'])) {
   die('Password should at least have 1 Capital Letter!');
  }
  if (!preg_match("#[a-z]+#",$data['vendorPass'])) {
  die('Password should at least have 1 Lowercase Letter!');
  }
 if (!preg_match("#[0-9]+#",$data['vendorPass'])) {
 die('Password should at least have at least 1 Number!');
 }

  $sql = "SELECT * FROM vendor WHERE vendorUser='$vendorUser'";
  $res = mysqli_query($con, $sql);
  if (mysqli_num_rows($res) > 0) {
    die('Username has been taken!');
  }

  else {

  $sql1 = "INSERT INTO vendor (vendorUser, vendorFirstName, vendorLastName,
          vendorPass, vendorName, vendorEmail, vendorContact, socialTag, Status)
  VALUES ('$vendorUser', '$vendorFirstName', '$vendorLastName',
          '$vendorPass', '$vendorName', '$vendorEmail', '$vendorContact', '$socialTag', 'VENDOR')";

  $result = mysqli_query($con, $sql1);

  if($result) {
    echo "<script> alert('Successful Registration')
    window.location='loginVendor.php'</script>";
  }
  else {
    echo "<script> alert('Unsuccessful Registration')
    window.location='registerVendor.php'</script>";
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
<form id="vendor" name = "vendor" method = "POST">

<h2>Register as Vendor</h2>

<label for="vendorUser">Username: </label>
<input type="text" id = "vendorUser" name = "vendorUser" required><br><br>

<label for="vendorFirstName">First Name: </label>
<input type="text" id = "vendorFirstName" name = "vendorFirstName" maxlength = "20" required>

<label for="vendorLastName">Last Name: </label>
<input type="text" id = "vendorLastName" name = "vendorLastName" maxlength = "20" required><br><br>

<label for="vendorPass">Password: </label>
<input type="password" id = "vendorPass" name = "vendorPass"required>

<label for="retype">Re-type Password: </label>
<input type="password" id = "retype" name = "retype" required><br><br>

<label for="vendorEmail">Email: </label>
<input type="email" id = "vendorEmail" name = "vendorEmail" required><br><br>

<label for="socialTag">Social Tag: </label>
<input type="text" id = "socialTag" name = "socialTag" required><br><br>

<label for="vendorName">Store Name: </label>
<input type="text" id = "vendorName" name = "vendorName" required><br><br>

<label for="vendorContact">Contact: </label>
<input type="text" id = "vendorContact" name = "vendorContact" required><br><br>

<input type="submit" value="Register" id="submit" name="submit" class="form-btn">
<input type = "reset" value = "Reset" id = "reset" name = "reset" class="form-btn">
<br><br>
<p><a href="registerCust.php">Register As A Customer</a></p><br>
<p><a href="login.php">Have an Account Already?</a></p><br>

</form>
</body>
</html>
