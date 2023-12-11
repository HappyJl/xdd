<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главная страница</title>
    <link rel="stylesheet" href="css/header/header.css">
    <link rel="stylesheet" href="css/body/main.css">
    <link rel="stylesheet" href="css/footer/footer.css">
    <link rel="stylesheet" href="css/body/cart.css">
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
    <div class="order">
        <div class="text_order">Мой заказ:</div>
        
        <?php
        $sessionArray = $_SESSION['cart'];        
        foreach ($sessionArray as $index => $item) {
            $id = $item['pr_id'];
            $sql_cart = "SELECT * FROM `product` WHERE id_pr = '$id'";
            $result_cart = mysqli_query($conn, $sql_cart);
            if($result_cart){
                while($row = mysqli_fetch_assoc($result_cart)){
                    echo '
                    <div class="order_block">
                    <div class="block_image"><img src="'.$row["image"].'" alt=""></div>
                    <div class="block_info">
                        <div class="name_order">
                            '.$row["name"].'
                        </div>
                        <div class="order_price">
                            '.$row["price"].' ₽
                        </div>
                        <form action="" class="form_for_button">
                            <a href = "api/cart_del.php?id='.$index.'" class="button_minus">Убрать</a>
                        </form>
                    </div>
                </div>
                    ';
                $sum += $row['price'];
                }
            }
        }
        ?>
    </div>
    <div class="oform">
        <div class="text_oform">
            Итого:
        </div>
        <div class="text_oform">
            <?php echo $sum; ?>  ₽
        </div>
        <div class="text_oform">
            <a href="api/exit.php">Оформить</a>
        </div>
    </div>

</div>
</main>
</body>







<header>
<?php include 'api/footer.php';?>
</header>
</html>