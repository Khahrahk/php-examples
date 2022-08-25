<!doctype HTML>
<html>
<head>
    <?php
    $day = 24;


    $d1 = $_POST['number1'];
    $d2 = $_POST['number2'];
    $secs = strtotime($d1) - strtotime("00:00:00");
    $hours = abs(floor($secs / 3600) + $d2) . ':00';
    if ($hours >= 6 && $hours <= 19) {
        $BackgroundColor = "yellow";
        $color = "black";
        $img = "img6.jpg";
    } else {
        $BackgroundColor = "black";
        $color1 = "white";
        $img = "img5.jpg";
    }
    ?>
    <title>Практика 6 Задача 2 Безденежных Виктор Евгеньевич ВБ-335к</title>
    <meta charset="utf-8">
    <style>
        .layer1 {
            width: 94px;
            height: 50px;
            background: <?=$BackgroundColor?>;
            padding-left: 5px;
            border: 1px solid #ccc;
        }
        .layer2 {
            width: 500px;
            height: 500px;
            background-image: url(<?=$img?>);
            margin-left: 100px;
            border: 1px solid #ccc;
        }
    </style>
</head>
<body>
<form action="samost4.php" method="post">
    <input name="number1" type="text" size="10">
    <input type="range" min="1" max="12" step="1" value="6" name="number2">
    <input type="submit" name="submit" id="submit" value="Получить значение">
</form>
    <div class="layer1"></div>
    <?php
    echo '<p>'.$hours.'</p>';
    ?>
<div class="layer2"></div>
<?php
echo "<br><br><br><a href='index.php'> В начало </a>";
?>
</body>
</html>