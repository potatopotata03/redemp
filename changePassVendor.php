<?php
$con = mysqli_connect("localhost", "root", "", "redempsystem");

if(mysqli_connect_errno()) {
  echo "Could not connect to server!". mysqli_connect_error();
}

if(isset($_POST['update'])) {
  $vendorUser = trim($_POST['vendorUser']);
  $vendorPass = $_POST['vendorPass'];

  $result = mysqli_query($con, "UPDATE vendor SET vendorPass = '$vendorPass' WHERE vendorUser = '$vendorUser'");
  echo "UPDATE vendor SET vendorPass = '$custPass' WHERE custUser = '$custUser'";
  echo "<script>alert('Password has been updated'); window.location = 'loginVendor.php'</script>";
  }
?>

<?php
$vendorUser = $_GET['vendorUser'];

$result = mysqli_query($con, "SELECT * FROM vendor WHERE vendorUser = '$vendorUser'");
while($res = mysqli_fetch_array($result))
{
  $vendorUser = $res['vendorUser'];
  $vendorPass = $res['vendorPass'];
}
?>

<html><html>
<head>
      <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
<title>Add Item</title>

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

  .form-container form input, textarea {
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
$con = mysqli_connect("localhost", "root", "", "redempsystem");

if(mysqli_connect_errno()) {
  echo "Could not connect to server!". mysqli_connect_error();
}

if(isset($_POST['update'])) {
  $vendorUser = trim($_POST['vendorUser']);
  $vendorPass = $_POST['vendorPass'];

  $result = mysqli_query($con, "UPDATE vendor SET vendorPass = '$vendorPass' WHERE vendorUser = '$vendorUser'");
  echo "UPDATE vendor SET vendorPass = '$custPass' WHERE custUser = '$custUser'";
  echo "<script>alert('Password has been updated'); window.location = 'loginVendor.php'</script>";
  }
?>

<?php
$vendorUser = $_GET['vendorUser'];

$result = mysqli_query($con, "SELECT * FROM vendor WHERE vendorUser = '$vendorUser'");
while($res = mysqli_fetch_array($result))
{
  $vendorUser = $res['vendorUser'];
  $vendorPass = $res['vendorPass'];
}
?>

<section>
  <div class="form-container">
<form name="form1" action="changePassVendor.php" method="POST">
<head><title>Change Password</title></head>
<form id="vendor" name = "vendor" method = "POST">

<h2>Change Password Vendor</h2>

<label for="vendorUser">Username: </label>
<?php echo $vendorUser;?>
<input type = "hidden" id = "vendorUser" name = "vendorUser" value = "<?php echo $_GET['vendorUser'];?>"><br>

<label for="vendorPass">Password: </label>
<input type="password" id = "vendorPass" name = "vendorPass" required><br><br>

<input type="submit" value="Change Password" id="submit" name="update" class="form-btn">

</form>
</div>
</section>
</html>
