<html>
<head>

    <title></title>
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

        .inputtext {
            padding: 10px 5px;
            font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
            font-size: 14px;
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
</head>
<body>
<form action="#" method="post">
    <h2>Панель администратора</h2>
    <br><br>
    <input type="submit" name="vivesti" value="Вывести" class="btn">
    <input type="submit" name="dobavit" value="Добавить запись" class="btn">
    <input type="submit" name="udalit" value="Удалить запись" class="btn">
    <input type="submit" name="redaktirovat" value="Редактировать запись" class="btn">

</form>
<?php
$db_host = "localhost";
$db_user = "root"; // Логин БД
$db_password = "root"; // Пароль БД
$db_base = 'dogs'; // Имя БД
$db_table = "dog_2019"; // Имя Таблицы БД
try {
    // Подключение к базе данных
    $db = new PDO("mysql:host=$db_host;dbname=$db_base", $db_user, $db_password);
    // Устанавливаем корректную кодировку
    $db->exec("set names utf8");
} catch (PDOException $e) {
    // Если есть ошибка соединения, выводим её
    print "Ошибка!: " . $e->getMessage() . "<br/>";
}

function dobavit()
{
    echo
    '<form action="#" method="post">

        <input type="text" name="name" placeholder="Кличка" class="inputtext">

        <input type="text" name="poroda" placeholder="Порода" class="inputtext">

        <input type="number" name="age" placeholder="Возраст" class="inputtext">

        <input type="text" name="hozain" placeholder="Хозяин" class="inputtext">

        <input type="file" name="photo" placeholder="Фото" class="inputtext">

        <input type="submit" name="submit1" value="Сохранить" class="btn">

    </form>';
}

$name = $_POST['name'];
$poroda = $_POST['poroda'];
$age = (int)$_POST['age'];
$hozain = $_POST['hozain'];
$photo = $_POST['photo'];
$num = (int)$_POST['num'];


function vivesti()
{
    global $db;
    $stmt = $db->query("SELECT * FROM `dog_2019`")->fetchAll(PDO::FETCH_ASSOC);
    foreach ($stmt as $k => $v) {
        echo $v['name'];
        ?>
        <table>
            <tr>
                <td>Номер</td>
                <td>Кличка</td>
                <td>Порода</td>
                <td>Возраст</td>
                <td>Хозяин</td>
                <td>Фото</td>
            </tr>
            <tr>
                <td><?php echo $v['Номер']; ?></td>
                <td><?php echo $v['Кличка']; ?></td>
                <td><?php echo $v['Порода']; ?></td>
                <td><?php echo $v['Возраст']; ?></td>
                <td><?php echo $v['hozain']; ?></td>
                <td><img src="<?php echo $v['Photo']; ?>"></td>
            </tr>
        </table>
        <?php
    }
}

function dobavit1($name, $poroda, $age, $hozain, $photo, $db, $db_table)
{
    try {
        $db->exec("set names utf8");
        $data = array('name' => $name, 'poroda' => $poroda, 'age' => $age, 'hozain' => $hozain, 'photo' => $photo);
        // Подготавливаем SQL-запрос
        $query = $db->prepare("INSERT INTO `dog_2019`(`Номер`, `Кличка`, `Порода`, `Возраст`, `hozain`, `Photo`) VALUES (NULL, :name, :poroda, :age, :hozain, :photo)");
        // Выполняем запрос с данными
        $query->execute($data);
        // Запишим в переменую, что запрос отрабтал
        $result = true;
    } catch (PDOException $e) {
        // Если есть ошибка соединения или выполнения запроса, выводим её
        print "Ошибка!: " . $e->getMessage() . "<br/>";
    }
    if ($result) {
        echo "Успех. Информация занесена в базу данных";
    }
}

function udalit1()
{
    echo
    '<form action="#" method="post">

        <input type="text" name="num" placeholder="Введите число записи" class="inputtext">
        <input type="submit" name="submit5" value="Удалить" class="btn">

    </form>';
}

function udalit2($name, $poroda, $age, $hozain, $photo, $db, $db_table, $num)
{
    try {
        $db->exec("set names utf8");
        $data = array('name' => $name, 'poroda' => $poroda, 'age' => $age, 'hozain' => $hozain, 'photo' => $photo, 'num' => $num);
        // Подготавливаем SQL-запрос
        $query = $db->prepare("DELETE FROM `dog_2019` WHERE `Номер` = '$num'");
        // Выполняем запрос с данными
        $query->execute($data);
        // Запишим в переменую, что запрос отрабтал
        $result = true;
    } catch (PDOException $e) {
        // Если есть ошибка соединения или выполнения запроса, выводим её
        print "Ошибка!: " . $e->getMessage() . "<br/>";
    }
    if ($result) {
        echo "Вы успешно изменили запись";
    }
}

function redaktirovat1($db, $num)
{
    echo
    '<form action="#" method="post">
        <input type="text" name="num" placeholder="Введите число записи" class="inputtext">

        <input type="text" name="name" placeholder="Кличка" class="inputtext">

        <input type="text" name="poroda" placeholder="Порода" class="inputtext">

        <input type="number" name="age" placeholder="Возраст" class="inputtext">

        <input type="text" name="hozain" placeholder="Хозяин" class="inputtext">

        <input type="file" name="photo" placeholder="Фото" class="inputtext">

        <input type="submit" name="submit3" value="Сохранить" class="btn">

    </form>';
    return $num;
}

function redaktirovat2($name, $poroda, $age, $hozain, $photo, $db, $db_table, $num)
{
    try {
        $db->exec("set names utf8");
        $query = $db->prepare("
UPDATE `dog_2019` 
SET `Кличка` = :name, `Порода` = :poroda, `Возраст` = '$age', `hozain` = :hozain, `Photo` = :photo
WHERE `Номер` = '$num'");

        $data = array('name' => $name, 'poroda' => $poroda, 'hozain' => $hozain, 'photo' => $photo);
        // Выполняем запрос с данными
        $query->execute($data);
        // Запишим в переменую, что запрос отрабтал
        $result = true;
    } catch (PDOException $e) {
        // Если есть ошибка соединения или выполнения запроса, выводим её
        print "Ошибка!: " . $e->getMessage() . "<br/>";
    }
    if ($result) {
        echo "Вы успешно изменили запись";
        echo '<br>'.$num.'<br>';
        echo $age.'<br>';
        echo $photo.'<br>';
        echo $poroda;
    }
}

if (array_key_exists('submit1', $_POST)) {
    dobavit1($name, $poroda, $age, $hozain, $photo, $db, $db_table);
}
if (array_key_exists('dobavit', $_POST)) {
    dobavit();
}
if (array_key_exists('udalit', $_POST)) {
    udalit1();
}
if (array_key_exists('redaktirovat', $_POST)) {
    redaktirovat1($db, $num);
}
if (array_key_exists('submit3', $_POST)) {
    redaktirovat2($name, $poroda, $age, $hozain, $photo, $db, $db_table, $num);
}
if (array_key_exists('submit5', $_POST)) {
    udalit2($name, $poroda, $age, $hozain, $photo, $db, $db_table, $num);
}
if (array_key_exists('vivesti', $_POST)) {
    vivesti();
}
?>
</body>
</html>
