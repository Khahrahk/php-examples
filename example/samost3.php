<!doctype HTML>
<html lang="ru">
<head>
<title>Самостоятельная Безденежных Виктор Евгеньевич ВБ-335к</title>
<meta charset="utf-8">
</head>
<body>
<form action="samost3.php" method="post">
ФИО: <input name="number" type="text" size="10"><br>
<input type="submit" name="submit" id="submit" value="Получить значение">
</form>
<br><br>
<form action="samost3.php" method="post">
Текст: <textarea name="number1" rows="10" cols="75" size="10"></textarea><br>
Поиск слова: <input name="number2" type="text" size="10"><br>
Замена слова: <input name="number3" type="text" size="10"><br> на: <input name="number4" type="text" size="10"><br>
<input type="submit" name="submit1" id="submit1" value="Найти слово">
<input type="submit" name="submit2" id="submit2" value="Замена">
</form>

<br>

<?php

function quotient()
{
    $value = $_POST['number'];
    list($FAM, $Name, $Otch) = explode(" ", $value);
    echo $FAM.' '.mb_substr($Name, 0, 1).'.'.mb_substr($Otch, 0, 1).'.';
}


function quotient1()
{
    $mass = $_POST['number1'];
    $name = $_POST['number2'];
    echo"Ищем слово: ".$name."<br><br>";
 
$res_name = explode(" ", $mass);
$limit=count($res_name);
 
for($i=0; $i<=$limit; ++$i)
{
    if($res_name[$i]==$name)
    {
        echo"Нашли => ";
        echo $res_name[$i].'<br>Оно стоит на '.($i + 1).' позиции'."<br>";
        break;
    }
    if($limit == $i){
	echo '<br>Мы не нашли это слово';
}
}
 
echo"<br>Вот массив: ".$mass."<br>";
echo"Слово, которое мы искали: ".$name."<br>";

return $mass;

}

function quotient2()
{
	$replace = $_POST['number3'];
    $replace1 = $_POST['number4'];
    $oof = quotient1();
	$replace2 = str_replace($replace, $replace1, $oof);
    echo '<br>'.'Был массив: '.$oof.'<br>';
	echo 'Стал: '.$replace2;
}

if(array_key_exists('submit',$_POST)){
   quotient();
}

if(array_key_exists('submit1',$_POST)){
   quotient1();
}

if(array_key_exists('submit2',$_POST)){
   quotient2();
}

echo "<br`><br><br><a href='index.php'> К содержанию </a>";
?>
</body>
</html>