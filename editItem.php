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
  $itemID = $_POST['itemID'];
  $itemName = $_POST['itemName'];
  $itemDesc = $_POST['itemDesc'];
  $vendorUser = $_POST['vendorUser'];

  $result = mysqli_query($con, "UPDATE item SET itemName = '$itemName', itemDesc = '$itemDesc'  WHERE itemID = '$itemID'");

  echo "<script>alert('Item has been updated'); window.location = 'itemVendor.php'</script>";
  }
?>

<?php
$itemID = $_GET['itemID'];

$result = mysqli_query($con, "SELECT * FROM item WHERE itemID = '$itemID'");
while($res = mysqli_fetch_array($result))
{
  $itemName = $res['itemName'];
  $itemDesc = $res['itemDesc'];
  $vendorUser = $res['vendorUser'];

}
?>


<section>
  <div class="form-container">
  <head><title>Add Item</title></head>
  <form id="customer" name = "customer" method = "POST">
<h2>Edit Item</h2>


<label for="itemName">Item Name: </label>
<input type="text" id = "itemName" name = "itemName" value="<?php echo $itemName;?>"><br><br>

<label for="itemDesc">Item Description: </label><br>
<textarea id = "itemDesc" name = "itemDesc" ><?php echo $itemDesc;?></textarea><br><br>

<label for="vendorUser">Username: </label>
<?php echo $vendorUser;?><br><br>

<input type = "hidden" id = "itemID" name = "itemID" value = "<?php echo $_GET['itemID'];?>">

<input type="submit" value="Edit Item" id="submit" name="update" class="form-btn">
<input type="reset" value="Reset Item" id="reset" name="reset" class="form-btn"><br><br>

<p><a href = "itemVendor.php">Back To Item</a></p>

</form>
</div>
</section>
</html>
