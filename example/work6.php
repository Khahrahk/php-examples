<!doctype HTML>
<head>
<title>Практика 1 Задача 1 Безденежных Виктор Евгеньевич ВБ-335к</title>
<meta charset="utf-8">
</head>
<body>
<?php
echo "<a href='index.php'> К содержанию </a>";
$km = rand(10, 100);
$chel = rand(3, 6);
$mashina = rand(40, 100);
$vremya = ((($chel * 1.5) + $mashina) / $km) * 60;
echo "Туристы дошли до озера за ".round($vremya, 2)." Минут";
?>
</body>