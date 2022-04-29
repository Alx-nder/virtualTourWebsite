<?php
	
$showAlert = false;
$showError = false;
$exists=false;
	
if($_SERVER["REQUEST_METHOD"] == "POST") {
	
    $con = mysqli_connect('localhost','root','');
    mysqli_select_db($con, 'virttour');

	
	$email = $_POST["email"];
	$password = $_POST["password"];
	$cpassword = $_POST["cpassword"];
			
	$sql = "Select * from users where email='$email'";
	$result = mysqli_query($con, $sql);
	
	$num = mysqli_num_rows($result);
	
	// This sql query is use to check if
	// the username is already present
	// or not in our Database
	if($num == 0) {
		if(($password == $cpassword) && $exists===false) {
		
			$sql = "INSERT INTO `users` ( `email`,`password`) VALUES ('$email','$password')";
			$result = mysqli_query($con, $sql);
			if ($result) {
				$showAlert = true;
			}
		}
		else {
			$showError = "Passwords do not match";
		}	
	}
	
	if($num>0)
	{
		$exists="Username not available";
	}	
}
	
?>
	
<!doctype html>
	
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="http://localhost/virtualTourWebsite/web/index/style.css">
    <title>Virtual tour</title>
</head>
	
<body class="video-container">
	
<video  autoplay muted loop poster="https://images.pexels.com/photos/1115804/pexels-photo-1115804.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940">
    <source type="video/mp4" src="https://assets.mixkit.co/videos/preview/mixkit-minimalist-room-with-gray-sofa-3110-large.mp4">
    <!-- pic credit https://images.pexels.com/photos/1115804/pexels-photo-1115804.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940 -->
    <!-- vid credit https://assets.mixkit.co/videos/preview/mixkit-minimalist-room-with-gray-sofa-3110-large.mp4 -->
    </video>

<?php	
	if($showAlert) {
		echo ' <div class="alert alert-success
			alert-dismissible fade show" role="alert">
	
			<strong>Success!</strong> Your account is
			now created and you can login.
			<button type="button" class="close"
				data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">X</span>
			</button>
		</div> ';
	}
	
	if($showError) {
	
		echo ' <div class="alert alert-danger
			alert-dismissible fade show" role="alert">
		<strong>Error!</strong> '. $showError.'
	
	<button type="button" class="close"
			data-dismiss="alert aria-label="Close">
			<span aria-hidden="true">X</span>
	</button>
	</div> ';
}
		
	if($exists) {
		echo ' <div class="alert alert-danger
			alert-dismissible fade show" role="alert">
	
		<strong>Error!</strong> '. $exists.'
		<button type="button" class="close"
			data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">×</span>
		</button>
	</div> ';
	}

?>
	
<div class="container my-4 ">
	
	<form action="signup.php"class="login_tag rounded text-center" method="post">
		<a href="http://localhost/virtualTourWebsite/web/index/listings.php"><img class="pb-1" srcset="http://localhost/virtualTourWebsite/web/images/logo.png 3x" alt=""></a>

		<h2 class="pb-2">Sign Up</h2>
	
		<div class="border-bottom mb-3">
			<input type="email" class="form-control  border-0  bg-transparent" name="email" aria-describedby="emailHelp" placeholder="Email" required>	
		</div>
	
		<div class="border-bottom mb-3 ">
			<input type="password" class="form-control  border-0 bg-transparent"  name="password" placeholder="Password" required>
		</div>
	
		<div class=" border-bottom mb-3">
			<input type="password" class="form-control  border-0 bg-transparent" name="cpassword" placeholder="Confirm Password" required>
		</div>	
	
		<button type="submit" class="btn btn-primary my-3">Sign Up</button>
		<div class="">
            <a class="text-dark" href="login.php">Or Log In here</a>  
        </div> 
	</form>
</div>

	
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>
