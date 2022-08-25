<!doctype HTML>
<head>
<title>Практика 3 Задача 1 Безденежных Виктор Евгеньевич ВБ-335к</title>
<meta charset="utf-8">
</head>
<body>
<?php
echo "<a href='index.php'> К содержанию </a><br>";
$a = rand(12, 25);
$b = rand(4, 11);
echo $a." + ".$b." = ".($a + $b)."<br>";
echo $a." - ".$b." = ".($a - $b)."<br>";
echo $a." * ".$b." = ".($a * $b)."<br>";
echo $a." / ".$b." = ".($a / $b)."<br>";
echo $a." возвести в степень ".$b." = ".($a**$b)."<br>";
echo $a." % ".$b." = ".($a % $b)." (остаток от деления)"."<br>";
?>
</body>