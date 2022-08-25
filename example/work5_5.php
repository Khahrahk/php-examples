<!doctype HTML>
<html>
<head>
<title>Практика 5 Задача 5 Безденежных Виктор Евгеньевич ВБ-335к</title>
<meta charset="utf-8">
</head>
<body>
<form action="work5_5.php" method="post">
  <label for="username">Имя:</label>    
  <input type="text" name="username" id="username">
 
  <label for="number">Телефон:</label>   
  <input type="text" name="number" id="number">
 
  <label for="feedback">Город проживания</label>
  <input type="text" name="City" id="City">
 
  <input type="submit" name="submit" value="Отправь меня!">
</form>
<?php
echo "<br>Имя пользователя: ".$_POST['username'];
echo "<br>Номер телефона: ".$_POST['number'];
echo "<br>Город проживания: ".$_POST['City'];
echo "<br><br><br><a href='index.php'> К содержанию </a>";
?>
</body>
</html>