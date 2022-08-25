<!doctype HTML>
<head>
<title>Практика 1 Задача 3 Безденежных Виктор Евгеньевич ВБ-335к</title>
<meta charset="utf-8">
</head>
<body>
<?php
echo "<a href='index.php'> К содержанию </a>";
echo "<h2>Список переменных и их значений: </h2>";
$name = "Viktor";
$age = 19;
define("CONSTANT", 101.203);
$bool = true;
$null = null;
$showage = 'Мой возраст '.$age.' лет <br>';
echo 'Поздравляю, '.$name.', Вы только что выиграли 1 000 000 японских йен.
Забрать вы их можете по адресу  г. Токио, улица Красных Самураев, д.15 <br>';
echo $showage;
echo CONSTANT.'<br>';
echo $bool."<br>";
echo $null."<br>";
?>
<h2>Мой PHP-script</h2>
<hr style="border-bottom:1pt solid black;">
$name = "Viktor";<br>
$age = 19;<br>
define("CONSTANT", 101.203);<br>
$bool = true;<br>
$null = null;<br>
$showage = 'Мой возраст '.$age.' лет';<br>
echo 'Поздравляю, '.$name.', Вы только что выиграли 1 000 000 японских йен.
Забрать вы их можете по адресу  г. Токио, улица Красных Самураев, д.15';<br>
echo $showage;<br>
echo CONSTANT;<br>
echo $bool;<br>
echo $null;<br>
<hr style="border-bottom:1pt solid black;">
</body>
