<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style1.css">
    <meta charset="utf-8">
    <title>
        #6_1
    </title>

</head>
<body>
<div class="oof">
    <?php
    $array = array();
    $path = "dataFile2.txt";
    $fd = fopen($path, 'r') or die("Не удалось");
    $chet = 0;
    $num = $_POST['s'] - 1;

    while (!feof($fd)) {
        $str = htmlentities(fgets($fd));
        array_push($array, $str);
    }
    fclose($fd);

    echo '<form method="post" action="">' . '<select name="s">';
    for ($i = 0; $i < 4; $i++) {
        $chet++;
        list($gorod, $gorod_Text) = explode(" - ", $array[$i]);
        echo "<option value='$chet'>" . "$gorod" . "</option>";
    }
    echo '</select>' . '<input type="submit" name="submit"/>' . '</form>';

    echo $array[$num];
    ?>
</div>
</body>
</html>