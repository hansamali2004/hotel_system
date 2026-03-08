<?php
session_start();
include("db.php");

if(!isset($_SESSION['admin'])){
    header("Location:index.php");
    exit();
}

$message = "";

if(isset($_POST['add'])){
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);

    $query = "INSERT INTO customers (name, phone, email, address)
              VALUES ('$name', '$phone', '$email', '$address')";

    if(mysqli_query($conn, $query)){
        $message = "Customer Added Successfully";
    } else {
        $message = "Error: " . mysqli_error($conn);
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

<?php if($message != ""){ ?>
<p><?php echo $message; ?></p>
<?php } ?>

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