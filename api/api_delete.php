<?php
session_start();
include 'db.php';
if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];
    $sql= "delete from `product` where id_pr = '$id'";
    $result=mysqli_query($conn,$sql);
    header("Location: ../admin.php");
}