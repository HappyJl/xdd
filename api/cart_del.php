<?php 
session_start();
include 'db.php';
$id = $_GET['id'];
unset($_SESSION['cart'][$id]);
header('Location:../cart.php');