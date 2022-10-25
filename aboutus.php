<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>About Us Page</title>
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

</style>

</head>

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

                    <!-- <div class="icons">
			<div id="menu-btn" class="nav-bar"></div>
			<div id="user-btn" class="nav_barUser"></div>
		</div> -->

	</div>
</header>

<div class="container">
	<div class="content">
	<h3>About <span>Us</span></h3>
	<p>Freebies is a sample redemption website which aims to help vendors to give away free samples to interested or targeted group and stay in touch with them to pursue them to purchase the real product. Freebies is also a platform in which customers would be able to browse and get free samples easily. If you are a vendor and wanted to find a platform to give away your free samples, you may feel free to join us and be a part of our vendors. If you are a customer who is interested with the product and would like to get free samples, register with us as a customer and you will be able to request for free samples by different vendors.</p>

    </div>
</div>

<!-- Footer -->
<footer>
    <p>&copy Freebies 2022</p>
</footer>


</body>
</html>
