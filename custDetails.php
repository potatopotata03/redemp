<!DOCTYPEhtml>
<html>
<head><title>Customer Details</title></head>
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

If (isset($_POST['custUser'])) {
  $custUser = $_POST['custUser'];
  $custPass = $_POST['custPass'];

  $query = mysqli_query($con, "SELECT * FROM customer WHERE custUser = '$custUser'
    AND custPass = '$custPass'");
  $row = mysqli_fetch_assoc($query);

  if (mysqli_num_rows($query) == 0 || $row['custPass']!= $custPass)
  {
    echo "<script>alert('Username or Password is wrong');
     window.location='loginCust.php'</script>";
  }
  else {
    $_SESSION['custUser'] = $custUser;
    header("Location: custDetails.php");
  }
}
$custUser = $_SESSION['custUser'];

$sql= "SELECT * FROM customer WHERE custUser = '$custUser'";
$result = mysqli_query($con,$sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
  echo "Username : ". $row['custUser']."<br>";
  echo "First Name : ".$row['custFirstName']."<br>";
  echo "Last Name : ". $row['custLastName']."<br>";
  echo "Email : ".$row['custEmail']."<br>";
}
}else {
  echo "0 results";
}
?>
<?php
$custUser = $_SESSION['custUser'];
$sql2= "SELECT * FROM address WHERE custUser = '$custUser'";
$result1 = mysqli_query($con,$sql2);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result1)) {

  echo "Address : ".$row['address1']."<br>";
  echo "City : ".$row['city']."<br>";
  echo "Postcode : ".$row['postcode']."<br>";
  echo "Country : ".$row['country']."<br><br><br>";
  ?>

<a href="updateCust.php?custUser=<?php echo $row['custUser'];?>">Update My Details</a>
<?php  }
}else {
  echo "0 results";
}

?>

</body>
</html>
