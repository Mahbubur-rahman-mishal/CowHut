<?php 
	session_start();
	if(isset($_SESSION['id']) && isset($_SESSION['type'])){
		header("Location: LoggedInAsAdmin.php");
		
		exit();
	}
?>
<!DOCTYPE html>
<html>
<style>
#datatable {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

#datatable td, #datatable th {
    border: 1px solid #ddd;
    padding: 8px;
}

#datatable tr:nth-child(even){background-color: #f2f2f2;}

#datatable tr:hover {background-color: #ddd;}

#datatable th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #4CAF50;
    color: white;
}
</style>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<meta name="description" content="Responsive layout">
	<meta name="keyword" content="web design, Responsive layout">
	<meta name="author" content="mishal">
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="./css/style.css">
</head>
<?php 
	require 'database.php';
// mysqli_close($db);
		 
	
?>
<body>
	<div class="container">
		<header>
				<div id="branding">
					<img src="./img/logo.png">
				</div>
				<nav>
					<ul>
						<li><a href="signup.php">Sign Up</a></li>
					</ul>
				</nav>
			
		</header>
	</div>

	<div class="container">
		<section id="newsletter1">
			 	
				<div class="wrapper">
					<div>
						<h2><a href="LoggedInAsAdmin.php">Home</a></h2>
					</div>
					
				</div>
			
		</section>
	</div>

	<div class="container">
		<div>
			<table id="datatable" ">
				<h1 style="margin-left: 800px;">Sellers</h1>
				<tr>
					<td>Id</td>
					<td>Name</td>
					<td>Phone no.</td>
					<td>Email </td>
					<td>View</td>
					<td>Update</td>
					<td>Delete</td>
				</tr>
				<?php 
				$query = "SELECT * FROM seller_info ";
				$db = connect();
				$output = mysqli_query($db, $query);

				while ($result = mysqli_fetch_array($output)){
					//$_SESSION['id'] = $result[0];
					echo "<tr>";
					
					echo "
							<td>$result[0] </td>
	 					  	<td>$result[1] </td>
	 					  	<td>0$result[5]</td>
	 					  	<td>$result[4]</td>
	 					  	<td><a href='profileViewAdmin.php?id=$result[0]&type=seller'><button>View</button></a></td>
							<td><a href='updateAdmin.php?id=$result[0]&type=seller'><button>Update</button></a></td>
							<td><a href=><button>Delete</button></a></td>
	 					  	";
					echo "<tr>";

				}
				mysqli_close($db);
			?>
				
			</table>
		</div>
	</div>

	<div class="container">
		<footer>
			<p>By registering on CowHut.com, you accept our <a href="#">Terms of Use</a></p>
		</footer>
	</div>
</body>
</html>

<?php 
	//echo "string";
	
?>