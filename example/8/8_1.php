<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css">
    <meta charset="utf-8">
    <title>
        Работа 8 Безденежных Виктор Евгеньевич
    </title>

</head>
<body>

<form action="#" method="post">
    <h2>Работа с файлами</h2>
    <div id="block">

        <input type="text" name="name" placeholder="Имя" class="name">

        <input type="text" name="family" placeholder="Фамилия" class="name">

        <input type="email" name="email" placeholder="Email" class="email">

        <input type="text" name="messege" placeholder="Сообщение" class="massege">

        <input type="date" name="date" value="">

        <input type="submit" name="submit" value="Сохранить в файл" id="but">

    </div>

</form>

<?php
function Result($name, $family, $email, $messege, $date)
{
    file_put_contents("dataFile.txt", "Имя: $name" . PHP_EOL . "Фамилия: $family" . PHP_EOL . "Email: $email" . PHP_EOL . "Сообщение: $messege" . PHP_EOL . "Дата: $date" . PHP_EOL);

}

if (!empty($_POST['name']) && !empty($_POST['family']) && !empty($_POST['email']) && !empty($_POST['messege']) && !empty($_POST['submit']) && !empty($_POST['date'])) {
    Result($_POST['name'], $_POST['family'], $_POST['email'], $_POST['messege'], $_POST['date']);
}
?>
</body>
</html>