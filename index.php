<?php
session_start();
include("db.php");

if(isset($_POST['login'])){
    
    $username = $_POST['username'];
    $password = $_POST['password'];

    if($username == "admin" && $password == "1234"){
        $_SESSION['admin'] = $username;
        header("Location: dashboard.php");
    }else{
        echo "Invalid Login";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Hotel Management Login</title>
</head>

<body>

<h2>Hotel Management System</h2>

<form method="POST">

Username<br>
<input type="text" name="username"><br><br>

Password<br>
<input type="password" name="password"><br><br>

<input type="submit" name="login" value="Login">

</form>

</body>
</html>