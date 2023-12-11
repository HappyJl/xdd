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
if(!$_SESSION['user']){
    header('Location: auth.php');
}
?>
</header>


<body>
<main>
<form>
    <h2> <?= $_SESSION['user']['name'] ?></h2>
    <h2> <?= $_SESSION['user']['email'] ?></h2>
    <a href="api/exit.php">Выход</a>
</form>
</main>
</body>







<header>
<?php include 'api/footer.php';?>
</header>
</html>