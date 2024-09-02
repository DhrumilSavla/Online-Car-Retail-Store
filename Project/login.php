<?php
$Username = $_POST['Username'];
$Password = $_POST['Password'];


//Database connection
$conn = new mysqli('localhost', 'root', '', 'wp_proj');
if ($conn->connect_error) {
  die('Connection Failed: ' . $conn->connect_error);
} else {
  $stmt = $conn->prepare("insert into users(Username,Password) values(?, ?)");
  $stmt->bind_param("ss", $Username, $Password);
  $stmt->execute();
  echo '<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Form</title>
 
  <link rel="stylesheet" href="home.css">
  <link rel="stylesheet" href="login.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

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
  <div class="wrapper">
    <form action="login.php" onsubmit="return formvalidator()" method="post">
      <h2>You have logged in successfully and now can return back to the home page</h2>
    </form>
  </div>
</body>
</html>';
  $stmt->close();
  $conn->close();

}
?>