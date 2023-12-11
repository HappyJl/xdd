<?php
session_start();
include 'db.php';
$id = $_GET['pr_id'];
if ( !@is_array($_SESSION['cart']) ) { $_SESSION['cart'] = array(); }

if(!$_SESSION['user']){
    $_SESSION['cart'][]=[
        "pr_id" => $id,
        "user"=> "guest",
    ];
    print_r($_SESSION['cart']);
    header('Location: ../index.php');
}else{
        $_SESSION['cart'][]=[
            "pr_id" => $id,
            "user"=> $_SESSION['user']['name']
        ];


    print_r($_SESSION['cart']);
    header('Location: ../index.php');
}
