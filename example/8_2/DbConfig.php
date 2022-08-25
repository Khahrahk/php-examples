<?php
$con = new mysqli('localhost', 'root', 'root', "proverka");
if ($con->connect_errno) {
    die('Нет соединения: ' . $con->connect_error);
}