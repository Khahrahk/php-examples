<!doctype HTML>
<head>
<title>Практика 3 Задача 4 Безденежных Виктор Евгеньевич ВБ-335к</title>
<meta charset="utf-8">
</head>
<body>
<?php
echo "<a href='index.php'> К содержанию </a><br>";
echo '<table width="400" align="center" cellpading="10" bgcolor="#f6f6f6" style="border: 1px solid gray">'
."<tr>"
."<td>"."a<sub>n</sub>"."</td>"
."<td>"."a<sub>n</sub> = 5x + 2n"."</td>"
."</tr>";

define("CONSTANT", rand(23, 24));
$n = rand(1, 10);
for ($i = 1; $i <= $n; $i++){
$a = (5 * CONSTANT) + (2 * $i);
echo "<tr>"
."<td>"
."a".$i
."</td>"
."<td>"
.$a
."</td>"
."</tr>";
}
?>
</body>