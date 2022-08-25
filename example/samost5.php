<?php

class Member
{
    private $username;
    private $last_Name;
    private $email;

    public function __construct($username, $last_Name, $email)
    {
        $this->username = $username;
        $this->last_Name = $last_Name;
        $this->email = $email;
    }

    public function __destruct()
    {
        echo "Сломалось";
    }

    public function showProfile()
    {
        echo "<dl>";
        echo "<dt>Имя:</dt><dd>$this->username</dd>";
        echo "<dt>Фамилия:</dt><dd>$this->last_Name</dd>";
        echo "<dt>Email:</dt><dd>$this->email</dd>";
        echo "</dl>";
    }
}

$aMember = new Member("Виктор", "Безденежных", "lol@mail.ru");
$aMember->showProfile();
unset($aMember);
print_r($aMember);
