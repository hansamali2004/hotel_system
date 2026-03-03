<?php
session_start();
include("db.php");

if(!isset($_SESSION['admin'])){
    header("Location:index.php");
}

$query = "SELECT * FROM rooms";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
<title>Rooms List</title>
</head>
<body>

<h2>Rooms List</h2>

<table border="1">
<tr>
<th>ID</th>
<th>Room Number</th>
<th>Type</th>
<th>Price</th>
<th>Status</th>
</tr>

<?php
while($row = mysqli_fetch_assoc($result)){
    echo "<tr>";
    echo "<td>".$row['room_id']."</td>";
    echo "<td>".$row['room_number']."</td>";
    echo "<td>".$row['room_type']."</td>";
    echo "<td>".$row['price']."</td>";
    echo "<td>".$row['status']."</td>";
    echo "</tr>";
}
?>
</table>

<br>
<a href="dashboard.php">Back to Dashboard</a>

</body>
</html>