<?php
include "db.php";

if(isset($_POST['add'])){

$name=$_POST['name'];
$phone=$_POST['phone'];
$email=$_POST['email'];

mysqli_query($conn,"INSERT INTO customers(name,phone,email)
VALUES('$name','$phone','$email')");

header("location:customers.php");

}
?>

<!DOCTYPE html>
<html>
<head>
<title>Add Customer</title>

<style>

body{
    font-family: Arial, sans-serif;
    background:#f4f6f9;
    display:flex;
    justify-content:center;
    align-items:center;
    height:100vh;
}

form{
    background:white;
    padding:30px;
    width:320px;
    border-radius:10px;
    box-shadow:0 0 10px rgba(0,0,0,0.1);
}

h2{
    text-align:center;
    margin-bottom:20px;
}

input{
    width:100%;
    padding:10px;
    margin-bottom:15px;
    border:1px solid #ccc;
    border-radius:5px;
}

button{
    width:100%;
    padding:10px;
    background:#28a745;
    color:white;
    border:none;
    border-radius:5px;
    cursor:pointer;
}

button:hover{
    background:#218838;
}

</style>

</head>

<body>

<form method="post">

<h2>Add Customer</h2>

Customer Name
<input type="text" name="name" required>

Phone
<input type="text" name="phone" required>

Email
<input type="email" name="email" required>

<button name="add">Add Customer</button>

</form>

</body>
</html>