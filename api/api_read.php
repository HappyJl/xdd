<?php
session_start();
include 'db.php';

$sql = "SELECT * FROM `product`";
$result = mysqli_query($conn, $sql);