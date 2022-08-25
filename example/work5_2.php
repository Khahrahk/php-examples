-<!doctype HTML>
<html>
<head>
<title>Практика 5 Задача 2 Безденежных Виктор Евгеньевич ВБ-335к</title>
<meta charset="utf-8">
</head>
<body>
<div>
<?php
$array = array("Понедельник", "Вторник", "Среда", "Четверг", "Пятница", "Суббота", "Воскресенье");
$count = 0;
for($i = 0; $i <= 6; $i++){
$count++;
if ($count == 7){
echo "<br><p style='color:red'>".$array[$i]."</p>";
}
else echo "<br><p style='color:blue'>".$array[$i]."</p>";
}
echo "<br><br><br><a href='index.php'> К содержанию </a>";
?>
</div>
</body>
</html>