<?php
session_start();
if(!isset($_SESSION['user'])){
header("location:index.php");
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Dashboard</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<nav class="navbar navbar-dark bg-dark">
<div class="container">

<!-- Logo + Title -->
<a class="navbar-brand d-flex align-items-center" href="#">
<img src="hotel_system/IMG_3498.jpg" width="40" height="40" class="me-2">
Hotel System
</a>

<a href="logout.php" class="btn btn-danger">Logout</a>

</div>
</nav>

<div class="container mt-4">

<h2 class="mb-4">Dashboard</h2>

<!-- Two Photos -->
<div class="row mb-4">

<div class="col-md-6">
<img src="hotel_system/dji_fly_20250808_081113_0_1754620873000_photo_low_quality.jpg" class="img-fluid rounded shadow">
</div>

<div class="col-md-6">
<img src="hotel_system/IMG_1206.JPG" class="img-fluid rounded shadow">
</div>

</div>

<!-- Dashboard Buttons -->
<div class="row">

<div class="col-md-3">
<a href="rooms.php" class="btn btn-primary w-100">Rooms</a>
</div>

<div class="col-md-3">
<a href="customers.php" class="btn btn-success w-100">Customers</a>
</div>

<div class="col-md-3">
<a href="booking.php" class="btn btn-warning w-100">Booking</a>
</div>

<div class="col-md-3">
<a href="payment.php" class="btn btn-info w-100">Payments</a>
</div>

<div class="col-md-3 mt-3">
<a href="reports.php" class="btn btn-dark w-100">Reports</a>
</div>

</div>

</div>

</body>
</html>