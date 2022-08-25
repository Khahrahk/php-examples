<!doctype HTML>
<html>
<head>
<title>Практика 6 Задача 2 Безденежных Виктор Евгеньевич ВБ-335к</title>
<meta charset="utf-8">
</head>
<body>
<form action="7_4.php" method="post">
<input name="number1" type="text" size="10">
<input name="number2" type="text" size="10">
<input type="submit" name="submit" id="submit" value="Получить значение">
</form>

<?php
function countDaysBetweenDates()
{
for($i = strtotime('2021-01-01'); $i <= strtotime('2021-12-31'); $i += 86400){
    $x = date('w', $i);
    if($x == 1){
        echo '<br>'.date('y-m-d', $i);
    }
}
}

echo countDaysBetweenDates('');
echo "<br><br><br><a href='index.php'> В начало </a>";
?>

</body>
</html>