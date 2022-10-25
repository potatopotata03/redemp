
<html>
<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
<head>
  <title>Login Customer</title>
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
    margin: 10px;
  }

  .form-container form h3{
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
<title>Login Customer</title>
</head>

<?php

$con = mysqli_connect("localhost", "root", "", "redempsystem");

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
    header("Location: customerHome.php");
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
    <form method="POST">
    <h3>Login as Customer</h3>
    <label for="custUser">Username</label><br>
    <input type="text" name="custUser" id = "custUser" placeholder="Alex123" required><br>
    <label for="custPass">Password</label><br>
    <input type="password" name="custPass" id="custPass" required><br>
    <input type="submit" value="Login" class="form-btn"><br>

    <p><a href="loginVendor.php">Need To Login as Vendor?</a></p>
    <p><a href="forgetCust.php">Forget Password?</a></p>
    </form>
</div>
</section>
</body>
</html>
