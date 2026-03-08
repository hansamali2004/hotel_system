<?php
include "db.php";

if(isset($_POST['add'])){

$number=$_POST['number'];
$type=$_POST['type'];
$price=$_POST['price'];

mysqli_query($conn,"INSERT INTO rooms(room_number,room_type,price,status)
VALUES('$number','$type','$price','Available')");

header("location:rooms.php");

}
?>

<!DOCTYPE html>
<html>
<head>
<title>Add Room</title>

<style>

body{
    font-family: Arial;
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
    background:#007bff;
    color:white;
    border:none;
    border-radius:5px;
}

</style>

</head>
<body>

<form method="post">

<h2>Add Room</h2>

Room Number
<input name="number">

Room Type
<input name="type">

Price
<input name="price">

<button name="add">Add Room</button>

</form>

</body>
</html>