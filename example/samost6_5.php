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
        <br><br>Длина: <input type="text" name="length"/>
        <br><br>Ширина: <input type="text" name="width"/>
        <br><br>Высота потолков: <input type="number" name="height_pot"/>
        <br><br>Кол-во окон: <input type="text" name="okno"/>
        <br><br>Высота окна: <input type="text" name="height_okno"/>
        <br><br>Ширина окна: <input type="text" name="width_okno"/>
        <br><br><input type="submit" name="submit"/>
    </form>

</div>


<?php

class Member
{
    private $length, $width, $height_pot, $okno, $height_okno, $width_okno;


    public function __construct($length, $width, $height_pot, $okno, $height_okno, $width_okno)
    {
        $this->length = $length;
        $this->width = $width;
        $this->height_pot = $height_pot;
        $this->okno = $okno;
        $this->height_okno = $height_okno;
        $this->width_okno = $width_okno;
    }

    public function __destruct()
    {
        echo "<br>Деструктор выполнен";
    }


    public function showAll()
    {
        echo "<dl>";
        echo "<dt>Длина комнаты: </dt><dd>$this->length</dd><br>";
        echo "<dt>Ширина комнаты: </dt><dd>$this->width</dd><br>";
        echo "<dt>Высота потолков: </dt><dd>$this->height_pot</dd><br>";
        echo "<dt>Кол-во окон: </dt><dd>$this->okno</dd><br>";
        echo "<dt>Высота окна: </dt><dd>$this->height_okno</dd><br>";
        echo "<dt>Ширина окна: </dt><dd>$this->width_okno</dd>";
        echo "</dl>";
    }


    public function Ploshad_Pola(){
        $S = ($this->length) * ($this->width);
        echo "<dt>Площадь пола: </dt><dd>$S см&sup2;</dd><br>";
    }
    public function Obiem_Kom(){
        $S1 = ($this->length) * ($this->width) * ($this->height_pot);
        echo "<dt>Обьем комнаты: </dt><dd>$S1 см&sup3;</dd><br>";
    }
    public function Ploshad_Sten(){
        $S2 = ((($this->length) * ($this->height_pot)) + (($this->width) * ($this->height_pot))) * 2;
        echo "<dt>Площадь стен: </dt><dd>$S2 см&sup2;</dd><br>";
    }
}

function oof()
{
    $length = $_POST['length'];
    $width = $_POST['width'];
    $height_pot = $_POST['height_pot'];
    $okno = $_POST['okno'];
    $height_okno = $_POST['height_okno'];
    $width_okno = $_POST['width_okno'];
    $aMember = new Member($length, $width, $height_pot, $okno, $height_okno, $width_okno);
    $aMember->showAll();
    $aMember->Obiem_Kom();
    $aMember->Ploshad_Sten();
    $aMember->Ploshad_Pola();
    unset($aMember);
    print_r($aMember);
}

if (array_key_exists('submit', $_POST)) {
    oof();
}
?>
</body>
</html>