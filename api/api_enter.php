<?php
session_start();
include 'db.php';

$email = $_POST['email'];
$password = md5($_POST['password']);

$check_user = mysqli_query($conn, "SELECT * FROM `user` WHERE `email` = '$email' AND `password` = '$password'");

if(mysqli_num_rows($check_user) > 0){
    $user = mysqli_fetch_assoc($check_user);
    $user_id = $user['id_user'];
    $check_admin = mysqli_query($conn, "SELECT * FROM `rp` WHERE `id_user` = '$user_id' ");
    $admin = mysqli_fetch_assoc($check_admin);
    $_SESSION['user']=[
        "id_user" => $user['id_user'],
        "name" => $user['Name'],
        "email" => $user['email'],
        "role" => $admin['id_role']
    ];


    print_r($_SESSION['user']);
    header('Location: ../index.php');
    
}else{
    $_SESSION['message'] = 'Неверная почта или пароль';
    header('Location: ../auth.php');
}
?>