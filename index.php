<?php
session_start();
include "db.php";

if(isset($_POST['login'])){

$username=$_POST['username'];
$password=$_POST['password'];

$q=mysqli_query($conn,"SELECT * FROM users WHERE username='$username' AND password='$password'");
$user=mysqli_fetch_assoc($q);

if($user){
$_SESSION['user']=$user['username'];
$_SESSION['role']=$user['role'];
header("location:dashboard.php");
}else{
$error="Invalid login";
}

}
?>

<!DOCTYPE html>
<html>
<head>
<title>Hotel Login</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5 col-md-4">

<h3 class="text-center">Hotel Login</h3>

<?php if(isset($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>

<form method="post" class="border p-4 bg-white">

<input class="form-control mb-3" name="username" placeholder="Username">

<input type="password" class="form-control mb-3" name="password" placeholder="Password">

<button class="btn btn-primary w-100" name="login">Login</button>

</form>

</div>

</body>
</html>