<?php
session_start();
include 'db.php';
print_r($_POST);
$name = $_POST['name'];
$price = $_POST['price'];
$path = 'image/'. time(). $_FILES['image']['name'];
move_uploaded_file($_FILES['image']['tmp_name'], '../' . $path);
mysqli_query($conn, "INSERT INTO `product` (`name`, `price`, `image`) VALUES ('$name', '$price', '$path')");
$_SESSION['message'] = 'Товар добавлен';
header("Location: ../admin.php");   