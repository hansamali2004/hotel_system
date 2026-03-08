<?php
include "db.php";

$message="";

if(isset($_POST['pay'])){

$customer=$_POST['customer'];
$amount=$_POST['amount'];
$date=date("Y-m-d");

$sql="INSERT INTO payments(customer_name,amount,payment_date)
VALUES('$customer','$amount','$date')";

if(mysqli_query($conn,$sql)){
$message="Payment Successful!";
}else{
$message="Payment Failed!";
}

}
?>

<!DOCTYPE html>
<html>
<head>
<title>Payment Page</title>
<link rel="stylesheet" href="style.css">
</head>

<body>

<div class="payment-box">

<h2>Customer Payment</h2>

<?php if($message!=""){ ?>
<p class="msg"><?php echo $message; ?></p>
<?php } ?>

<form method="post">

<label>Customer Name</label>
<input type="text" name="customer" required>

<label>Amount</label>
<input type="number" name="amount" required>

<button name="pay">Pay Now</button>

</form>

</div>

</body>
</html>