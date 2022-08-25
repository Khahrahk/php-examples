<!doctype HTML>
<html>
<head>
<title>Практика 5 Задача 4 Безденежных Виктор Евгеньевич ВБ-335к</title>
<meta charset="utf-8">
</head>
<body>
<?php
$count = 0;
$students = array(
    'Соколов' => array(
        'group' => 335
     ), 
     'Искаков' => array(
        'group' => 335
     ),
     'Безденежных'  => array(
         'group' => 335
     )
); 


foreach($students as $key => $value) {
    echo 'Имя студента: '.$key.'<br />';
    foreach($value as $s_key => $s_value) {
        echo 'Номер группы:  => '.$s_value.'<br />';
        $s_value == $s_value ? $count++ : 0; 
    }
    echo '<br />';
}
    echo "Студентов в ".$s_value." группе: ".$count;
    echo "<br><br><br><a href='index.php'> К содержанию </a>";
?>
</body>
</html>