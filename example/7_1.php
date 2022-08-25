<!doctype HTML>
<html>
<head>
<title>Практика 7 Задача 1 Безденежных Виктор Евгеньевич ВБ-335к</title>
<meta charset="utf-8">
</head>
<body>
<form action="7_1.php" method="post">
<input name="number1" type="text" size="10">
<input name="number2" type="text" size="10">
<input type="submit" name="submit" id="submit" value="Получить значение">
</form>

<?php

$urok = 45;
$peremena = 10;

function countDaysBetweenDates()
{
    $time = $_POST['number1'];
    $time2 = $_POST['number2'];

    $secs = strtotime($time2) - strtotime("00:00:00");
    $base = strtotime($time);

    $oof = ($secs / 60 / 60) - (($base - strtotime("00:00:00")) / 60 / 60);

    for ($i = 0; $i <= $oof; $i++){
        echo '<br>'.'Урок: '.date("H:i:s", $base += strtotime('00:45') - strtotime("00:00:00")) . "\n";
        echo '<br>'.'Перемена: '.date("H:i:s", $base += strtotime('00:10') - strtotime("00:00:00")) . "\n";

    }
}

echo countDaysBetweenDates('');
echo "<br><br><br><a href='index.php'> В начало </a>";
?>

</body>
</html>