<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css">
    <meta charset="utf-8">
    <title>
    </title>

</head>
<body>
<div class="oof">
    <form method="post" action="">
        <br>Имя: <input type="text" name="name"/>
        <br>Возраст: <input type="text" name="vozr"/>
        <br>Уровень жизненной энергии: <input type="number" min="1" max="100" name="energy"/>
        <br>Уровень силы: <input type="number" min="1" max="100" name="strong"/>
        <br>Уровень силы: <input type="text" id="myTextField" min="1" max="100" name="strong"/>
        <br>Показать информацию<input type="submit" name="submit"/>
        <br>Подкрепиться<input type="submit" name="submit1"/>
    </form>
</div>
<br>
<?php

abstract class User
{
    private $name;

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    // Абстрактный метод без тела:
    abstract public function increaseRevenue($value);
}

class Student extends User
{
    private $scholarship; // стипендия

    public function getScholarship()
    {
        return $this->scholarship;
    }

    public function setScholarship($scholarship)
    {
        $this->scholarship = $scholarship;
    }

    // Метод увеличивает стипендию:
    public function increaseRevenue($value)
    {
        $this->scholarship = $this->scholarship + $value;
    }
}
$Student = new Student;
$Student->setName('Коля'); // установим имя
$Student->setScholarship(1000); // установим зарплату

function oof()
{
    global $Student;
    $Student->increaseRevenue(100); // увеличим зарплату
    echo $Student->getScholarship(); // выведет 1100
}

if (array_key_exists('submit', $_POST)) {
    oof();
}

?>
</body>
</html>
