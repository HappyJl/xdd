<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
    <link rel="stylesheet" href="../css/header/header.css">
    <link rel="stylesheet" href="../css/body/main.css">
    <link rel="stylesheet" href="../css/body/reg.css">
    <link rel="stylesheet" href="../css/footer/footer.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@500&display=swap" rel="stylesheet">
</head>
<header>
<?php
session_start();
include 'db.php';
$id = $_GET['updateid'];
$sql = "SELECT * FROM `product` WHERE `id_pr` = '$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$name = $row['name'];
$price = $row['price'];
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $price = $_POST['price'];
    print_r($_FILES);
    if($_FILES['image']['error'] == 0){
        $path = 'image/'. time(). $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], '../' . $path);
        $sql="UPDATE `product` SET `name` = '$name', `price` = '$price', `image` = '$path'  WHERE (`id_pr` = '$id')";
        $result = mysqli_query($conn,$sql);
        if($result){
            echo "ОБНОВИЛОСЬ";
            header("Location:../admin.php");
        }
    }else{
        $sql="UPDATE `product` SET `name` = '$name', `price` = '$price' WHERE (`id_pr` = '$id')";
        $result = mysqli_query($conn,$sql);
        header("Location:../admin.php");
    }

}
?>
</header>


<body>
<main>
<form action="" method="post" class="register-form-container" enctype="multipart/form-data">
<h1 class="form-title">
    Форма для обновления 
</h1>
<div class="form-fields">
    <div class="form-field">
        <input type="text" name="name"" value="<?php echo $name ?>">
    </div>
    <div class="form-field">
        <input type="number" name="price" value="<?php echo $price ?>">
    </div>
    <div class="form-field">
        <input type="file" name="image">
    </div>
</div>
<div class="form-buttons">
    <button class="button" name="submit">Обновить</button>
</div>
</form>

    

</main>
</body>
</html>