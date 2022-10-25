<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Home Page</title>
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
		text-align: center;
	}

	.container .content h3{
		font-size: 30px;
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

	</div>
</header>

<div class="container">
	<div class="content">
	<h3>Hi, <span>Guest</span></h3>
	<h1>Welcome To Freebies<span></span></h1>
	<p>Let's Get Started</p>
			<a href="aboutus.php" class="btn">About Us</a>
			<a href="contact.php" class="btn">Contact Us</a>
			<a href="register.php"class="btn">Register</a>
			<a href="login.php" class="btn">Login</a>
    </div>
</div>

<!-- Footer -->
<footer>
    <p>&copy Freebies 2022</p>
</footer>


</body>
</html>
