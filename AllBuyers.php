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
	if (isset($_POST['submit'])) {
		$email = $_POST['email'];
		$password = $_POST['password'];
		

		$query2 = "SELECT * FROM admin_info WHERE email='$email' AND password='$password'";
		$db = connect();

		$output = mysqli_query($db, $query2);

		if (mysqli_num_rows($output)==1) {
			while ($result = mysqli_fetch_array($output)) {
				echo "Logged in as ".$result[1];
				//$id = $result[0];
				//session_start();
				$_SESSION['id'] = $result[0];
				header("Location: LoggedInAsAdmin.php");
				
				exit;
			}
		}else
			echo "Not matched!";
		mysqli_close($db);
		 
	}
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
						<h2 style="margin-left: 800px;"><a href="LoggedInAsAdmin.php">Home</a></h2>
					</div>
					
				</div>
			
		</section>
	</div>

	<div class="container">
		<div>
			<h1 align="center">Buyers</h1>
			<table id="datatable" ">
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
				$query = "SELECT * FROM buyer_info ";
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
	 					  	<td><a href='profileViewAdmin.php?id=$result[0]&type=buyer'><button>View</button></a></td>
							<td><a href='updateAdmin.php?id=$result[0]&type=buyer'><button>Update</button></a></td>
							<td><a href=><button>Delete</button></a></td>
	 					  	";
					echo "<tr>";
				}
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