<?php
session_start();
include("db.php");

if(!isset($_SESSION['admin'])){
    header("Location:index.php");
}

// Fetch all bookings
$bookings = mysqli_query($conn, "SELECT b.booking_id, c.name, r.room_number, r.price, b.checkin_date, b.checkout_date 
                                FROM bookings b
                                JOIN customers c ON b.customer_id = c.customer_id
                                JOIN rooms r ON b.room_id = r.room_id
                                WHERE b.status='Booked'");

if(isset($_POST['pay'])){
    $booking_id = $_POST['booking_id'];
    $amount = $_POST['amount'];
    $payment_date = date('Y-m-d');

    // Insert payment
    $query = "INSERT INTO payments (booking_id, amount, payment_date) 
              VALUES ('$booking_id', '$amount', '$payment_date')";

    // Update booking status to checked-out
    $update_booking = "UPDATE bookings SET status='Checked Out' WHERE booking_id='$booking_id'";
    
    // Update room status to Available
    $booking_room = mysqli_query($conn, "SELECT room_id FROM bookings WHERE booking_id='$booking_id'");
    $room = mysqli_fetch_assoc($booking_room);
    $room_id = $room['room_id'];
    $update_room = "UPDATE rooms SET status='Available' WHERE room_id='$room_id'";

    if(mysqli_query($conn, $query) && mysqli_query($conn, $update_booking) && mysqli_query($conn, $update_room)){
        echo "Payment Successful and Room Checked Out";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Payments</title>
</head>
<body>

<h2>Payments / Billing</h2>

<form method="POST">
Booking:<br>
<select name="booking_id" required>
<?php while($b = mysqli_fetch_assoc($bookings)){ ?>
<option value="<?php echo $b['booking_id']; ?>">
<?php echo $b['name'].' - '.$b['room_number'].' - $'.$b['price']; ?>
</option>
<?php } ?>
</select><br><br>

Amount:<br>
<input type="number" name="amount" required><br><br>

<input type="submit" name="pay" value="Pay & Checkout">
</form>

<br>
<a href="dashboard.php">Back to Dashboard</a>

</body>
</html> 