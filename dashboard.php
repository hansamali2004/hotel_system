<?php
session_start();

if(!isset($_SESSION['admin'])){
    header("Location:index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Dashboard</title>
</head>

<body>

<h1>Hotel Management Dashboard</h1>

<a href="add_room.php">Add Room</a><br><br>

<a href="rooms.php">View Rooms</a><br><br>

<a href="customers.php">Customers</a><br><br>

<a href="booking.php">Room Booking</a><br><br>

<a href="payment.php">Payments</a><br><br>

<a href="logout.php">Logout</a>

</body>
</html>