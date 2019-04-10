<?php 
session_start(); // инициализция механизма сессии
// контрольный вывод передаваемой информации
// echo "<pre>";
// 	print_r($_POST);
// echo "</pre>";


// подключаемся к базе данных

  $host = '127.0.0.1';
    $db   = 'portfolio';
    $user = 'root';  // нужно изменить по необходимости
    $pass = '';      // нужно изменить по необходимости
    $charset = 'utf8';
    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
     
// подключение и создание объекта PDO
    try {
        $pdo = new PDO($dsn, $user, $pass);
        } 
    catch (PDOException $e) {
        die('Подключение не удалось: ' . $e->getMessage());
        } 

// извлекаем логин и  пароль для проверки
$tmp_locic = false; // флаг 
$sql_select = "SELECT * FROM `user` LIMIT 0, 50 ";
$stmt = $pdo->query($sql_select);
while ($row = $stmt->fetch())
{

// проверяем есть в базе данных пользователь с данным логином и паролем
    if (($_POST[log]==$row['Login'])&&($_POST[pass]==$row['password']))
    {
    	echo "Здравствуйте";
    	echo " ";
    	echo $row['Familiya'];
    	echo " ";
    	echo $row['Name'];
    	echo " ";
    	echo $row['Otchestvo'];
    	echo "<br/> ";
    	
    	$tmp_locic = true; // устанавливаем флаг, пользователь найден

        // необходимые данные из бд сохраняем в сессии
        // для того чтобы использовать их на страницах сайта
        $_SESSION['auth'] = $tmp_locic;
        $_SESSION['id'] = $row['Kod_user'];	
        $_SESSION['Familiya'] = $row['Familiya']; 
        $_SESSION['Name'] = $row['Name']; 
        $_SESSION['Otchestvo'] = $row['Otchestvo']; 
        $_SESSION['Tip_user'] = $row['Tip_user'];;
        
        
       	break;	// выходим сразу из цикла
    	
    	
    }
     
} // while

if ($tmp_locic == false) // если пользователь не найден 
     {
    	echo "Пользователь с таким Логином и Паролем не сущетсвует";
        ?>    
    <p>Через 5 секунд будет произведено перенаправление на страницу регистрации пользоватлей</p>
   <script> window.setTimeout(function() { window.location = '../users.php'; }, 5000) </script>
<?php
       }


// сделаем редирект (переход) на страницу пользователя

if (!empty($_SESSION['id'])) { 
?>    
    <p>Через 5 секунд будет произведено перенаправление в личный кабинет</p>
   <script> window.setTimeout(function() { window.location = '../lk.php'; }, 5000) </script>
<?php
} 


?>