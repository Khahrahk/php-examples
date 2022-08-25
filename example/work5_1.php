<!doctype HTML>
<html>
<head>
<title>Практика 5 Задача 1 Безденежных Виктор Евгеньевич ВБ-335к</title>
<meta charset="utf-8">
</head>
<body>
<?php
$array = array();
$array1 = array();
$oof = 0;
$oof1 = 0;
$oof2 = 0;
for ($i = 0; $i < 20; $i++){
$array[]=rand(-100, 100);
$array[$i] % 5 == 0 ? $oof += $array[$i] : "lol";
$array[$i] % 5 == 0 ? $oof1++ : $oof2++;
$array[$i] % 5 == 0 ? array_push($array1, $array[$i]) : "lol";
}

echo '<pre>Все числа массива: '.print_r($array, true).'</pre>';
echo '<pre>Четные числа массива: '.print_r($array1, true).'</pre>';
echo "<br>Сумма четных: ".$oof;
echo "<br>Количество четных: ".$oof1;
echo "<br>Количество нечетных: ".$oof1;
echo "<br>Максимальное четное число: ".max($array1);
echo "<br>Минимальное четное число: ".min($array1);
echo "<br>Максимальное нечетное число: ".max($array);
echo "<br>Минимальное нечетное число: ".min($array);
echo max($array1) > max($array) ? "<br>Максимум четных больше" : "<br>Максимум нечетных больше";
?>
</body>
</html>