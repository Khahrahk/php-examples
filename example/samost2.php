<!doctype HTML>
<html>
<head>
<title>Самостоятельная 2 Безденежных Виктор Евгеньевич ВБ-335к</title>
<meta charset="utf-8">
</head>
<body>
<?php
$count = 1;
$count1 = 0;

$FIO1 = array(
    'Говорухина' => array(
        'Имя' => "Мария", 'Рост' => 140, 'Вес' => 40, 'Стоимость заказа' => 550 
         ), 
     'Шишкова' => array(
        'Имя' => "Алена", 'Рост' => 150, 'Вес' => 45, 'Стоимость заказа' => 600
         )
);

$FIO = array(
    'Вохминцев' => array(
        'Имя' => "Сергей", 'Рост' => 170, 'Вес' => 80, 'Стоимость заказа' => 450 
         ), 
     'Гульдяев' => array(
        'Имя' => "Артём", 'Рост' => 160, 'Вес' => 65, 'Стоимость заказа' => 470
         ),
     'Зимин'  => array(
         'Имя' => "Никита", 'Рост' => 165, 'Вес' => 60, 'Стоимость заказа' => 350
         ),
     'Махнёв'  => array(
         'Имя' => "Филипп", 'Рост' => 178, 'Вес' => 68, 'Стоимость заказа' => 500
         ),
     'Морозов'  => array(
         'Имя' => "Виталий", 'Рост' => 182, 'Вес' => 75, 'Стоимость заказа' => 520
         ),
     'Пестов'  => array(
         'Имя' => "Юрий", 'Рост' => 180, 'Вес' => 80, 'Стоимость заказа' => 485
         ),
     'Соснин'  => array(
         'Имя' => "Сергей", 'Рост' => 160, 'Вес' => 61, 'Стоимость заказа' => 510
         ),
     'Столбин'  => array(
         'Имя' => "Сергей", 'Рост' => 192, 'Вес' => 80, 'Стоимость заказа' => 490
         ),
     'Токарев'  => array(
         'Имя' => "Юрий", 'Рост' => 157, 'Вес' => 50, 'Стоимость заказа' => 480
         ),
     'Третьяков'  => array(
         'Имя' => "Владимир", 'Рост' => 170, 'Вес' => 85, 'Стоимость заказа' => 460
         ),
     'Филиппов'  => array(
         'Имя' => "Дмитрий", 'Рост' => 181, 'Вес' => 75, 'Стоимость заказа' => 300
         )
); 

$arr3 = array_merge($FIO, $FIO1);

$stoliki = array_chunk($arr3, 4);
foreach ($stoliki as $key => $value) {
echo "<br>Номер столика:".($key + 1)."<br><br>  ";
foreach ($value as $klych => $znach) {
    echo '<br>';
foreach ($znach as $klychTwo => $znachTwo) {
echo $klychTwo." => ".$znachTwo."<br>";
    if ($znachTwo == 'Юрий'){
        echo '<u>Поздравляем Юрия!!!</u><br>';
    }
    if($znachTwo == 'Сергей') $count1++;
}
}
}

$new_array = array();
$new_array1 = array();
$new_array2 = array();
$new_array3 = array();
$new_array4 = array();
$new_array5 = array();
$new_array6 = array();

foreach ($FIO as $k => $v) {
    $new_array[$v['Стоимость заказа']] = array($k);
}

foreach ($FIO as $k => $v) {
    $new_array3[$v['Имя']] = array($k);
}

foreach ($FIO as $k => $v) {
    $new_array2[$v['Рост']] = array($k);
}

foreach ($FIO as $k => $v) {
    $new_array5[$v['Вес']] = array($k);
}

echo '<br><br>';

foreach ($new_array as $rate => $v) {
    array_push($new_array1, $rate);
}

foreach ($new_array2 as $rate => $v) {
    array_push($new_array4, $rate);
}


foreach ($new_array5 as $rate => $v) {
    array_push($new_array6, $rate);
}


echo "Стоимость по возрастанию";

asort($new_array1);
foreach ($new_array1 as $rate => $v) {
print_r('<br>'.$v);
}

echo "<br>Неповторяющиеся имена";
foreach ($new_array3 as $rate => $v){
echo ('<br>'.$rate);
}
echo '<br>';

foreach ($new_array2 as $rate => $v) {
$result = (max($new_array4));
}

foreach ($new_array5 as $rate => $v) {
$result1 = (max($new_array6));
}

foreach ($new_array as $rate => $v) {

    if ($rate == max($new_array1)){
        echo '<br> Самый богатый покупатель: '.$v[0].'<br>Он купил товара на '.max($new_array1).' рублей';
    }
    if ($rate == min($new_array1)){
        echo '<br> Самый бедный покупатель: '.$v[0].'<br>Он купил товара на '.min($new_array1).' рублей';
    }

}

echo '<br>';

foreach ($new_array as $rate => $v) {

echo '<br> Цена с учетом чаевых: '.($rate + ($rate / 10));

}

echo '<br>';

foreach ($new_array2 as $rate => $v) {
    if($result == $rate){
        echo "<br>"."Имя высокого ".$v[0]." рост ".(max($new_array4));
    }
}

foreach ($new_array5 as $rate => $v) {
    if($result1 == $rate){
        echo "<br>"."Имя худого ".$v[0]." вес ".(min($new_array6));
    }
}

    echo '<br>Сергеи получили '.$count1.' подарка';
    echo "<br><br><br><a href='index.php'> К содержанию </a>";
?>

</body>
</html>