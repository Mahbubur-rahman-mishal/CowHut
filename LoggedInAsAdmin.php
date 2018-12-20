<?php session_start() 
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<meta name="description" content="Responsive layout">
	<meta name="keyword" content="web design, Responsive layout">
	<meta name="author" content="mishal">
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="./css/style.css">
</head>


<body>
	<?php if(isset($_SESSION['id']))
	{

 ?>
	<div class="container">
		<header>
				<div id="branding">
					<img src="./img/logo.png">
				</div>
				<nav>
					<ul>
						<li><a href="index.php">Log Out</a></li>
					</ul>
				</nav>
			
		</header>
	</div>

	<!-- <section id="showcase">
		<div class="container">
			<h1>Afordable Professional Web Design</h1>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat.</p>
		</div>
	</section>
 -->
	<div class="container">
		<section id="newsletter">
			<h1 style="margin-left: 700px; text-shadow: black; font-size: 30px; padding: 0; ">Admin Main Page</h1>
		</section>

	</div>

 	<div class="container">
 		<div style="text-align: center;">
 			<a href="allsellers.php"><h1>All Sellers</h1></a>
 			<hr>
 			<a href="allbuyers.php"><h1>All Buyers</h1></a>
 			<hr>
 			<a href="allkoshais.php"><h1>All Koshai</h1></a>
 			<hr>
 			<a href="alltransporters.php"><h1>All Transporters</h1></a>
 			<hr>
 			<a href="AllCows.php"><h1>All Cow/Goat/camel</h1></a>
 		</div>
 	
	<!-- <div class="container"> -->
		<footer>
			<p>Sign Up as: Koshai | transport</p>
		</footer>
	</div>
	<?php 
	}else{
		header("location: LogInAdmin.php");
	} ?>
</body>
</html>


