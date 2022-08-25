<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css">
    <meta charset="utf-8">
    <title>
        Студент
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
        <br>Возраст: <input type="number" name="born"/>
        <br>Рост: <input type="text" name="height"/>
        <br>Название группы: <input type="text" name="group"/>
        <br>Здоровье:
        Плохое<input type="radio" name="zdorov" value="Плохое">
        Хорошее<input type="radio" name="zdorov" value="Хорошее">
        <input type="submit" name="submit"/>
    </form>

</div>


<?php

class Member
{
    private $username, $last_Name, $gender, $born, $height, $zdorov, $group;


    public function __construct($username, $last_Name, $gender, $born, $height, $zdorov, $group)
    {
        $this->username = $username;
        $this->last_Name = $last_Name;
        $this->gender = $gender;
        $this->born = $born;
        $this->height = $height;
        $this->zdorov = $zdorov;
        $this->group = $group;
    }

    public function __destruct()
    {
        echo "<br>Деструктор выполнен";
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
        echo "<dt>Здоровье: </dt><dd>$this->zdorov</dd>";
        echo "<dt>Группа: </dt><dd>$this->group</dd>";
        echo "<dt>Возраст: </dt><dd>$this->born</dd>";
        echo "</dl>";
    }


    public function Basket()
    {
        if($this->gender == 'Женский' && $this->height >= 175){
            echo '<br>Подходит для занятий баскетболом';
        }
        elseif($this->gender == 'Мужской' && $this->height >= 180){
            echo '<br>Подходит для занятий баскетболом';
        } else '<br>Не подходит для занятий баскетболом';
    }

    public function Army()
    {
        if($this->gender == 'Мужской' && $this->born >= 18 && $this->zdorov == 'Хорошее'){
            echo '<br>Студент готов к армии';
        } else echo '<br>Студент не готов к армии';
    }
    public function kyrs(){
        $lol = $this->group;
        echo '<br>Студент учится на '.$lol[5].' курсе';
    }
}

function oof()
{
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $gender = $_POST['gender'];
    $born = $_POST['born'];
    $height = $_POST['height'];
    $zdorov = $_POST['zdorov'];
    $group = $_POST['group'];
    $aMember = new Member($name, $lastname, $gender, $born, $height, $zdorov, $group);
    $aMember->showName();
    $aMember->showAll();
    $aMember->kyrs();
    $aMember->Basket();
    $aMember->Army();
    unset($aMember);
    print_r($aMember);
}

if (array_key_exists('submit', $_POST)) {
    oof();
}
?>
</body>
</html>
