<!doctype HTML>
<html>
<head>
<title>Практика 6 Задача 1 Безденежных Виктор Евгеньевич ВБ-335к</title>
<meta charset="utf-8">
</head>
<body>
<form action="work6_1.php" method="post">
<input name="number1" type="text" size="10">
<input type="submit" name="submit" id="submit" value="Получить значение">
</form>

<?php

$datetime1 = new DateTime($_POST['number1']);
$datetime2 = new DateTime(date("Y/m/d"));
$interval = date_diff($datetime1, $datetime2);
echo $interval->format("До дня рождения: ".'%a дней');

echo "<br><br><br><a href='index.php'> В начало </a>";
?>

</body>
</html>