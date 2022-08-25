<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style2.css">
    <meta charset="utf-8">
    <title>
        #6_1
    </title>
    <style>
        table {
            font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
            font-size: 14px;
            border-collapse: collapse;
            text-align: center;
        }

        th, td:first-child {
            background: #AFCDE7;
            color: white;
            padding: 10px 20px;
        }

        th, td {
            border-style: solid;
            border-width: 0 1px 1px 0;
            border-color: white;
            width: 80px;
        }

        td {
            background: #D8E6F3;
        }

        th:first-child, td:first-child {
            text-align: left;
        }

        img {
            width: 150px;
            height: 200px;
        }
    </style>
</head>
<body>
<div class="oof">
    <?php

    $myFile = "zakaz.txt";
    $lines = file($myFile);
    echo <<<HERE
	<form action="#" method="post">
			<h2>Работа с файлами</h2>
		<div id="block">
			
			<table>
				<tr><td>Код</td><td>Товар</td><td>Цена</td><td>Фирма</td><td>Фото</td></tr>

HERE;
    for ($i = 0; $i <= 2; $i++) {
        $input = '<input type="submit" name="submit" value="' . $i . '">';
        $str = preg_split("/[\s,]+/", $lines[$i]);
        echo "<tr><td>" . $i . "</td><td>" . $str[0] . "</td><td>" . $str[1] . "</td><td>" . $str[2] . "</td><td>" . "<img src='" . $str[3] . "'>" . "</td></tr>";
    }
    echo <<<HERE
			</table>
			
		</div>

	</form>
<br><br>
HERE;

    $array = array();
    $path = "zakaz.txt";
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
        list($tovar, $cena, $firma, $silka) = explode(", ", $array[$i]);
        echo "<option value='$chet'>" . "$tovar" . "</option>";
    }
    echo '</select>' .
        '<br>Ваше имя: <input type="text" name="name"/>' .
        '<br>Ваша фамилия: <input type="text" name="fam" />' .
        '<br>Количество товара: <input type="number" name="kolvo" min="1" max="100" value="Количество товара"/>' .
        '<br><input type="submit" name="submit"/>' .
        '</form>';

    function oof()
    {
        $timezone = date_default_timezone_get();
        date_default_timezone_set($timezone);
        $date = date('m/d/Y h:i:s', time());
        $file = 'schet.txt';
        $f = fopen($file, 'w');
        fclose($f);
        global $cena, $chet, $array, $tovar, $cena, $firma, $silka, $num;
        $kolvo = $_POST['kolvo'];
        if (!empty($_POST['submit'])) {
            if (!empty($_POST['kolvo'])) {
                if (!empty($_POST['name'])) {
                    if (!empty($_POST['fam'])) {
                        list($tovar, $cena, $firma, $silka) = explode(", ", $array[$num]);
                        $cena1 = $cena * $kolvo;
                        echo '<br>Кассовый чек: ' . $_POST['kolvo'] . '*' . $cena . ' = ' . $cena1;
                        file_put_contents($file, 'Кассовый чек: ' . PHP_EOL . '******************'
                            . PHP_EOL . $tovar . PHP_EOL . $_POST['kolvo'] . '*' . $cena . ' = ' . $cena1
                            . PHP_EOL . '---------------------' . PHP_EOL . 'Итог: '
                            . $cena1 . ' руб.' . PHP_EOL . 'Время покупки: ' . $date
                            , FILE_APPEND | LOCK_EX);
                    } else echo 'Вы не написали фамилию';
                } else echo 'Вы не написали имя';
            } else echo 'Вы не выбрали количество';
        }
    }

    if (array_key_exists('submit', $_POST)) {
        oof();
    }

    ?>
</div>
</body>
</html>