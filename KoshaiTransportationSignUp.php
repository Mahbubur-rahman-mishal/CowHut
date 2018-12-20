<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<meta name="description" content="Responsive layout">
	<meta name="keyword" content="web design, Responsive layout">
	<meta name="author" content="mishal">
	<title>Register (Koshai/Transporter)</title>
	<link rel="stylesheet" type="text/css" href="./css/style.css">
</head>
<body>
	<div class="container">
		<header>
				<div id="branding">
					<img src="./img/logo.png">
				</div>
				<nav>
					<ul>
						<li><a href="index.html">Login</a></li>
					</ul>
				</nav>
			
		</header>
	</div>

	<div class="container">
		<section id="newsletter1">
			
			<div class="wrapper">
				<div id="wrapperHighligter">
					<h2><a href="index.html">Home</a></h2>
				</div>
				<div>
					<h2><a href="Koshai.html">Koshai/Transporter</a></h2>
				</div>
			</div>
			
		</section>
	</div>

	<div class="container">
 		<div class="signUp">
 			<div id="signUpForm">
 				<h2 id="">Register</h2>

 				<form name="myForm" action="" method="post" enctype="multipart/form-data">

 					<input type="radio" name="type" value="koshai"> Koshai
 					<input type="radio" name="type" value="transporter"> Transporter
 					<table>
 						<tr>
 							<td>Name</td>
 							<td><input type="text" name="name" onblur="checkName(this.value)"></td>
 						</tr>
 						<tr>
 							<td>Date of Birth</td>
 							<td><input type="date" name="birth_date" onblur="checkDate(this.value)"></td>
 						</tr>
 						<tr>
 							<td>Location</td>
	 							<td><select name="location_id" onblur="checkLocation(this.value)">
	    						<option value="1">Badda Thana</option>
	    						<option value="2">Uttara Thana</option>
								<option value="3">Cantonment Thana</option>
								<option value="4">Demra Thana</option>
								<option value="5">Dhamrai Upazila</option>
								<option value="6">Dhanmondi Thana</option>
								<option value="7">Dohar Upazila</option>
								<option value="8">Gulshan Thana</option>
								<option value="9">Kafrul Thana</option>
								<option value="10">Kamrangir Char Thana</option>
								<option value="11">Keraniganj Upazila</option>
								<option value="12">Khilgaon Thana</option>
								<option value="13">Kotwali Thana</option>
								<option value="14">Lalbagh Thana</option>
								<option value="15">Mirpur Thana</option>
								<option value="16">Mohammadpur Thana</option>
								<option value="17">Motijheel Thana</option>
								<option value="18">Nawabganj Upazila</option>
								<option value="19">Pallabi Thana</option>
								<option value="20">Ramna Thana</option>
								<option value="21">Sabujbagh Thana</option>
								<option value="22">Savar Upazila</option>
								<option value="23">Shyampur Thana</option>
								<option value="24">Sutrapur Thana</option>
								<option value="25">Tejgaon Thana</option>
	  						</select></td>
 						</tr>
 						<tr>
 							<td>Email</td>
 							<td><input type="email" name="email" onblur="checkEmail(this.value)"></td>
 						</tr>
 						<tr>
 							<td>Phone</td>
 							<td><input type="number" name="phone_number" onblur="checkPhone(this.value)"></td>
 						</tr>
 						<tr>
 							<td>Password</td>
 							<td><input type="password" name="password" onblur="checkPass(this.value)"></td>
 						</tr>
 						<tr>
 							<td>Confirm Password</td>
 							<td><input type="password" name="confirm_password" onblur="checkConfirmPass(this.value)"></td>
 						</tr>
 						<tr>
 							<td>Upload Picture</td>
 							<td><input type="file" name="image" id="fileToUpload"></td>
 						</tr>
 						<tr>
 							<td></td>
 							<td><input type="submit" name="submit" value="Submit"></td>
 						</tr>
 					</table>
 				</form>
 			</div>
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
	require 'database.php';
	if (isset($_POST['submit'])) {
		$type = $_POST["type"];
		$name = $_POST["name"];
		$birth_date = $_POST["birth_date"];
		$location_id = $_POST["location_id"];
		$email = $_POST["email"];
		$phone_number = $_POST["phone_number"];
		$password = $_POST["password"];
		$confirm_password = $_POST["confirm_password"];
	
		if(getimagesize($_FILES["image"]["tmp_name"]) !== false){
    		$image = addslashes($_FILES['image']['tmp_name']);
    		$image = file_get_contents($image);
    		$image = base64_encode($image);
			if ($type === "koshai") {
				$query = "INSERT INTO koshai_info (`name`, `birth_date`, `location_id`, `email`, `phone_number`, `password`, `image`) VALUES (\"$name\", \"$birth_date\", $location_id, \"$email\", $phone_number, \"$password\", \"$image\")";
				$db = connect();
				mysqli_query($db, $query);
				mysqli_close($db);//closing the connection
				//header("Location:index.php");
			} else{
				$query = "INSERT INTO transporter_info (`name`, `birth_date`, `location_id`, `email`, `phone_number`, `password`, `image`) VALUES (\"$name\", \"$birth_date\", $location_id, \"$email\", $phone_number, \"$password\", \"$image\")";
				$db = connect();
				mysqli_query($db, $query);
				mysqli_close($db);
			}
		}else{
    		echo "Please select an image!";
    	}
    	header("Location: index.php");
	}

/*
	//retrieve image from database
	$query2 = "SELECT * FROM ".$type."_info WHERE name='$name'";
	$db = connect();

	$output = mysqli_query($db, $query2);

	if (mysqli_num_rows($output)==1) {
		while ($result = mysqli_fetch_array($output)) {
			//header("Content-type: image/jpg");
			echo " ".$result['name'];
			echo '<img height="200" width="200" src="data:image;base64,'.$result[7].' "> ';
			//$id = $result[0];
			//session_start();
			//$_SESSION['id'] = 1;
			//header("Location: addnews.php");
			exit;
		}
	}else
		echo "Not matched!";*/
?>

<script type="text/javascript">
	
	var radio = document.myForm.type;
	if (!(radio[0].checked) && !(radio[1].checked)) {
		alert("Selecting type is MANDATORY!");
	}

	function checkName(name) {
		// body...
		if(name.length == 0){
			alert("Name can't be empty!");
		}
	}

	function checkEmail(email) {
		// body...
		if(email.length == 0){
			alert("Email can't be empty!");
		}
	}

	function checkPhone(num) {
		// body...
		if(num.length == 0 || num.length>11){
			alert("Phone number can't be empty or more than 11 digits!");
		}
	}

	function checkDate(date) {
		if (date.length == 0 || date[1] == 0) {
		 	alert("Please insert a valid date!");
		}
		//alert(name);
	}

	function checkPass(no){
		if(!(no.length>4 && no.length<30)){
			alert("Password should be more than 4 and less than 30 characters!");
		}
	}

	function checkConfirmPass(no){
		var pass = document.myForm.pass.value;
		if(!(pass === no)){
			alert("Password doesn't match!");
		}
	}

</script>