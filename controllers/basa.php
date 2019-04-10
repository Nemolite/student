<meta charset=utf-8>
<?php

// данные для доступа к базе данных
    // $host = 'localhost';
    // $db   = 'shumteh_portfolio'; // нужно поменять на portfolio
    // $user = 'shumteh_student';  // нужно поменять на root
    // $pass = 'zgjkexejnkbxyj';      // нужно поменять! пароль отстутсвует

// либо раскоментровать ниже, предварительно закоментровать верх

include 'connect.php';

 // так подключение есть, теперь проверим может уже есть пользователь
 // с таким логином 
 
$tmp_registr = false; // флаг регистрации
$sql_select = "SELECT * FROM `user` LIMIT 0, 50 ";
$stmt = $pdo->query($sql_select);
while ($row = $stmt->fetch())
{
    if ($row['Login'] == "$_POST[Login]"){ // проверяем
    $tmp_registr = true; // если нашли флаг в true
    echo  "Пользователь с таким именем существует";
    break;
   }
    
}

if ($tmp_registr == false) {

// регистрируем нового пользователя
$sql_insert = 'INSERT INTO `user`
                 SET 
                  `Login` = "'.$_POST[Login].'",
                  `password` = "'.$_POST[password].'",
                  `Gmail` = "'.$_POST[Gmail].'",
                  `Telefon` = "'.$_POST[Telefon].'",
                  `Name` = "'.$_POST[Name].'",
                  `Familiya` = "'.$_POST[Familiya].'",
                  `Otchestvo`= "'.$_POST[Otchestvo].'" ,
                  `Ychebnoe_podrazdel`= "'.$_POST[Ychebnoe_podrazdel].'" ,
                  `Gruppa`= "'.$_POST[Gruppa].'" ,
                  `Kurs` = "'.$_POST[Kurs].'",
                  `Napravl_podgotovki`= "'.$_POST[Napravl_podgotovki].'" ,
                  `Kvalifikaciya`= "'.$_POST[Kvalifikaciya].'" ,
                  `Status_obucheniya` = "'.$_POST[Status_obucheniya].'",
                  `Forma_obucheniya`= "'.$_POST[Forma_obucheniya].'" ,
                  `Data_rojdeniya` = "'.$_POST[Data_rojdeniya].'",
                  `Tip_user` = "'.$_POST[Tip_user].'",
                  `Pol` = "'.$_POST[Pol].'"
                 ';



$count = $pdo->exec($sql_insert); //запись в базу данных
if ($count!=0) echo "Пользователь зарегистрирован";
else
echo "Что-то пошло не так";
}

?>
<script> window.setTimeout(function() { window.location = '../chek.php'; }, 5000) </script>