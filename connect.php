<meta charset=utf-8>
<?php
$host = '127.0.0.1';
  $db   = 'portfolio';
$user = 'root';
$pass = '';


    $charset = 'utf8';
    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
     
// подключение и создание объекта PDO
    try {
        $pdo = new PDO($dsn, $user, $pass);
        // echo "подключился";
        } 
    catch (PDOException $e) {
        die('Подключение не удалось: ' . $e->getMessage());
        }
?>