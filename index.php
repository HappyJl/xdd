<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главная страница</title>
    <link rel="stylesheet" href="css/header/header.css">
    <link rel="stylesheet" href="css/body/main.css">
    <link rel="stylesheet" href="css/footer/footer.css">
    <link rel="stylesheet" href="css/body/index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@500&display=swap" rel="stylesheet">
</head>
<header>
<?php session_start(); include 'api/header.php';
include'api/api_read.php';
?>
</header>


<body>
<main>
<div class="container">
<?php
    if($result){
        while($row = mysqli_fetch_assoc($result)){
        $id = $row['id_pr'];
        $name = $row['name'];
        $price = $row['price'];
        $image = $row["image"];
        echo '
        <div class="main_block_item">
            <div class="block_image">
                <img src="'.$image.'" alt="">
            </div>
            <div class="block_product_name">
            '.$name.'
            </div>
            <div class="block_product_price">
            '.$price.' ₽
            </div>
                <a href = "api/add_cart.php?pr_id='.$id.'" class="buy">Купить</a> 
    </div>
        ';
        }
    }
?>
</div>
</main>
</body>







<header>
<?php include 'api/footer.php';?>
</header>
</html>