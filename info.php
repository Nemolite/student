 <?php 

//Если форма была отправленна, то выводим ее содержимое на экран
if (isset($_POST["name"])) { 
    //Данные отправляются в кодировке utf-8, поэтому конвертим в cp1251
    // echo "Ваше имя: " . iconv("utf-8", "cp1251", $_POST["name"]) . "<br/>"; 
    echo "Ваш телефон: " . $_POST["phone"] . "<br/>";
    // echo "Ваш сайт: " . $_POST["site"] . "<br/>";
}

















 
// include 'connect.php'; // подключаемся к БД
 
// $sql_update_dost = "UPDATE dostijeniya
//                  SET 
//                  Kod_podtverjdeniya = ?
//                  WHERE Kod_dostijeniya = ?"; // строка запроса

// $count = $pdo->prepare($sql_update_dost); // готовим запрос

// // $tmp_index = implode($_POST);      // готовим данные
// $tmp_index1 = (int)$tmp_index;     // готовим данные
// $tmp_kod_podver = 1; 
// $count->execute(array($tmp_kod_podver,$tmp_index1)); // делаем обновление
// echo "Подтвежден";
 
?>