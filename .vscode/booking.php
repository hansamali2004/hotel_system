<?php
session_start();
include("db.php");

if(!isset($_SESSION['admin'])){
    header("Location:index.php");
}

// Fetch available rooms
$rooms = mysqli_query($conn, "SELECT * FROM rooms WHERE status='Available'");

// Fetch customers
$customers = mysqli_query($conn, "SELECT * FROM customers");

if(isset($_POST['book'])){
    $customer_id = $_POST['customer_id'];
    $room_id = $_POST['room_id'];
    $checkin = $_POST['checkin_date'];
    $checkout = $_POST['checkout_date'];

    // Insert booking
    $query = "INSERT INTO bookings (customer_id, room_id, checkin_date, checkout_date, status)
              VALUES ('$customer_id', '$room_id', '$checkin', '$checkout', 'Booked')";
    
    if(mysqli_query($conn, $query)){
        // Update room status
        mysqli_query($conn, "UPDATE rooms SET status='Booked' WHERE room_id='$room_id'");
        echo "Room Booked Successfully";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Room Booking</title>
</head>
<body>

<h2>Book a Room</h2>

<form method="POST">
Customer:<br>
<select name="customer_id" required>
<?php while($c = mysqli_fetch_assoc($customers)){ ?>
<option value="<?php echo $c['customer_id']; ?>"><?php echo $c['name']; ?></option>
<?php } ?>
</select><br><br>

Room:<br>
<select name="room_id" required>
<?php while($r = mysqli_fetch_assoc($rooms)){ ?>
<option value="<?php echo $r['room_id']; ?>"><?php echo $r['room_number'].' - '.$r['room_type']; ?></option>
<?php } ?>
</select><br><br>

Check-in Date:<br>
<input type="date" name="checkin_date" required><br><br>

Check-out Date:<br>
<input type="date" name="checkout_date" required><br><br>

<input type="submit" name="book" value="Book Room">
</form>

<br>
<a href="dashboard.php">Back to Dashboard</a>

</body>
</html>