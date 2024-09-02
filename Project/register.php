<?php
$FirstName = $_POST['firstName'];
$LastName = $_POST['lastName'];
$Email = $_POST['email'];
$Mobile = $_POST['mobile'];
$Password = $_POST['pass'];


$conn = new mysqli('localhost', 'root', '', 'wp_proj');
if ($conn->connect_error) {
    die('Connection Failed: ' . $conn->connect_error);
} else {
    $stmt = $conn->prepare("insert into register(FirstName,LastName,Email,Mobile,Password) values(?,?,?,?,?)");
    $stmt->bind_param("sssss", $FirstName, $LastName, $Email, $Mobile, $Password);
    $stmt->execute();
    echo '<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Form Contact Us</title>
	<link rel="stylesheet" href="contact.css">
	<link rel="stylesheet" href="home.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<link rel="stylesheet" href="contact.css">

<body>
	<header>

		<nav>
			<img src="img/car-logo.png" class="logo" alt="car_img">
	<div class="menu">
		<a href="home.html">Home</a>
		<a href="product.html">Showroom</a>
		<a href="Review.html">Review Us</a>
		<a href="loginpage.html">Login</a>
	
	
	</div>
			<div class="social">
				<a href="#"><i class="fa-brands fa-facebook-f"></i></a>
				<a href="#"><i class="fa-brands fa-twitter"></i></a>
				<a href="#"><i class="fa-brands fa-instagram"></i></a>
			</div>
		</nav>
	</header>
	<div class="container" style="background: url("img/wallpaperflare.com_wallpaper.jpg") no-repeat center center/cover;">
		<form action="register.php" onsubmit="return (formvalidator())" method="post" >
			<h1>Registered Successfully, You can now visit our website</h1>
            </form>
	</div>
	</body>
    </html>';
    $stmt->close();
    $conn->close();
}
?>