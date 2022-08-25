<!doctype HTML>
<head>
<title>Практика 3 Задача 6 Безденежных Виктор Евгеньевич ВБ-335к</title>
<meta charset="utf-8">
</head>
<body>
<?php
echo "<a href='index.php'> К содержанию </a>";
$pytevka = ["Россию", "США", "Канаду"];
$price = [1000, 10000, 20000];
$prodolj = [28, 30, 31];
$deneg = rand(1000, 30000);
$otpysk = rand(28, 40);
echo "<br>У вас денег: ".$deneg."<br> Ваш отпуск: ".$otpysk." дней<br><br><br>";
for ($i = 0; $i <= 2; $i++){
echo "<br><br>Есть путевка в ".$pytevka[$i]." cтоимость: ".$price[$i]." Продолжительность тура: ".$prodolj[$i]." дней";
if ($deneg >= $price[$i]){
echo "<br><br>Вы можете выбрать путевку в ".$pytevka[$i];
}
}
?>
</body>