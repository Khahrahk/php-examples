<!doctype HTML>
<html>
<head>
<title>Практика 6 Задача 2 Безденежных Виктор Евгеньевич ВБ-335к</title>
<meta charset="utf-8">
</head>
<body>
<form action="7_3.php" method="post">
<input name="number1" type="text" size="10">
<input name="number2" type="text" size="10">
<input type="submit" name="submit" id="submit" value="Получить значение">
</form>

<?php
function countDaysBetweenDates()
{
    $d1 = $_POST['number1'];
    $d2 = $_POST['number2'];
    $d1_ts = strtotime($d1);
    $d2_ts = strtotime($d2);
    $seconds = abs($d1_ts - $d2_ts);
    return floor($seconds / 86400);
}

echo countDaysBetweenDates('');
echo "<br><br><br><a href='index.php'> В начало </a>";
?>

</body>
</html>