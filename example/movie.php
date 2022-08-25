<html>
<head>

    <title>Фильмы</title>
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

$num = (int)$_POST['num'];
?>

<?php
$genre = $db->query("SELECT * FROM `genres`;")->fetchAll(PDO::FETCH_ASSOC);
echo '<a href="final1.php" class="btn">Панель администратора</a>';

?>


<form action="#" method="post">
    <h2>Показать фильм по номеру</h2>
    <br><br>
    <input type="text" name="num" placeholder="Введите число записи" class="inputtext">
    <input type="submit" name="vivesti" value="Вывести" class="btn">
</form>

<?
function vivesti($num)
{
    echo '<p>' . '----------------------------------------------------' . '</p>';
    echo '<p>' . 'Выводит запись по номеру' . '</p>';
    echo '<p>' . '----------------------------------------------------' . '</p>';
    global $db;
    $stmt = $db->query("SELECT * FROM `actor_movie`
LEFT JOIN `movies` ON actor_movie.id_movie = movies.id_movie
JOIN `countries` ON movies.id_country=countries.id_country
JOIN `genres` ON movies.id_genre=genres.id_genre
JOIN `actor` ON actor_movie.id_actor=actor.id_actor WHERE actor_movie.id_movie = '$num' LIMIT 1;")->fetchAll(PDO::FETCH_ASSOC);
    $stmt1 = $db->query("SELECT * FROM `actor_movie`
LEFT JOIN `movies` ON actor_movie.id_movie = movies.id_movie
JOIN `countries` ON movies.id_country=countries.id_country
JOIN `genres` ON movies.id_genre=genres.id_genre
JOIN `actor` ON actor_movie.id_actor=actor.id_actor WHERE actor_movie.id_movie = '$num';")->fetchAll(PDO::FETCH_ASSOC);
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
        <tr>
            <?
            $count11 = 0;
            foreach ($stmt

                     as $k => $v) {
            ?>
            <td><?php echo $v['id_movie']; ?></td>
            <td><?php echo $v['name']; ?></td>
            <td><?php echo $v['name_country']; ?></td>
            <td><?php echo $v['name_genre']; ?></td>
            <td><?php echo $v['director']; ?></td>
            <td>
                <?php

                }
                ?>
                <?
                foreach ($stmt1 as $k => $v) {
                    if ($count11 >= 1) {
                        echo ', ';
                    }
                    ?>
                    <?php echo $v['name_actor']; ?>
                    <?
                    $count11++;
                }
                foreach ($stmt

                as $k => $v) {
                ?>
            </td>
            <td><?php echo $v['year']; ?></td>
            <td><?php echo $v['time']; ?></td>
            <td><?php echo $v['content']; ?></td>
            <td><?php echo $v['budget']; ?></td>
            <td><img src="<?php echo $v['poster']; ?>"></td>
        <?
        }
        ?>
        </tr>
    </table>
    <?
}

$i = 0;

function form($i, $v)
{
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
    </table>
    <?
}

function oof($i)
{
    global $db;
    $stmt = $db->query("SELECT * FROM `movies`
JOIN `countries` ON movies.id_country=countries.id_country
JOIN `genres` ON movies.id_genre=genres.id_genre
JOIN `actor` ON movies.id_actor=actor.id_actor;")->fetchAll(PDO::FETCH_ASSOC);
    foreach ($stmt as $k => $v) {
        $i++;
        if ($v['name_genre'] == 'приключения') {
            echo '<p>' . '----------------------------------------------------' . '</p>';
            echo '<p>' . " 1 задание" . '</p>';
            echo '<p>' . " Вывести все приключения" . '</p>';
            echo '<p>' . '----------------------------------------------------' . '</p>';
            form($i, $v);
        } else if ($v['name_country'] == 'Россия' && $v['name_genre'] == 'боевик') {
            echo '<p>' . '----------------------------------------------------' . '</p>';
            echo '<p>' . " 2 задание" . '</p>';
            echo '<p>' . " Вывести все Российские боевики" . '</p>';
            echo '<p>' . '----------------------------------------------------' . '</p>';
            form($i, $v);
        } else if ($v['name_country'] == 'Франция' && $v['name_genre'] == 'комедия') {
            echo '<p>' . '----------------------------------------------------' . '</p>';
            echo '<p>' . " 3 задание" . '</p>';
            echo '<p>' . " Вывести все Французские комедии" . '</p>';
            echo '<p>' . '----------------------------------------------------' . '</p>';
            form($i, $v);
        } else if ($v['year'] >= 1990 && $v['year'] <= 2005) {
            echo '<p>' . '----------------------------------------------------' . '</p>';
            echo '<p>' . " 4 задание" . '</p>';
            echo '<p>' . " Вывести все фильмы с 1990 по 2005 год" . '</p>';
            echo '<p>' . '----------------------------------------------------' . '</p>';
            form($i, $v);
        } else if ($v['time'] <= 100) {
            echo '<p>' . '----------------------------------------------------' . '</p>';
            echo '<p>' . " 5 задание" . '</p>';
            echo '<p>' . " Вывести все фильмы с продолжительностью до полутора часа" . '</p>';
            echo '<p>' . '----------------------------------------------------' . '</p>';
            form($i, $v);
        }
    }
}

function oof1()
{
    global $db;
    $stmt = $db->query("SELECT * FROM `movies`
JOIN `countries` ON movies.id_country=countries.id_country
JOIN `genres` ON movies.id_genre=genres.id_genre
JOIN `actor` ON movies.id_actor=actor.id_actor ORDER BY budget DESC LIMIT 1;")->fetchAll(PDO::FETCH_ASSOC);
    echo '<p>' . '----------------------------------------------------' . '</p>';
    echo '<p>' . " 6 задание" . '</p>';
    echo '<p>' . " Вывести 1 бюджетный фильм" . '</p>';
    echo '<p>' . '----------------------------------------------------' . '</p>';
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

function oof2()
{
    global $db;
    $stmt = $db->query("SELECT name_actor, COUNT(name_actor) AS 'count' FROM `movies`
JOIN `countries` ON movies.id_country=countries.id_country
JOIN `genres` ON movies.id_genre=genres.id_genre
JOIN `actor` ON movies.id_actor=actor.id_actor GROUP BY name_actor;")->fetchAll(PDO::FETCH_ASSOC);
    echo '<p>' . '----------------------------------------------------' . '</p>';
    echo '<p>' . " 7 задание" . '</p>';
    echo '<p>' . " Вывести кол-во фильмов актера" . '</p>';
    echo '<p>' . '----------------------------------------------------' . '</p>';
    ?>
    <table>
        <tr>
            <td>Актер</td>
            <td>Кол-во фильмов</td>
        </tr>
        <?
        foreach ($stmt as $k => $v) {
            ?>
            <tr>
                <td><?php echo $v['name_actor']; ?></td>
                <td><?php echo $v['count']; ?></td>
            </tr>
            <?php
        }
        ?>
    </table>
    <?
}

$genre = $db->query("SELECT * FROM `genres`;")->fetchAll(PDO::FETCH_ASSOC);
?>
<form action="#" method="post">
    <h2>Показать фильм по жанру</h2>
    <br><br>
    <p><select size="10" name="genre1">
            <option disabled>Выберите жанр</option>
            <? foreach ($genre

            as $k => $v) { ?>
            <option value="<? echo $v['name_genre'] ?>"><? echo $v['name_genre'];
                } ?> </option>
        </select></p>
    <input type="submit" name="vivesti_genre" value="Вывести" class="btn">
</form>
<?
function oof6($db)
{
    $genre = $_POST['genre1'];
    echo '<p>' . '----------------------------------------------------' . '</p>';
    echo '<p>' . 'Седьмое задание' . '</p>';
    echo '<p>' . 'Выводит фильмы по выбранному жанру' . '</p>';
    echo '<p>' . '----------------------------------------------------' . '</p>';
    $stmt = $db->query("SELECT * FROM `actor_movie`
LEFT JOIN `movies` ON actor_movie.id_movie = movies.id_movie
JOIN `countries` ON movies.id_country=countries.id_country
JOIN `genres` ON movies.id_genre=genres.id_genre
JOIN `actor` ON actor_movie.id_actor=actor.id_actor;")->fetchAll(PDO::FETCH_ASSOC);
    foreach ($stmt as $k => $v) {
        if ($v['name_genre'] == "$genre") {
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
            </table>
            <?php
        }
    }
}

?>
<form action="#" method="post">
    <h2>Показать фильм по стране</h2>
    <br><br>
    <? $country = $db->query("SELECT * FROM `countries`;")->fetchAll(PDO::FETCH_ASSOC); ?>
    <p><select size="10" name="country1">
            <option disabled>Выберите страну</option>
            <? foreach ($country

            as $k => $v) { ?>
            <option value="<? echo $v['name_country'] ?>"><? echo $v['name_country'];
                } ?></option>
        </select></p>
    <input type="submit" name="vivesti_country" value="Вывести" class="btn">
</form>


<?
function oof7($db)
{
    $country = htmlentities($_POST['country1'], ENT_QUOTES, "UTF-8");
    echo '<p>' . '----------------------------------------------------' . '</p>';
    echo '<p>' . 'Восьмое задание' . '</p>';
    echo '<p>' . 'Выводит фильмы по выбранной стране' . '</p>';
    echo '<p>' . '----------------------------------------------------' . '</p>';
    $stmt = $db->query("SELECT * FROM `actor_movie`
LEFT JOIN `movies` ON actor_movie.id_movie = movies.id_movie
JOIN `countries` ON movies.id_country=countries.id_country
JOIN `genres` ON movies.id_genre=genres.id_genre
JOIN `actor` ON actor_movie.id_actor=actor.id_actor;")->fetchAll(PDO::FETCH_ASSOC);
    foreach ($stmt as $k => $v) {
        if ($v['name_country'] == $country) {
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
            </table>
            <?php
        }
    }
}

?>
<form action="#" method="post">
    <h2>Показать фильм по актеру</h2>
    <br><br>
    <? $actor = $db->query("SELECT * FROM `actor`;")->fetchAll(PDO::FETCH_ASSOC); ?>
    <p><select size="10" name="actor1">
            <option disabled>Выберите актера</option>
            <? foreach ($actor

            as $k => $v) { ?>
            <option value="<? echo $v['name_actor'] ?>"><? echo $v['name_actor'];
                } ?></option>
        </select></p>
    <input type="submit" name="vivesti_actor" value="Вывести" class="btn">
</form>


<?
function oof8($db)
{
    $actor = htmlentities($_POST['actor1'], ENT_QUOTES, "UTF-8");
    echo '<p>' . '----------------------------------------------------' . '</p>';
    echo '<p>' . 'Девятое задание' . '</p>';
    echo '<p>' . 'Выводит фильмы по выбранному актеру' . '</p>';
    echo '<p>' . '----------------------------------------------------' . '</p>';
    $stmt = $db->query("SELECT * FROM `movies` 
JOIN `countries` ON movies.id_country=countries.id_country
JOIN `genres` ON movies.id_genre=genres.id_genre
JOIN `actor` ON movies.id_actor=actor.id_actor;")->fetchAll(PDO::FETCH_ASSOC);
    foreach ($stmt as $k => $v) {
        if ($v['name_actor'] == $actor) {
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
            </table>
            <?php
        }
    }
}


$genre1 = $db->query("SELECT * FROM `genres`;")->fetchAll(PDO::FETCH_ASSOC);
?>
<form action="#" method="post">
    <h2>Показать фильм по жанру и потом по стране</h2>
    <br><br>
    <p><select size="10" name="genre1">
            <option disabled>Выберите жанр</option>
            <? foreach ($genre1

            as $k => $v) { ?>
            <option value="<? echo $v['name_genre'] ?>"><? echo $v['name_genre'];
                } ?> </option>
        </select></p>
    <input type="submit" name="vivesti_genre1" value="Вывести" class="btn">
</form>
<?
function oof100($db)
{
    $genre = htmlentities($_POST['genre1'], ENT_QUOTES, "UTF-8");
    $stmt = $db->query("SELECT * FROM `actor_movie`
LEFT JOIN `movies` ON actor_movie.id_movie = movies.id_movie
JOIN `countries` ON movies.id_country=countries.id_country
JOIN `genres` ON movies.id_genre=genres.id_genre
JOIN `actor` ON actor_movie.id_actor=actor.id_actor;")->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <form action="#" method="post">
        <h2>Показать фильм по стране после жанра</h2>
        <br><br>
        <p><select size="10" name="country1">
                <option disabled>Выберите страну</option>

                <? foreach ($stmt as $k => $v) {
                    if ($v['name_genre'] == $genre) { ?>
                        <option value="<? echo $v['name_country'] ?>"><? echo $v['name_country'];
                            ?></option>
                        <?php
                    }
                }
                ?>
            </select></p>
        <input type="submit" name="vivesti_country1" value="Вывести" class="btn">
    </form>
    <?
}

function oof12($db)
{
    $country = htmlentities($_POST['country1'], ENT_QUOTES, "UTF-8");
    $stmt = $db->query("SELECT * FROM `actor_movie`
LEFT JOIN `movies` ON actor_movie.id_movie = movies.id_movie
JOIN `countries` ON movies.id_country=countries.id_country
JOIN `genres` ON movies.id_genre=genres.id_genre
JOIN `actor` ON actor_movie.id_actor=actor.id_actor;")->fetchAll(PDO::FETCH_ASSOC);
    foreach ($stmt as $k => $v) {
        if ($v['name_country'] == $country) {
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
            </table>
            <?php
        }
    }
}

if (array_key_exists('vivesti', $_POST)) {
    vivesti($num);
    oof($i);
    oof1();
    oof2();
}
if (array_key_exists('vivesti_genre', $_POST)) {
    oof6($db);
}
if (array_key_exists('vivesti_country', $_POST)) {
    oof7($db);
}
if (array_key_exists('vivesti_country1', $_POST)) {
    oof12($db);
}
if (array_key_exists('vivesti_actor', $_POST)) {
    oof8($db);
}
if (array_key_exists('vivesti_genre1', $_POST)) {
    oof100($db);
}
?>
</body>
</html>