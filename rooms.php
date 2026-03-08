<?php
include "db.php";
$rooms=mysqli_query($conn,"SELECT * FROM rooms");
?>

<!DOCTYPE html>
<html>
<head>

<title>Rooms</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-4">

<h2>Rooms</h2>

<a href="add_room.php" class="btn btn-primary mb-3">Add Room</a>

<table class="table table-bordered">

<tr>
<th>ID</th>
<th>Room Number</th>
<th>Type</th>
<th>Price</th>
<th>Status</th>
<th>Action</th>
</tr>

<?php while($r=mysqli_fetch_assoc($rooms)){ ?>

<tr>

<td><?= $r['room_id'] ?></td>

<td><?= $r['room_number'] ?></td>

<td><?= $r['room_type'] ?></td>

<td><?= $r['price'] ?></td>

<td><?= $r['status'] ?></td>

<td>

<a href="edit_room.php?id=<?=$r['room_id']?>" class="btn btn-warning btn-sm">Edit</a>

<a href="delete_room.php?id=<?=$r['room_id']?>" class="btn btn-danger btn-sm">Delete</a>

</td>

</tr>

<?php } ?>

</table>

</div>

</body>
</html>