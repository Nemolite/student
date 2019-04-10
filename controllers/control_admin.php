 <?php 

 echo "<pre>";
	print_r($_POST);
echo "</pre>";

 include 'connect.php'; // подключаемся к БД
         

$sql_update_dost = "UPDATE dostijeniya
                 SET 
                 Kod_podtverjdeniya = ?
                 WHERE Kod_dostijeniya = ?"; // строка запроса

$count = $pdo->prepare($sql_update_dost); // готовим запрос

$tmp_index = implode($_POST);      // готовим данные
$tmp_index1 = (int)$tmp_index;     // готовим данные
$tmp_kod_podver = 1; 
$count->execute(array($tmp_kod_podver,$tmp_index1)); // делаем обновление
 

?>
<p>Подтверждение достижения прошло успешно!</p>
<p>Через 5 секунд будет произведено перенаправление в Администратор </p>
 <script> window.setTimeout(function() { window.location = '../admin.php'; }, 5000) </script>