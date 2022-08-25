<!doctype HTML>
<head>
<title>Практика 3 Задача 3 Безденежных Виктор Евгеньевич ВБ-335к</title>
<meta charset="utf-8">
</head>
<body>
<?php
echo "<a href='index.php'> К содержанию </a>";
for ($i = 0, $lepest = rand(1, 20); $i <= $lepest; $i++){
$lol = ($lepest % 2 == 0) ? "Любит" : "Не любит";
}
echo "<br>".$lepest;
echo "<br>".$lol;

$temp = rand(32, 40) + rand(0, 9) / 10;
if ($temp >= 31 && $temp <= 36){
$zdorovie = "Холодно";
}
else if ($temp >= 36 && $temp <= 37){
$zdorovie = "Хорошо";
}
else if ($temp > 37){
$zdorovie = "Жарко";
}
echo "<br>Температура: ".$temp."<br>";
echo "Здоровье человека: ".$zdorovie;
?>
</body>