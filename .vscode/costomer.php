<?php
session_start();
include("db.php");

if(!isset($_SESSION['admin'])){
    header("Location:index.php");
}

if(isset($_POST['add'])){
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $address = $_POST['address'];

    $query = "INSERT INTO customers (name, phone, email, address)
              VALUES ('$name', '$phone', '$email', '$address')";

    if(mysqli_query($conn, $query)){
        echo "Customer Added Successfully";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Add Customer</title>
</head>
<body>

<h2>Add Customer</h2>

<form method="POST">
Name:<br>
<input type="text" name="name" required><br><br>

Phone:<br>
<input type="text" name="phone" required><br><br>

Email:<br>
<input type="email" name="email"><br><br>

Address:<br>
<textarea name="address"></textarea><br><br>

<input type="submit" name="add" value="Add Customer">
</form>

<br>
<a href="dashboard.php">Back to Dashboard</a>

</body>
</html>