<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главная страница</title>
    <link rel="stylesheet" href="css/header/header.css">
    <link rel="stylesheet" href="css/body/main.css">
    <link rel="stylesheet" href="css/footer/footer.css">
    <link rel="stylesheet" href="css/body/admin.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@500&display=swap" rel="stylesheet">
</head>
<header>
<?php session_start(); include 'api/header.php';
if(!$_SESSION['user'] or $_SESSION['user']['role'] != 1){
    header('Location: index.php');
}
?>
</header>


<body>
<main>
<h2 class="exit"><a href="api/exit.php">Выход</a></h2>
<button id="open-modal-btn" class="button_add">Добавить</button>
<?php 
if($_SESSION['message']){
    echo '
    <p class="message">'. $_SESSION['message'] .'</p>
    ';
}
unset($_SESSION['message']);
include 'api/api_read.php';
?>

<table class="db_info">
    <thead>
        <th>ID</th>
        <th>name</th>
        <th>price</th>
        <th>image</th>
        <th>Дейсвтия</th>
    </thead>
    <tbody>
            <?php 
            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row["id_pr"];
                    $name = $row["name"];
                    $price = $row["price"];
                    $image = $row["image"];
                    echo '<tr> 
                    <td>'.$id.'</td> 
                    <td>'.$name.'</td>
                    <td>'.$price.'</td>
                    <td class = "block_image"><img src="'.$image.'" alt=""></td>
                    <td>
                        <a class="update_but" href="api/api_update.php?updateid='.$id.'">Обновить</a>
                        <a class="delete_but" href="api/api_delete.php?deleteid='.$id.'">Удалить</a>
                    </td>
                    </tr>';
                }
                
            }
            ?>
    </tbody>
</table>
<form class="modal" id="my-modal" method="post" action="api/api_add.php" enctype="multipart/form-data">
        <div class="modal__box">
            <button class="modal__close-btn" id="close-my-modal-btn"></button>
            <h2>Добавление</h2>
            <div class="form-field">
                <input type="text" placeholder="name" name="name">
            </div>
            <div class="form-field">
                <input type="number" placeholder="price" name="price">
            </div>
            <div class="form-field">
                <input type="file" placeholder="image" name="image">
            </div>
            <button class="button">Добавить</button>
        </div>
</form>
</main>

<script defer src="js/index.js"></script>
</body>







<header>
<?php include 'api/footer.php';?>
</header>
</html>