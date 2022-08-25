<!doctype HTML>
<head>
<title>Практика 3 Задача 2 Безденежных Виктор Евгеньевич ВБ-335к</title>
<meta charset="utf-8">
</head>
<body>
<?php
echo "<a href='index.php'> К содержанию </a>";
$x = rand(-25, 25);
$y = (abs(sin($x**4)) / (cos($x)**7)) * log(abs($x));
echo "<br>"."x = ".$x."; <br> y = ".$y."; ";
?>
</body>