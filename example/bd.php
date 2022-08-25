<?php
$host = '127.0.0.1';
$db = 'proverka';
$user = 'root';
$pass = 'root';
$charset = 'utf8';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$opt = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];
$pdo = new PDO($dsn, $user, $pass, $opt);
try {
    $dbh = new PDO(($dsn), $user, $pass, $opt);
} catch (PDOException $e) {
    die('Подключение не удалось: ' . $e->getMessage());
}

echo '<p>' . 'Первый вариант' . '</p>';

$stmt = $pdo->query("SELECT name FROM categories")->fetchAll(PDO::FETCH_ASSOC);
foreach ($stmt as $k => $v) {
    echo 'Category name: ' . $v['name'] . '<br>';
}

echo '<p>' . 'Второй вариант' . '</p>';

$stmt1 = $pdo->query('SELECT * FROM categories');
while ($row = $stmt1->fetch()) {
    echo '<br>' . $row['name'] . "\n";
}

echo '<p>' . 'Третий вариант' . '</p>';

$stmt2 = $pdo->query('SELECT * FROM categories LIMIT 1');
while ($row = $stmt2->fetch(PDO::FETCH_BOTH)) {
    echo '<pre>';
    echo $row['name'];
    echo '</pre>';
}

echo '<p>' . 'Четвертый вариант' . '</p>';

$stmt3 = $pdo->query('SELECT * FROM categories LIMIT 3');
while ($row = $stmt3->fetch(PDO::FETCH_UNIQUE)) {
    echo '<pre>';
    echo $row['name'];
    echo '</pre>';
}

echo '<p>' . 'Пятый вариант' . '</p>';

$stmt4 = $pdo->query('SELECT * FROM categories LIMIT 3')->fetch(PDO::FETCH_NUM);
print_r($stmt4);

echo '<p>' . 'Шестой вариант' . '</p>';

$stmt5 = $pdo->query('SELECT * FROM categories LIMIT 3')->fetch(PDO::FETCH_COLUMN);
print_r($stmt5);

echo '<p>' . 'Седьмой вариант' . '</p>';

$stmt6 = $pdo->query('SELECT * FROM categories LIMIT 3')->fetch(PDO::FETCH_KEY_PAIR);
print_r($stmt6);

echo '<p>' . 'Восьмой вариант' . '</p>';

$stmt6 = $pdo->query('SELECT * FROM categories LIMIT 3')->fetchAll(PDO::FETCH_UNIQUE);
print_r($stmt6);

?>