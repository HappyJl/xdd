<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<header>
    <div class="main-block">
        <a href="index.php"  class="sub_main_block">
            <div>
            Главная
            </div>
        </a>

        <a href="cart.php" class="sub_main_block">
            <div>
            Корзина
            </div>
        </a>
        <?php
        ini_set('display_errors', 'Off'); 
        if($_SESSION['user']){
            echo '<a href="profile.php" class="sub_main_block">'. $_SESSION['user']['name'] .'</a>';
            if($_SESSION['user']['role'] == 1){
                echo '<a href="admin.php" class="sub_main_block"> Панель администратора </a>';
            }
        }else{
            echo '<a href="auth.php" class="sub_main_block"><div>Авторизация</div></a>';
        }
        ?>

        
    </div>
</header>
</html>