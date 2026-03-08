<?php
include "db.php";

$today=date("Y-m-d");

$q=mysqli_query($conn,"SELECT SUM(amount) as income FROM payments WHERE payment_date='$today'");
$data=mysqli_fetch_assoc($q);
?>

<!DOCTYPE html>
<html>
<head>
<title>Daily Income</title>
<link rel="stylesheet" href="style.css">
</head>

<body>

<div class="income-box">

<h2>Daily Income</h2>

<h3>$<?= $data['income'] ?></h3>

</div>

</body>
</html>