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
$db_base = 'cinema'; // Имя БД
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

        <input type="text" name="name" placeholder="Название" class="inputtext">

        <input type="text" name="id_country" placeholder="Страна" class="inputtext">

        <input type="text" name="id_genre" placeholder="Жанр" class="inputtext">

        <input type="text" name="director" placeholder="Режиссер" class="inputtext">

        <input type="text" name="id_actor" placeholder="Актер" class="inputtext">
        
        <input type="number" name="year" placeholder="Год выпуска" class="inputtext">

        <input type="number" name="time" placeholder="Время" class="inputtext">

        <input type="text" name="content" placeholder="Описание" class="inputtext">
        
        <input type="number" name="budget" placeholder="Бюджет" class="inputtext">

        <input type="file" name="poster" placeholder="Постер" class="inputtext">



        <input type="submit" name="submit1" value="Сохранить" class="btn">

    </form>';
}

//$id_movie, $name, $name_country, $name_genre, $director, $name_actor,$year,$time,$content, $budget, $poster, $db

$num = (int)$_POST['num'];
$id_movie = (int)$_POST['id_movie'];
$name = $_POST['name'];
$id_country = (int)$_POST['id_country'];
$id_genre = (int)$_POST['id_genre'];
$director = $_POST['director'];
$id_actor = (int)$_POST['id_actor'];
$year = (int)$_POST['year'];
$time = (int)$_POST['time'];
$content = $_POST['content'];
$budget = $_POST['budget'];
$poster = $_POST['poster'];

function vivesti()
{
    global $db;
    $stmt = $db->query("SELECT * FROM `movies` 
JOIN `countries` ON movies.id_country=countries.id_country
JOIN `genres` ON movies.id_genre=genres.id_genre
JOIN `actor` ON movies.id_actor=actor.id_actor;")->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <table>
    <tr>
        <td>Номер</td>
        <td>Название</td>
        <td>Страна</td>
        <td>Жанр</td>
        <td>Режиссер</td>
        <td>Актер</td>
        <td>Год выпуска</td>
        <td>Время</td>
        <td>Описание</td>
        <td>Бюджет</td>
        <td>Постер</td>
    </tr>
    <?
    foreach ($stmt as $k => $v) {
        ?>
        <tr>
            <td><?php echo $v['id_movie']; ?></td>
            <td><?php echo $v['name']; ?></td>
            <td><?php echo $v['name_country']; ?></td>
            <td><?php echo $v['name_genre']; ?></td>
            <td><?php echo $v['director']; ?></td>
            <td><?php echo $v['name_actor']; ?></td>
            <td><?php echo $v['year']; ?></td>
            <td><?php echo $v['time']; ?></td>
            <td><?php echo $v['content']; ?></td>
            <td><?php echo $v['budget']; ?></td>
            <td><img src="<?php echo $v['poster']; ?>"></td>
        </tr>
        <?php
    }
    ?></table><?
}

function dobavit1($id_movie, $name, $id_country, $id_genre, $director, $id_actor, $year, $time, $content, $budget, $poster, $db)
{
    try {
        $db->exec("set names utf8");
        $data = array('name' => $name, 'id_country' => $id_country, 'id_genre' => $id_genre, 'director' => $director,
            'id_actor' => $id_actor, 'year' => $year, 'time' => $time, 'content' => $content, 'budget' => $budget, 'poster' => $poster);
        // Подготавливаем SQL-запрос
        $query = $db->prepare("INSERT INTO `movies` 
(`id_movie`, `name`, `id_country`, `id_genre`, `director`, `id_actor`, `year` , `time`, `content`, `budget`, `poster`) VALUES 
(NULL, :name, :id_country, :id_genre, :director, :id_actor, :year, :time, :content, :budget, :poster)");
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
    print_r($data);
    echo $name;
}

function udalit1()
{
    echo
    '<form action="#" method="post">

        <input type="text" name="num" placeholder="Введите число записи" class="inputtext">
        <input type="submit" name="submit5" value="Удалить" class="btn">

    </form>';
}

function udalit2($name, $id_country, $id_genre, $director, $id_actor, $year, $time, $content, $budget, $poster, $db, $num)
{
    try {
        $db->exec("set names utf8");
        $data = array('name' => $name, 'id_country' => $id_country, 'id_genre' => $id_genre, 'director' => $director,
            'id_actor' => $id_actor, 'year' => $year, 'time' => $time, 'content' => $content, 'budget' => $budget, 'poster' => $poster);
        // Подготавливаем SQL-запрос
        $query = $db->prepare("DELETE FROM `movies` WHERE `id_movie` = '$num'");
        // Выполняем запрос с данными
        $query->execute($data);
        // Запишим в переменую, что запрос отрабтал
        $result = true;
    } catch (PDOException $e) {
        // Если есть ошибка соединения или выполнения запроса, выводим её
        print "Ошибка!: " . $e->getMessage() . "<br/>";
    }
    if ($result) {
        echo "Вы успешно удалили запись";
    }
}

function redaktirovat1($num)
{
    echo
    '<form action="#" method="post">

        <input type="text" name="num" placeholder="Номер" class="inputtext">
        
        <input type="text" name="name" placeholder="Название" class="inputtext">

        <input type="text" name="id_country" placeholder="Страна" class="inputtext">

        <input type="text" name="id_genre" placeholder="Жанр" class="inputtext">

        <input type="text" name="director" placeholder="Режиссер" class="inputtext">

        <input type="text" name="id_actor" placeholder="Актер" class="inputtext">
        
        <input type="number" name="year" placeholder="Год выпуска" class="inputtext">

        <input type="number" name="time" placeholder="Время" class="inputtext">

        <input type="text" name="content" placeholder="Описание" class="inputtext">
        
        <input type="number" name="budget" placeholder="Бюджет" class="inputtext">

        <input type="file" name="poster" placeholder="Постер" class="inputtext">

        <input type="submit" name="submit3" value="Сохранить" class="btn">

    </form>';
    return $num;
}

function redaktirovat2($name, $id_country, $id_genre, $director, $id_actor, $year, $time, $content, $budget, $poster, $db, $num)
{
    try {
        $db->exec("set names utf8");
        $query = $db->prepare("
UPDATE `movies` 
SET `name` = :name, `id_country` = :id_country, `id_genre` = :id_genre, `director` = :director, `id_actor` = :id_actor, `year` = :year, `time` = :time,
`content` = :content, `budget` = :budget, `poster` = :poster
WHERE `id_movie` = '$num'");

        $data = array('name' => $name, 'id_country' => $id_country, 'id_genre' => $id_genre, 'director' => $director,
            'id_actor' => $id_actor, 'year' => $year, 'time' => $time, 'content' => $content, 'budget' => $budget, 'poster' => $poster);
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

if (array_key_exists('submit1', $_POST)) {
    dobavit1($id_movie, $name, $id_country, $id_genre, $director, $id_actor, $year, $time, $content, $budget, $poster, $db);
}
if (array_key_exists('dobavit', $_POST)) {
    dobavit();
}
if (array_key_exists('udalit', $_POST)) {
    udalit1();
}
if (array_key_exists('redaktirovat', $_POST)) {
    redaktirovat1($num);
}
if (array_key_exists('submit3', $_POST)) {
    redaktirovat2($name, $id_country, $id_genre, $director, $id_actor, $year, $time, $content, $budget, $poster, $db, $num);
}
if (array_key_exists('submit5', $_POST)) {
    udalit2($name, $id_country, $id_genre, $director, $id_actor, $year, $time, $content, $budget, $poster, $db, $num);
}
if (array_key_exists('vivesti', $_POST)) {
    vivesti();
}
?>
</body>
</html>
