<?php
include "db.php";

$rooms=mysqli_query($conn,"SELECT * FROM rooms WHERE status='Available'");
$customers=mysqli_query($conn,"SELECT * FROM customers");

if(isset($_POST['book'])){

$c=$_POST['customer'];
$r=$_POST['room'];
$in=$_POST['checkin'];
$out=$_POST['checkout'];

mysqli_query($conn,"INSERT INTO bookings(customer_id,room_id,checkin,checkout,status)
VALUES('$c','$r','$in','$out','Booked')");

mysqli_query($conn,"UPDATE rooms SET status='Booked' WHERE room_id='$r'");

$success="Room booked successfully!";
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Room Booking</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
background:#f4f6f9;
font-family:Arial;
}

.booking-box{
background:white;
padding:30px;
border-radius:10px;
box-shadow:0 5px 15px rgba(0,0,0,0.1);
}

h2{
font-weight:600;
}

</style>

</head>

<body>

<div class="container mt-5">

<div class="row justify-content-center">

<div class="col-md-6">

<div class="booking-box">

<h2 class="text-center mb-4">Room Booking</h2>

<?php if(isset($success)){ ?>
<div class="alert alert-success"><?= $success ?></div>
<?php } ?>

<form method="post">

<div class="mb-3">
<label class="form-label">Customer</label>
<select name="customer" class="form-control">
<?php while($c=mysqli_fetch_assoc($customers)){ ?>
<option value="<?= $c['customer_id'] ?>"><?= $c['name'] ?></option>
<?php } ?>
</select>
</div>

<div class="mb-3">
<label class="form-label">Room</label>
<select name="room" class="form-control">
<?php while($r=mysqli_fetch_assoc($rooms)){ ?>
<option value="<?= $r['room_id'] ?>">Room <?= $r['room_number'] ?></option>
<?php } ?>
</select>
</div>

<div class="mb-3">
<label class="form-label">Check In Date</label>
<input type="date" name="checkin" class="form-control">
</div>

<div class="mb-3">
<label class="form-label">Check Out Date</label>
<input type="date" name="checkout" class="form-control">
</div>

<button name="book" class="btn btn-primary w-100">Book Room</button>

</form>

</div>

</div>

</div>

</div>

</body>
</html>