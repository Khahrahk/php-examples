<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css">
    <meta charset="utf-8">
    <title>
        Комната
    </title>

</head>
<body>
<div class="oof">
    <form method="post" action="">
        <br>Пол:
        М<input type="radio" name="gender" value="Мужской">
        Ж<input type="radio" name="gender" value="Женский">
        <br><br><input type="submit" name="submit"/>
    </form>

</div>


<?php

class Human
{
    private $gender;


    public function __construct($gender)
    {
        $this->gender = $gender;
    }

    public function __destruct()
    {
        echo "<br>Деструктор выполнен";
    }


    public function showAll()
    {
        echo "<dl>";
        echo "<dt>Ваш пол: </dt><dd>$this->gender</dd><br>";
        echo "</dl>";
    }

    public function Form()
    {
        if ($this->gender == 'Женский') {
            echo <<<HERE
<div class="oof">
    <form method="post" action="">
        <br><br>Имя: <input type="text" name="firstname"/>
        <br><br>Фамилия: <input type="text" name="lastname"/>
        <br><br>Специальность: <input type="text" name="speciality"/>
        <br><br>Группа: <input type="text" name="group"/>
        <br><br>Рост: <input type="text" name="height"/>
        <br><br>Ваши оценки: <br>
        Математика<input type="number" min="1" max="5" name="ocenka"/>
        <br>Русский язык<input type="number" min="1" max="5" name="ocenka1"/>
        <br><br><input type="submit" name="submit1"/>
    </form>
</div>
HERE;
        } else {
            echo <<<HERE
<div class="oof">
    <form method="post" action="">
        <br><br>Имя: <input type="text" name="firstname"/>
        <br><br>Фамилия: <input type="text" name="lastname"/>
        <br><br>Специальность: <input type="text" name="speciality"/>
        <br><br>Группа: <input type="text" name="group"/>
        <br><br>Вид спорта: <input type="text" name="sport"/>
        <br><br>Ваши оценки: <br>
        Математика <input type="number" min="1" max="5" name="ocenka"/>
        <br>Русский язык <input type="number" min="1" max="5" name="ocenka1"/>
        <br><br><input type="submit" name="submit2"/>
    </form>
</div>
HERE;
        }
    }
}

class Girl extends Human
{

    private $firstname, $lastname, $speciality, $group, $height, $ocenka, $ocenka1;

    public function __construct($firstname, $lastname, $speciality, $group, $height, $ocenka, $ocenka1)
    {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->speciality = $speciality;
        $this->group = $group;
        $this->height = $height;
        $this->ocenka = $ocenka;
        $this->ocenka1 = $ocenka1;
    }

    public function __destruct()
    {
        echo "<br>Деструктор выполнен";
    }

    public function showAll()
    {
        echo "<dl>";
        echo "<dt>Имя: </dt><dd>$this->firstname</dd><br>";
        echo "<dt>Фамилия: </dt><dd>$this->lastname</dd><br>";
        echo "<dt>Специальность: </dt><dd>$this->speciality</dd><br>";
        echo "<dt>Группа: </dt><dd>$this->group</dd><br>";
        echo "<dt>Рост: </dt><dd>$this->height</dd><br>";
        echo "<dt>Оценка по математике: </dt><dd>$this->ocenka</dd><br>";
        echo "<dt>Оценка по русскому: </dt><dd>$this->ocenka1</dd><br>";
        echo "</dl>";
    }

    function Result()
    {
        $str = "Имя: $this->firstname" . PHP_EOL .
            "Фамилия: $this->lastname" . PHP_EOL .
            "Специальность: $this->speciality" . PHP_EOL .
            "Группа: $this->group" . PHP_EOL .
            "Рост: $this->height" . PHP_EOL .
            "Оценка по математике: $this->ocenka" . PHP_EOL .
            "Оценка по русскому: $this->ocenka1" . PHP_EOL;
        ($fp = fopen("девушки.txt", "a+"));
        fwrite($fp, $str);
        fclose($fp);
    }

}

class Boy extends Human
{

    private $firstname, $lastname, $speciality, $group, $sport, $ocenka, $ocenka1;

    public function __construct($firstname, $lastname, $speciality, $group, $sport, $ocenka, $ocenka1)
    {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->speciality = $speciality;
        $this->group = $group;
        $this->sport = $sport;
        $this->ocenka = $ocenka;
        $this->ocenka1 = $ocenka1;
    }

    public function __destruct()
    {
        echo "<br>Деструктор выполнен";
    }

    public function showAll()
    {
        echo "<dl>";
        echo "<dt>Имя: </dt><dd>$this->firstname</dd><br>";
        echo "<dt>Фамилия: </dt><dd>$this->lastname</dd><br>";
        echo "<dt>Специальность: </dt><dd>$this->speciality</dd><br>";
        echo "<dt>Группа: </dt><dd>$this->group</dd><br>";
        echo "<dt>Вид спорта: </dt><dd>$this->sport</dd><br>";
        echo "<dt>Оценка по математике: </dt><dd>$this->ocenka</dd><br>";
        echo "<dt>Оценка по русскому: </dt><dd>$this->ocenka1</dd><br>";
        echo "</dl>";
    }

    function Result()
    {
        $str = "Имя: $this->firstname" . PHP_EOL .
            "Фамилия: $this->lastname" . PHP_EOL .
            "Специальность: $this->speciality" . PHP_EOL .
            "Группа: $this->group" . PHP_EOL .
            "Рост: $this->height" . PHP_EOL .
            "Оценка по математике: $this->ocenka" . PHP_EOL .
            "Оценка по русскому: $this->ocenka1" . PHP_EOL;
        ($fp = fopen("юноши.txt", "a+"));
        fwrite($fp, $str);
        fclose($fp);
    }

}


function oof()
{
    $gender = $_POST['gender'];
    $Human = new Human($gender);
    $Human->showAll();
    $Human->Form();
    unset($Human);
    print_r($Human);
}

function oof1()
{
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $speciality = $_POST['speciality'];
    $group = $_POST['group'];
    $height = $_POST['height'];
    $ocenka = $_POST['ocenka'];
    $ocenka1 = $_POST['ocenka1'];
    $Girl = new Girl($firstname, $lastname, $speciality, $group, $height, $ocenka, $ocenka1);
    $Girl->showAll();
    $Girl->Result();
}

function oof2()
{
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $speciality = $_POST['speciality'];
    $group = $_POST['group'];
    $sport = $_POST['sport'];
    $ocenka = $_POST['ocenka'];
    $ocenka1 = $_POST['ocenka1'];
    $Boy = new Boy($firstname, $lastname, $speciality, $group, $sport, $ocenka, $ocenka1);
    $Boy->showAll();
    $Boy->Result();
}

if (array_key_exists('submit', $_POST)) {
    oof();
}
if (array_key_exists('submit1', $_POST)) {
    oof1();
}
if (array_key_exists('submit2', $_POST)) {
    oof2();
}
?>
</body>
</html>