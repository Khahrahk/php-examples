<!doctype HTML>
<html>
<head>
<title>Практика 6 Задача 2 Безденежных Виктор Евгеньевич ВБ-335к</title>
<meta charset="utf-8">
</head>
<body>
<form action="7_2.php" method="post">
<input name="number2" type="text" size="10">
<input name="number3" type="text" size="10">
<input type="submit" name="submit" id="submit" value="Получить значение">
</form>

<?php
function countDaysBetweenDates()
{
    $d2 = $_POST['number2'];
    $d3 = $_POST['number3'];

    $secs = (strtotime($d2) - strtotime("00:00:00"));

    $secs1 = $secs / 60 / 60;
    echo '<br>'.date("H:i:s", $secs + strtotime("00:00:00")) . "\n";

    if ($d3 == 'Понедельник' || $d3 == 'Вторник' || $d3 == 'Среда' || $d3 == 'Четверг' || $d3 == 'Пятница') {
        if ($secs1 >= 9 && $secs1 <= 21) {
            echo 'работаем';
        } else {
            echo 'не работаем';
        }
    }
    else {
        if ($secs1 >= 10 && $secs1 <= 18) {
            echo 'работаем';
        } else {
            echo 'не работаем';
        }
    }
}

echo countDaysBetweenDates('');
echo "<br><br><br><a href='index.php'> В начало </a>";
?>

</body>
</html>