<!doctype HTML>
<head>
<title>Практика 3 Задача 5 Безденежных Виктор Евгеньевич ВБ-335к</title>
<meta charset="utf-8">
</head>
<body>
<?php
echo "<a href='index.php'> К содержанию </a>";
$product[] = 'Мягкая игрушка "Медведь"';
$product[] = 'Мягкая игрушка "Заяц"';
$product[] = 'Мягкая игрушка "Лошадь"';
$kolvo[] = rand(20, 200);
$kolvo[] = rand(20, 200);
$kolvo[] = rand(20, 200);
$price[] = rand(100, 5000) + rand(0, 9) / 10;
$price[] = rand(100, 5000) + rand(0, 9) / 10;
$price[] = rand(100, 5000) + rand(0, 9) / 10;
for($i = 0; $i <= 2; $i++){
$stoimost[$i] = $kolvo[$i] * $price[$i];
}

echo '<table width="400" align="center" cellpading="10" bgcolor="#f6f6f6" style="border: 1px solid gray">'
."<tr>"
."<td>"."Наименование товара"."</td>"
."<td>"."Количество"."</td>"
."<td>"."Цена"."</td>"
."<td>"."Стоимость"."</td>"
."</tr>";
for($i=0; $i<=2; $i++){
echo
"<tr>"
."<td>".$product[$i]."</td>"
."<td>".$kolvo[$i]."</td>"
."<td>".$price[$i]."</td>"
."<td>".$stoimost[$i]."</td>"
."</tr>";
}
echo "</table>";
?>
</body>