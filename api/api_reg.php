<?php
session_start();
include 'db.php';
print_r($_POST);

$login = $_POST['login'];
$email = $_POST['email'];
$password = $_POST['password'];
$password2= $_POST['password2'];

if($password === $password2){
    $password = md5($password);

    mysqli_query($conn, "INSERT INTO `user` (`Name`, `email`, `password`) VALUES ('$login', '$email', '$password')");

    $_SESSION['message'] = 'Регистрация прошла успешно';
    header('Location: ../auth.php');
}else{
    $_SESSION['message'] = 'Пароли не совпадают';
    header('Location: ../reg.php');
}
?>