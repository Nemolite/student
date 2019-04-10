<?php
session_start();

include 'connect.php';
 // код обработки формы 
// сначало разберемся с файлом, 
if(isset($_FILES) && $_FILES['inputfile']['error'] == 0){ // Проверяем, загрузил ли пользователь файл
$uploaddir = dirname(__FILE__) .'/files/';
$uploadfile = $uploaddir.basename($_FILES['inputfile']['name']);

 // Директория для размещения файла
move_uploaded_file($_FILES['inputfile']['tmp_name'], $uploadfile ); // Перемещаем файл в желаемую директорию
// echo 'Данные загружены'; 
// Оповещаем пользователя об успешной загрузке файла

}
else{
// echo 'Данные будут загружены без файла'; 
// Оповещаем пользователя о том, что файл не был загружен
}
// теперь у нас есть файл , его имя и ссылка на папку где он хранится
// загружаем остальные данные используя insert

$tmp_set = $_POST['add'];
if ($tmp_set==100) {

  // echo "<pre>";
  // print_r($_POST);
  // echo "</pre>";
 
$tmp_kod_podver = 0; // код подвержения 0 не подтвержден по умолчанию
$sql_insert_dost = 'INSERT INTO `dostijeniya`
                 SET 
                  `Name_dostijeniya` = "'.$_POST[Name_dostijeniya].'",
                  `Name_yrovnya` = "'.$_POST[Name_yrovnya].'",
                  `Name_rezult` = "'.$_POST[Name_rezult].'",
                  `Data_nachala` = "'.$_POST[Data_nachala].'",
                  `Data_konec` = "'.$_POST[Data_konec].'",
                  `Kod_kriteriya` = "'.$_POST[Kod_kriteriya].'",
                
                  `Komment` = "'.$_POST[Komment].'",
                  `Kod_podtverjdeniya` = "'.$tmp_kod_podver.'",
                  `Kod_user` = "'.$_SESSION['id'].'"
                 ';


$count = $pdo->exec($sql_insert_dost); //запись в базу данных


}
?>
<script> window.setTimeout(function() { window.location = 'lk.php'; }, 5) </script>