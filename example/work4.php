<!doctype HTML>
<head>
<title>Практика 1 Задача 4 Безденежных Виктор Евгеньевич ВБ-335к</title>
<meta charset="utf-8">
</head>
<body>
<?php
echo "<a href='index.php'> К содержанию </a>";
$product1 = "Морковь";
$product2 = "Сельдерей";
$product3 = "Манго";
$price1 = 100;
$price2 = 200;
$price3 = 80;
$sredn = round (($price1 + $price2 + $price3) / 3, 2);
$max = max($price1, $price2, $price3);
$min = min($price1, $price2, $price3);
$dorogo = ($max == $price1) ? $product1 : ($max == $price2) ? $product2 : $product3;
$deshevo = ($min == $price1) ? $product1 : ($min == $price2) ? $product2 : $product3;

echo <<<HERE
<table width="400" align="center" cellpading="10" bgcolor="#f6f6f6" style="border: 1px solid gray">
<tr>
<td>Товар</td><td>Цена (руб. за кг)</td>
</tr>
<tr>
<td>$product1</td><td>$price1</td>
</tr>
<tr>
<td>$product2</td><td>$price2</td>
</tr>
<tr>
<td>$product3</td><td>$price3</td>
</tr>
</table>
HERE;
echo "Средняя цена магазина: ".$sredn."<br>";
echo "Самый дорогой товар: ".$dorogo."<br>";
echo "Его стоимость: ".$max."<br>";
echo "Самый дешевый товар: ".$deshevo."<br>";
echo "Его стоимость: ".$min;
?>
</body>
