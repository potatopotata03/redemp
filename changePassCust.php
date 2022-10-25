<html>
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
  $custUser = trim($_POST['custUser']);
  $custPass = $_POST['custPass'];
//echo "#".trim($custUser) ."#";
  $result = mysqli_query($con, "UPDATE customer SET custPass = '$custPass' WHERE custUser = '$custUser'");
  echo "UPDATE customer SET custPass = '$custPass' WHERE custUser = '$custUser'";
  echo "<script>alert('Password has been updated'); window.location = 'loginCust.php'</script>";
  }
?>

<?php
$custUser = $_GET['custUser'];

$result = mysqli_query($con, "SELECT * FROM customer WHERE custUser = '$custUser'");
while($res = mysqli_fetch_array($result))
{
  $custUser = $res['custUser'];
  $custPass = $res['custPass'];
}
?>

<section>
  <div class="form-container">
<form name="form1" action="changePassCust.php" method="POST">
<head><title>Change Password</title></head>
<form id="customer" name = "customer" method = "POST">

<h2>Change Password Customer</h2>

<label for="custUser">Username: </label>
<?php echo $custUser;?>
<input type = "hidden" id = "custUser" name = "custUser" value = "<?php echo $_GET['custUser'];?>"><br>

<label for="custPass">Password: </label>
<input type="password" id = "custPass" name = "custPass" required><br><br>

<input type="submit" value="Change Password" id="submit" name="update" class="form-btn">

</form>
</div>
</section>
</html>
