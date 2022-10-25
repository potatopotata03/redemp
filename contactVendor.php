<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Contact Us Page</title>
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

    /*Content*/
	.container{
		min-height: 85vh;
		display: flex;
		align-items: center;
		justify-content: center;
		padding: 20px;
		padding-bottom: 60px;
		background: lightblue;
	}

	.container .content{
		justify-content: center;
		margin: 20px;
	}

	.container .content h3{
		font-size: 40px;
		color: #333;
	}

	.container .content h3 span{
		background: crimson;
		color: #fff;
		border-radius: 5px;
		padding: 0 15px;
	}


	.container .content h1{
		font-size: 50px;
		color: #333;
	}

    .container .content h1 span{
		background: crimson;
	}

    .container .content p{
		font-size: 20px;
		margin-top: 10px;
		margin-bottom: 20px;
		margin-right: 40%;
	}

	.container .content .desc{
		background: crimson;
		color: #fff;
		border-radius: 5px;
		padding: 8px 15px;
		font-size: 20px;
		margin-left: 5px;
	}
	.container .content .btn{
		display: inline-block;
		padding: 10px 30px;
		font-size: 20px;
		background: #333;
		color: #fff;
		margin: 0 5px;
		text-transform: capitalize;
		border-radius: 10px;

	}

	.container .content .btn:hover{
		background: crimson;
	}

	 /*Footer*/
    footer{
        background-color: skyblue;
        font-family: 'Poppins', sans-serif;
        padding: 7px;
        text-align: center;
    }


	   /*Media*/
	@media(max-width: 850px){
	 	.container .content .btn {
	 		margin: 10px;
	 	}

	 	.container .content h1{
		font-size: 40px;
		color: #333;
	    }

	    .header .flex nav a{
		margin: 0.7rem;
		font-size: 1rem;
		color: black;
	    }

	    .container .content p{
		font-size: 20px;
		margin-top: 10px;
		margin-bottom: 20px;
		margin-right: 20%;
	}

</style>

</head>

<body>
<header class="header">
	<div class="flex">
		<a href="home.php" id="logo">FREEBIES</a>
		<nav>
<nav>
			<a href="vendorHome.php">Home</a>
			<a href="addItem.php">Products</a>
			<a href="vendorRequest.php">Requests</a>
			<a href="contactVendor.php">Contact Us</a>
			<a href="vendorDetail.php">Profile</a>
			<a href="logoutConfirmVendor.php">Logout</a>
		</nav>

	</div>
</header>

<div class="container">
	<div class="content">
	<h3>Contact <span>Us</span></h3>
	<p>Feel free to contact us if you have any enquiries, questions or feedbacks regarding our website and services.</p>
	<p class="btn">Email</p><span class="desc">freebies@gmail.com</span><br><br>
	<p class="btn">Facebook</p><span class="desc">Freebies@2022</span><br><br>
     <p class="btn">Instagram</p><span class="desc">Freebies@2022</span>
    </div>
</div>

<!-- Footer -->
<footer>
    <p>&copy Freebies 2022</p>
</footer>


</body>
</html>
