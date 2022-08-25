<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css">
    <meta charset="utf-8">
    <title>
        Человек
    </title>

</head>
<body>
<div class="oof">
    <form method="post" action="">
        <br>Имя: <input type="text" name="name"/>
        <br>Фамилия: <input type="text" name="lastname"/>
        <br>Пол:
        М<input type="radio" name="gender" value="Мужской">
        Ж<input type="radio" name="gender" value="Женский">
        <br>Дата рождения: <input type="date" name="born"/>
        <br>Рост: <input type="text" name="height"/>
        <br>Вес: <input type="text" name="weight"/>
        <input type="submit" name="submit"/>
    </form>

</div>


<?php

class Member
{
    private $username, $last_Name, $gender, $born, $height, $weight;


    public function __construct($username, $last_Name, $gender, $born, $height, $weight)
    {
        $this->username = $username;
        $this->last_Name = $last_Name;
        $this->gender = $gender;
        $this->born = $born;
        $this->height = $height;
        $this->weight = $weight;
    }

    public function __destruct()
    {
        echo "Деструктор выполнен";
    }

    public function showName()
    {
        echo "<dl>";
        echo "<dt>Имя: </dt><dd>$this->username</dd><br>";
        echo "<dt>Фамилия: </dt><dd>$this->last_Name</dd>";
        echo "</dl>";
    }

    public function showAll()
    {
        echo "<dl>";
        echo "<dt>Пол: </dt><dd>$this->gender</dd><br>";
        echo "<dt>Дата рождения: </dt><dd>$this->born</dd><br>";
        echo "<dt>Рост: </dt><dd>$this->height</dd><br>";
        echo "<dt>Вес: </dt><dd>$this->weight</dd>";
        echo "</dl>";
    }

    public function vozrast()
    {
        $vozr = date("Y/m/d") - $this->born;
        echo "<dt>Ваш возраст: </dt><dd>$vozr</dd><br>";
    }


    public function Brok()
    {
        if($this->vozrast() <= 40) {
            $ves = $this->height - 110;
            echo "<dt>Идеальный вес по Броку: </dt><dd>$ves</dd><br>";
        } else {
            $ves = $this->height - 100;
            echo "<dt>Идеальный вес по Броку: </dt><dd>$ves</dd><br>";
        }
    }

    public function Cooper()
    {
        if($this->gender == 'Женский') {
            $ves = ($this->height * 3.5 / 2.54 - 108) * 0.453;
            echo "<dt>Идеальный вес по Куперу: </dt><dd>$ves</dd><br>";
        } else {
            $ves = floor(($this->height * 4 / 2.54 - 108) * 0.453);
            echo "<dt>Идеальный вес по Куперу: </dt><dd>$ves</dd><br>";
        }
    }
}

function oof()
{
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $gender = $_POST['gender'];
    $born = $_POST['born'];
    $height = $_POST['height'];
    $weight = $_POST['weight'];
    $aMember = new Member($name, $lastname, $gender, $born, $height, $weight);
    $aMember->showName();
    $aMember->showAll();
    $aMember->vozrast();
    $aMember->Brok();
    $aMember->Cooper();
    unset($aMember);
    print_r($aMember);
}

if (array_key_exists('submit', $_POST)) {
    oof();
}
?>
</body>
</html>
