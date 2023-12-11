<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
    <link rel="stylesheet" href="css/header/header.css">
    <link rel="stylesheet" href="css/body/main.css">
    <link rel="stylesheet" href="css/body/reg.css">
    <link rel="stylesheet" href="css/footer/footer.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@500&display=swap" rel="stylesheet">
</head>
<header>
<?php include 'api/header.php';
session_start();
ini_set('display_errors', 'Off'); 
?>
</header>


<body>
<main>
    <form action="api/api_reg.php" method="post" class="register-form-container">
<h1 class="form-title">
    Регистрация
</h1>
<div class="form-fields">
    <div class="form-field">
        <input type="text" placeholder="Логин" name="login">
    </div>
    <div class="form-field">
        <input type="email" placeholder="Почта" name="email">
    </div>
    <div class="form-field">
        <input type="password" placeholder="Пароль" name="password">
    </div>
    <div class="form-field">
        <input type="password" placeholder="Повторите пароль" name="password2">
    </div>
</div>
<div class="form-buttons">
    <button class="button">Регистрация</button>
    <div class="divder"> или </div>
    <a href="auth.php" class="button">Вход</a>
</div>
<?php 
if($_SESSION['message']){
    echo '
    <p class="message">'. $_SESSION['message'] .'</p>
    ';
}
unset($_SESSION['message']);
?>
</form>

    

</main>
</body>


<header>
<?php include 'api/footer.php';?>
</header>
</html>