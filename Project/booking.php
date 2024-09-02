<?php
$FirstName = $_POST['firstName'];
$LastName = $_POST['lastName'];
$Email = $_POST['email'];
$Mobile = $_POST['mobile'];
$State = $_POST['state'];
$Address = $_POST['Address'];


$conn = new mysqli('localhost', 'root', '', 'wp_proj');
if ($conn->connect_error) {
    die('Connection Failed: ' . $conn->connect_error);
} else {
    $stmt = $conn->prepare("insert into booking(FirstName,LastName,Email,Mobile,State,Address) values(?,?,?,?,?,?)");
    $stmt->bind_param("ssssss", $FirstName, $LastName, $Email, $Mobile, $State, $Address);
    $stmt->execute();
    echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Dealer</title>
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="contact.css">
    <link rel="stylesheet" href="booking.css">
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
     <div class="container">
        <form action="booking.php" method="post" onsubmit="return validateForm()" novalidate>
            <h1>Submitted Successfully</h1>
         </form>
    </div>
';
    $stmt->close();
    $conn->close();

}
?>