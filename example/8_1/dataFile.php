<?php

$host = 'localhost';  // Хост, у нас все локально
$user = 'root';    // Имя созданного вами пользователя
$pass = 'root'; // Установленный вами пароль пользователю
$db_name = 'proverka';   // Имя базы данных
$link = mysqli_connect($host, $user, $pass, $db_name); // Соединяемся с базой

// Ругаемся, если соединение установить не удалось
if (!$link) {
    echo 'Не могу соединиться с БД. Код ошибки: ' . mysqli_connect_errno() . ', ошибка: ' . mysqli_connect_error();
    exit;
}

//Если переменная First_name передана
if (isset($_POST["Имя"])) {
    //Если это запрос на обновление, то обновляем
    if (isset($_GET['update'])) {
        $sql = mysqli_query($link, "UPDATE `test1` SET `First_name` = '{$_POST['Имя']}',`Last_name` = '{$_POST['Фамилия']}', `When` = '{$_POST['Дата']}', `Email` = '{$_POST['Емаил']}', `Message` = '{$_POST['Сообщение']}' WHERE `ID`={$_GET['update']}");
    } else {
        //Иначе вставляем данные, подставляя их в запрос
        $sql = mysqli_query($link, "INSERT INTO `test1` (`First_name`, `Last_name`, `When`, `Email`, `Message`) VALUES ('{$_POST['Имя']}', '{$_POST['Фамилия']}', '{$_POST['Дата']}', '{$_POST['Емаил']}', '{$_POST['Сообщение']}')");
    }

    //Если вставка прошла успешно
    if ($sql) {
        echo '<p>Успешно!</p>';
        echo("<meta http-equiv='refresh' content='0'>");
    } else {
        echo '<p>Произошла ошибка: ' . mysqli_error($link) . '</p>';
    }
}

//Если передана переменная update, то надо обновлять данные. Для начала достанем их из БД
if (isset($_GET['update'])) {
    $sql = mysqli_query($link, "SELECT `ID`, `First_name`, `Last_name`, `When`, `Email`, `Message` FROM `test1` WHERE `ID`={$_GET['update']}");
    $product = mysqli_fetch_array($sql);
}


?>