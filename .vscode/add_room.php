<?php
session_start();
include("db.php");

if(!isset($_SESSION['admin'])){
    header("Location:index.php");
}

if(isset($_POST['add'])){
    $room_number = $_POST['room_number'];
    $room_type = $_POST['room_type'];
    $price = $_POST['price'];
    $status = "Available";

    $query = "INSERT INTO rooms (room_number, room_type, price, status) 
              VALUES ('$room_number', '$room_type', '$price', '$status')";

    if(mysqli_query($conn, $query)){
        echo "Room Added Successfully";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Add Room</title>
</head>
<body>

<h2>Add New Room</h2>

<form method="POST">
Room Number:<br>
<input type="text" name="room_number" required><br><br>

Room Type:<br>
<input type="text" name="room_type" required><br><br>

Price:<br>
<input type="number" name="price" required><br><br>

<input type="submit" name="add" value="Add Room">
</form>

<br>
<a href="dashboard.php">Back to Dashboard</a>

</body>
</html>