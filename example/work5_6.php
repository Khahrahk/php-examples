<!doctype HTML>
<html>
<head>
<title>Практика 5 Задача 6 Безденежных Виктор Евгеньевич ВБ-335к</title>
<meta charset="utf-8">
</head>
<body>
<form action="work5_6.php" method="post">
<input name="number1" type="text" size="10">
<input name="number2" type="text" size="10">
<input type="submit" name="submit" id="submit" value="Получить значение">
</form>

<?php

function quotient()
{
    $value1 = $_POST['number1'];
    $value2 = $_POST['number2'];
    $value = $value1 / $value2;
    echo $value;
}

if(array_key_exists('submit',$_POST)){
   quotient();
}
echo "<br><br><br><a href='index.php'> К содержанию </a>";
?>
</body>
</html>