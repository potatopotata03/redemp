<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Logout</title>
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
		background: lightblue;

	}

	.container{
		min-height: 50vh;
/*		display: flex;*/
		align-items: center;
		justify-content: center;
		padding: 20px;
		padding-bottom: 60px;
		background: #eee;
		margin: auto;
		margin-top: 150px;
	}

	.container {
		padding: 20px;
		border-radius: 5px;
		box-shadow: 0 5px 10px rgba(0, 0, 0, .1);
		background: #fff;
		text-align: center;
		width: 500px;
	}


	.container  h2{
		text-transform: uppercase;
		margin-bottom: 10px;
		margin-top: 20px;
		color: #333;
		text-align: center;
		background: white;
	}


	.container .btn{
		background: #fbd0d9;
		color: crimson;
		text-transform: capitalize;
		font-size: 15px;
		cursor: pointer;
		padding: 10px;
		margin: 10px;
	}

	.container .btn:hover{
		background: crimson;
		color: #fff;
	}

	.container p{
		margin-top: 10px;
		margin-bottom: 20px;
		font-size: 17px;
		color: #333;
	    text-align: center;
	    background: white;
	}

	.container p a{
		color: crimson;
	}

	</style>
</head>
<body>

	<div class="container">
			<h2>Logout</h2><br>
			<p>Are you sure you want to logout of your account?</p><br>
			<a href="logoutIndex.php" class="btn">Logout</a>
			<a href="vendorHome.php" class="btn">Cancel</a>
	</div>
</body>
</html>
