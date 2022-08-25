<!doctype html>
<html lang="ru">
<head>
    <title>Практика 8 Задача 1 Безденежных Виктор Евгеньевич ВБ-335к</title>
</head>
<body>
<?php
include 'dataFile.php';
?>

<form action="8_1.php" method="post">
  <br> Имя: <input name="Имя" type="text" value="<?= isset($_GET['update']) ? $product['First_name'] : ''; ?>" size="10">
  <br> Фамилия <input name="Фамилия" type="text" value="<?= isset($_GET['update']) ? $product['Last_name'] : ''; ?>" size="10">
  <br> Дата <input name="Дата" type="text" value="<?= isset($_GET['update']) ? $product['When'] : ''; ?>" size="10">
  <br> Email <input name="Емаил" type="text" value="<?= isset($_GET['update']) ? $product['Email'] : ''; ?>" size="10">
  <br> Сообщение <input name="Сообщение" type="text" value="<?= isset($_GET['update']) ? $product['Message'] : ''; ?>" size="10">
  <br> <input type="submit" name="submit" id="submit" value="Получить значение">
</form>

<?php

//Получаем данные
    $sql = mysqli_query($link, 'SELECT `ID`, `First_name`, `Last_name`, `When`, `Email`, `Message` FROM `test1`');
    while ($result = mysqli_fetch_array($sql)) {
        echo "<p>Номер заказа: {$result['ID']} <br> Имя: {$result['First_name']} <br> Фамилия: {$result['Last_name']} <br> Дата: {$result['When']} <br> Email: {$result['Email']} <br> Сообщение: {$result['Message']} </p>";
    }

?>



</body>
</html>