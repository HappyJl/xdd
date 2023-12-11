<?php
$conn = new mysqli("localhost","root","123456","market");
if($conn->connect_error){
    die("ОШИБКА:".$conn->connect_error);
}
//echo "подключение успешно установлено";
?>