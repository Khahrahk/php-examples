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
    .btn {
        display: inline-block; /* Строчно-блочный элемент */
        background: #8C959D; /* Серый цвет фона */
        color: #fff; /* Белый цвет текста */
        padding: 1rem 1.5rem; /* Поля вокруг текста */
        text-decoration: none; /* Убираем подчёркивание */
        border-radius: 3px; /* Скругляем уголки */
    }
</style>
<?php

$host = 'localhost';
$db = 'dogs';
$user = 'root';
$pass = 'root';
$charset = 'utf8';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$opt = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];
$pdo = new PDO($dsn, $user, $pass, $opt);
try {
    $dbh = new PDO(($dsn), $user, $pass, $opt);
} catch (PDOException $e) {
    die('Подключение не удалось: ' . $e->getMessage());
}

echo '<a href="final.php" class="btn">Панель администратора</a>';


echo '<p>' . '----------------------------------------------------' . '</p>';
echo '<p>' . 'Первое задание' . '</p>';
echo '<p>' . 'Вывести первую строчку' . '</p>';
echo '<p>' . '----------------------------------------------------' . '</p>';
$stmt = $pdo->query("SELECT * FROM dog_2019 LIMIT 1")->fetchAll(PDO::FETCH_ASSOC);
foreach ($stmt as $k => $v) {
    echo
        '<br> Номер: ' . $v['Номер'] .
        '<br> Кличка: ' . $v['Кличка'] .
        '<br> Порода: ' . $v['Порода'] .
        '<br> Возраст: ' . $v['Возраст'] . '<br><br><br>';
}
echo '<p>' . '----------------------------------------------------' . '</p>';
echo '<p>' . 'Второе задание' . '</p>';
echo '<p>' . 'Вывести всех собак, чей возраст = 1' . '</p>';
echo '<p>' . '----------------------------------------------------' . '</p>';
$stmt1 = $pdo->query("SELECT * FROM dog_2019")->fetchAll(PDO::FETCH_ASSOC);
foreach ($stmt1 as $k => $v) {
    if ($v['Возраст'] == '1') {
        echo
            '<br> Номер: ' . $v['Номер'] .
            '<br> Кличка: ' . $v['Кличка'] .
            '<br> Порода: ' . $v['Порода'] .
            '<br> Возраст: ' . $v['Возраст'] . '<br><br><br>';
    }
}
echo '<p>' . '----------------------------------------------------' . '</p>';
echo '<p>' . 'Третье задание' . '</p>';
echo '<p>' . 'Вывести всех мопсов' . '</p>';
echo '<p>' . '----------------------------------------------------' . '</p>';
$stmt2 = $pdo->query("SELECT * FROM dog_2019")->fetchAll(PDO::FETCH_ASSOC);
foreach ($stmt2 as $k => $v) {
    if ($v['Порода'] == 'Мопс') {
        echo
            '<br> Номер: ' . $v['Номер'] .
            '<br> Кличка: ' . $v['Кличка'] .
            '<br> Порода: ' . $v['Порода'] .
            '<br> Возраст: ' . $v['Возраст'] . '<br><br><br>';
    }
}
echo '<p>' . '----------------------------------------------------' . '</p>';
echo '<p>' . 'Четвертое задание' . '</p>';
echo '<p>' . 'Вывести всех собак' . '</p>';
echo '<p>' . '----------------------------------------------------' . '</p>';
$stmt3 = $pdo->query("SELECT * FROM dog_2019")->fetchAll(PDO::FETCH_ASSOC);
foreach ($stmt3 as $k => $v) {
    echo
        '<br> Номер: ' . $v['Номер'] .
        '<br> Кличка: ' . $v['Кличка'] .
        '<br> Порода: ' . $v['Порода'] .
        '<br> Возраст: ' . $v['Возраст'] . '<br><br><br>';
}
echo '<p>' . '----------------------------------------------------' . '</p>';
echo '<p>' . 'Пятое задание' . '</p>';
echo '<p>' . 'Вывести всех ротвейлеров' . '</p>';
echo '<p>' . '----------------------------------------------------' . '</p>';
$stmt4 = $pdo->query("SELECT * FROM dog_2019")->fetchAll(PDO::FETCH_ASSOC);
foreach ($stmt4 as $k => $v) {
    if ($v['Порода'] == 'Ротвейлер') {
        echo
            '<br> Номер: ' . $v['Номер'] .
            '<br> Кличка: ' . $v['Кличка'] .
            '<br> Порода: ' . $v['Порода'] .
            '<br> Возраст: ' . $v['Возраст'] . '<br><br><br>';
    }
}
echo '<p>' . '----------------------------------------------------' . '</p>';
echo '<p>' . 'Шестое задание' . '</p>';
echo '<p>' . 'Вывести породу собаки по имени Чижик' . '</p>';
echo '<p>' . '----------------------------------------------------' . '</p>';
$stmt5 = $pdo->query("SELECT * FROM dog_2019")->fetchAll(PDO::FETCH_ASSOC);
foreach ($stmt5 as $k => $v) {
    if ($v['Кличка'] == 'Чижик') {
        echo
            '<br> Порода: ' . $v['Порода'] . '<br><br><br>';
    }
}
echo '<p>' . '----------------------------------------------------' . '</p>';
echo '<p>' . 'Седьмое задание' . '</p>';
echo '<p>' . 'Вывести всех собак старше двух лет' . '</p>';
echo '<p>' . '----------------------------------------------------' . '</p>';
$stmt2 = $pdo->query("SELECT * FROM dog_2019")->fetchAll(PDO::FETCH_ASSOC);
foreach ($stmt2 as $k => $v) {
    if ($v['Возраст'] >= '2') {
        echo
            '<br> Номер: ' . $v['Номер'] .
            '<br> Кличка: ' . $v['Кличка'] .
            '<br> Порода: ' . $v['Порода'] .
            '<br> Возраст: ' . $v['Возраст'] . '<br><br><br>';
    }
}
echo '<p>' . '----------------------------------------------------' . '</p>';
echo '<p>' . 'Восьмое задание' . '</p>';
echo '<p>' . 'Вывести возраст Бобика' . '</p>';
echo '<p>' . '----------------------------------------------------' . '</p>';
$stmt2 = $pdo->query("SELECT * FROM dog_2019")->fetchAll(PDO::FETCH_ASSOC);
foreach ($stmt2 as $k => $v) {
    if ($v['Кличка'] == 'Бобик') {
        echo
            '<br> Возраст: ' . $v['Возраст'] . '<br><br><br>';
    }
}
echo '<p>' . '----------------------------------------------------' . '</p>';
echo '<p>' . 'Девятое задание' . '</p>';
echo '<p>' . 'Вывести на страничку кличку Американского кокер спаниеля. ' . '</p>';
echo '<p>' . '----------------------------------------------------' . '</p>';
$stmt2 = $pdo->query("SELECT * FROM dog_2019")->fetchAll(PDO::FETCH_ASSOC);
foreach ($stmt2 as $k => $v) {
    if ($v['Порода'] == 'Американский кокер спаниэль') {
        echo
            '<br> Кличка: ' . $v['Кличка'] . '<br><br><br>';
    }
}
echo '<p>' . '----------------------------------------------------' . '</p>';
echo '<p>' . 'Десятое задание' . '</p>';
echo '<p>' . 'Вывести на страничку кличку Биглей и их количество. ' . '</p>';
echo '<p>' . '----------------------------------------------------' . '</p>';
$count = 0;
$stmt2 = $pdo->query("SELECT * FROM dog_2019")->fetchAll(PDO::FETCH_ASSOC);
foreach ($stmt2 as $k => $v) {
    if ($v['Порода'] == 'Бигль') {
        echo
            '<br> Кличка: ' . $v['Кличка'] . '<br><br>';
        $count++;
    }
}
echo 'Количество Биглей: ' . $count;


echo '<p>' . '----------------------------------------------------' . '</p>';
echo 'Второе';
echo '<p>' . '----------------------------------------------------' . '</p>';


$stmtt1 = $pdo->query("SELECT * FROM `dog_2019`")->fetchAll(PDO::FETCH_ASSOC);

foreach ($stmtt1 as $k => $v) { echo $v['name'];
?>

    <table>
        <tr>
            <td>Номер</td><td>Кличка</td><td>Порода</td><td>Возраст</td><td>Хозяин</td><td>Фото</td>
        </tr>
        <tr>
            <td><?php  echo $v['Номер'];  ?></td><td><?php  echo $v['Кличка'];  ?></td>
            <td><?php  echo $v['Порода'];  ?></td><td><?php  echo $v['Возраст'];  ?></td>
            <td><?php  echo $v['hozain'];  ?></td><td><img src="<?php  echo $v['Photo'];  ?>"></td>
        </tr>
    </table>
<?php }

$stmtt22 = $pdo->query("SELECT `Порода`, COUNT('Номер') AS 'Количество' FROM `dog_2019` GROUP BY Порода")->fetchAll(PDO::FETCH_ASSOC);
?>
<table>
    <tr>
        <td>Кличка</td><td>Количество</td>
    </tr>
<?php
foreach ($stmtt22 as $k => $v) { echo $v['name'];
    ?>
        <tr>
            <td><?php  echo $v['Порода'];  ?></td>
            <td><?php  echo $v['Количество'];  ?></td>
        </tr>
<?php }
?>
</table>


<form action="#" method="post">
    <h2>Показать собак по породе</h2>
    <br><br>
    <? $dog1 = $pdo->query("SELECT DISTINCT Порода FROM `dog_2019`;")->fetchAll(PDO::FETCH_ASSOC); ?>
    <p><select size="10" name="dog1">
            <option disabled>Выберите породу</option>
            <? foreach ($dog1

            as $k => $v) { ?>
            <option value="<? echo $v['Порода'] ?>"><? echo $v['Порода'];
                } ?></option>
        </select></p>
    <input type="submit" name="oof1" value="Вывести" class="btn">
</form>


<?php
$oof = $_POST['dog1'];
function oof1($pdo, $oof){
$stmtt22 = $pdo->query("SELECT * FROM `dog_2019` WHERE `Порода` = '$oof'")->fetchAll(PDO::FETCH_ASSOC);
?>
<table>
    <tr>
        <td>Номер</td><td>Кличка</td><td>Порода</td><td>Возраст</td><td>Хозяин</td><td>Фото</td>
    </tr>
    <?php
    foreach ($stmtt22 as $k => $v) { echo $v['name'];
        ?>
        <tr>
            <td><?php  echo $v['Номер'];  ?></td><td><?php  echo $v['Кличка'];  ?></td>
            <td><?php  echo $v['Порода'];  ?></td><td><?php  echo $v['Возраст'];  ?></td>
            <td><?php  echo $v['hozain'];  ?></td><td><img src="<?php  echo $v['Photo'];  ?>"></td>
        </tr>
    <?php }
    }
    ?>
</table>

<form action="#" method="post">
    <h2>Показать собаку по номеру</h2>
    <br><br>
    <input type="text" name="oof2" placeholder="Введите число записи" class="inputtext">
    <input type="submit" name="oof3" value="Вывести" class="btn">
</form>

<?php


$oof2 = $_POST['oof2'];
function oof2($pdo, $oof2){
$stmtt22 = $pdo->query("SELECT * FROM `dog_2019` WHERE `Номер` = '$oof2'")->fetchAll(PDO::FETCH_ASSOC);
?>
<table>
    <tr>
        <td>Номер</td><td>Кличка</td><td>Порода</td><td>Возраст</td><td>Хозяин</td><td>Фото</td>
    </tr>
    <?php
    foreach ($stmtt22 as $k => $v) { echo $v['name'];
        ?>
        <tr>
            <td><?php  echo $v['Номер'];  ?></td><td><?php  echo $v['Кличка'];  ?></td>
            <td><?php  echo $v['Порода'];  ?></td><td><?php  echo $v['Возраст'];  ?></td>
            <td><?php  echo $v['hozain'];  ?></td><td><img src="<?php  echo $v['Photo'];  ?>"></td>
        </tr>
    <?php }
    }
    ?>
</table>


</body>
</html>
    <?
    if (array_key_exists('oof1', $_POST)) {
        oof1($pdo, $oof);
    }
    if (array_key_exists('oof3', $_POST)) {
        oof2($pdo, $oof2);
    }
?>
