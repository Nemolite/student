<?php 
session_start();

if (!empty($_SESSION['id'])) { //id достаем из сессии
  // если он не пустой, отобразим весь html код ниже, 
  // если же id пустое, то отравим на страницу авторизации
       
// unset($_POST['submit']);
?> 
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Портфолио студента</title>

	<!-- подключение bootstrap (бутстрап)-->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css" />
		
	<!-- подключение  стилей панеля управления-->
	   <link rel="stylesheet" href="css/lk.css">
      <link rel="stylesheet" type="text/css" href="css/main.css">

</head>
<body>
<div class="f_users">
<p>Пользователь 
      <?php 
      echo $_SESSION['Familiya'];
      echo "  ";
      echo $_SESSION['Name'];
      echo "  ";
      echo $_SESSION['Otchestvo'];

      ?>
</p>
</div>
	 <div class="container-fluid">
	  <div class="row">
	      <div class="col-xs-3 col-md-2"><!-- левый сайдбар информативного поля -->
	       <h1 class="page-header">Меню</h1>
	      	<ul class="nav nav-sidebar">
            <li class="active"><a href="index.php">Главная <span class="sr-only">(current)</span></a></li>
            <li><a href="admin.php">Администратор</a></li>
            <li>

            <form action="" method="post">
      <button class="f_exit" type="submit" name="exit2" value="999">Выход </button>
        <?php 
        if (isset($_POST['exit2'])&&($_POST['exit2']==999)) {
          $_SESSION = array(); // или $_SESSION = array() для очистки всех данных сессии
          session_destroy();
          header('Location: index.php');
          }
        ?>
      </form>

            </li>
            </ul>
            <hr>
            <h1 class="page-header">Профиль</h1>
          <ul class="nav nav-sidebar">
            <li><a href="">Редактировать</a></li>
            <li><a href="">Удалить</a></li>
          </ul>
          <hr>
          

	      </div>
	      <div class="col-xs-15 col-sm-6 col-md-10"> <!-- основное информативное поле -->

	       <h1 class="page-header">Личный кабинет</h1>

          <div class="row placeholders">
            <div class="col-xs-6 col-sm-3 placeholder">
              <img src="images/avatar.png" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
             
            </div>
             <h2 class="sub-header">Ваши личные данные</h2>
             <div class="col-xs-3 col-sm-5" >
    <?php include 'connect.php';

$sql_select = "SELECT * FROM `user` LIMIT 0, 50 "; // выполним запрос к бд
$stmt = $pdo->query($sql_select); // достанем данные во временный массив $stmt
while ($row = $stmt->fetch())
{
   // перебор массива $stmt в цикле
   if ($_SESSION['id']==$row['Kod_user']) 
           { // отобразим данные конкретного пользователя по id
           
 ?>            
 <h5>Имя<span><?php echo $row['Name']; ?></span></h5>
 <h5>Фамилия<span><?php echo $row['Familiya']; ?></span></h5>
 <h5>Отчество<span><?php echo $row['Otchestvo']; ?></span></h5>
 <h5>Электронный адрес<span><?php echo $row['Gmail']; ?></span></h5>
 <h5>Телефон<span><?php echo $row['Telefon']; ?></span></h5>
 <h5>Учебное подразделение<span><?php echo $row['Ychebnoe_podrazdel']; ?></span></h5>
 <h5>Направление подготовки<span><?php echo $row['Napravl_podgotovki']; ?></span></h5>
                           
            </div>
            <div class="col-xs-6 col-sm-4" >
              <h5>Квалификация<span><?php echo $row['Kvalifikaciya']; ?></span></h5>
              <h5>Курс<span><?php echo $row['Kurs']; ?></span></h5>
              <h5>Группа<span><?php echo $row['Gruppa']; ?></h5>
              <h5>Статус обучения<span><?php echo $row['Status_obucheniya']; ?></span></h5>
              <h5>Форма обучения<span><?php echo $row['Forma_obucheniya']; ?></span></h5>
                
              <h5>Дата рождения<span><?php echo $row['Data_rojdeniya']; ?></span></h5>
              <h5>Пол<span><?php echo $row['Pol']; ?></span></h5>
            </div>
            
<?php } //if

} //while
     ?> 
        
          </div>

          <h2 class="sub-header">Ваши достижения</h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Достижение</th>
                  <th>Уровень</th>
                   <th>Статус</th>
                   <th>Дополнительно</th>
                  <th>Дата начала</th>
                  <th>Дата завершения</th>
                  <th>Комментарии</th>
                  <th>Подтверждение</th>
                 
                </tr>
              </thead>
              <tbody>
              <?php
              $sql_select = "SELECT * FROM `dostijeniya` LIMIT 0, 50 ";
$stmt = $pdo->query($sql_select);
while ($row = $stmt->fetch())
  {  // в цикле перебираем весь массив
if ($_SESSION['id']==$row['Kod_user']) 
           { // отображаем ДОСТИЖЕНИЕ только у конкретного пользователя по id
    ?>
                <tr>
                  <td><?php echo $row['Name_dostijeniya'];?></td>
                  <td><?php echo $row['Name_yrovnya'];?></td>
                  <td><?php echo $row['Name_rezult'];?></td>

                  <td>
<!-- кнопка всплывашка -->
<button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal<?php echo $row['Kod_kriteriya']?>">
        Информация
      </button>
<!-- тело всплывашки -->
   <div class="modal fade" id="myModal<?php echo $row['Kod_kriteriya']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Дополнительная информация по данному достижению</h4>
      </div>
      <div class="modal-body">

       <?php 
//echo $row['Kod_kriteriya'];

$sql_n =  "SELECT * FROM `kriteriy_razdela` LIMIT 0, 50 ";;
$stmt_n = $pdo->query($sql_n);
while ($row_n = $stmt_n->fetch())
{
  if ($row_n['Kod_kriteriya']==$row['Kod_kriteriya']) {
     echo "<h3>Критерия раздела</h3>"; 
                     echo "<br>";
    echo $row_n['Name_kriteriya'];
        $sql_r =  "SELECT * FROM `razdel` LIMIT 0, 50 ";;
            $stmt_r = $pdo->query($sql_r);
            while ($row_r = $stmt_r->fetch())
                    {
                     //echo $row_r['Kod_razdel'];
                     //echo $row_n['Name_razdel'];
                     
                     $tmp_t=(int)$row_n['Name_razdel'];
                 if ($row_r['Kod_razdel']==$tmp_t){

                  echo "<h3>Раздел</h3>"; 
                     echo "<br>";
                  echo $row_r['Name_razdel'];
                  break;
                 }
                      }
        }              
}


       ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
      
      </div>
    </div>
  </div>
</div>              
<!-- завершение всплывашек -->
 
                  </td>
                  <td><?php echo $row['Data_nachala'];?></td>
                  <td><?php echo $row['Data_konec'];?></td>
                  <td><?php echo 
                         substr($row['Komment'], 0, 20);
                         // режем комментарии до 20 символов
                  ?></td>
               <?php    if ($row['Kod_podtverjdeniya']==1) 
               {?>
                  <td class="f_green">Подвержден</td>
                  <?
                } 
                  else {
                  ?>
                  <td class="f_red">Не подтвержден</td>
                  <?php } ?>
               
                </tr>
<?php } // if
} //while
?>               
                
                
              </tbody>
            </table>
            <div class="bl_forma">
<!-- ниже формируем форму ввода новых достижений
обратите внимание на action="" код обработки будет ниже в этом же файле 
enctype='multipart/form-data' это нужно для загрузки файла-->
             <form action="add.php" method="post" enctype='multipart/form-data'>
                    <div class="container">
                      <div class="row">  
       

                 <div class="col-md-10">
                 <h2 class="f_center">Добавить свое достижение</h2>
                <div class="f_label_1">
                        <p>Наименование</p>
                        <p>Уровень</p>
                        <p>Статус</p>
                        <p>Описание файла</p>
                        <p>Добавить файл: </p>
                </div>
                  <div class="f_input_1">
                       <p><input placeholder="Достижение" !required="" name="Name_dostijeniya" type="text" size="30" class="pol"> </p>
                 <p>
                    <select class="pol" name="Name_yrovnya" >
                        <option value="Международный" >Международный</option>
                        <option value="Российский" >Российский</option>
                        <option value="Областной" >Областной</option>
                        <option value="Городской" >Городской</option>
                         <option value="ННГУ" >ННГУ</option>
                          <option value="Подача заявки" >Подача заявки</option>

                     </select>
                 </p>
                  <p>
                    <select class="pol" name="Name_rezult" >
                        <option value="Участие" >Участие</option>
                        <option value="1 место" >1 место</option>
                        <option value="2 место" >2 место</option>
                        <option value="3 место" >3 место</option>
                     </select>
                 </p>
                <p><input placeholder="Название файла" !required="" name="Name_file" type="text" size="30" class="pol"> </p>

                 <p>
                 <!-- загрузка файла -->
                 <input type='file' name='inputfile' size='10' />   
                 </p>

                  </div>

                    <div class="f_label_2">
                       <!--  <p>Вид</p> -->
                        <p>Дата Начала</p>
                        <p>Дата завершения</p>
                        <p>Описание достижения</p>
                        <p>Комментарии</p>
                    </div>
            <div class="f_input_2">
               
                 <p><input placeholder="Дата Начала" !required="" name="Data_nachala" type="date" min="2015-09-01" max="2020-05-01" size="30" class="pol"></p>
                 
                <p><input placeholder="Дата Завершения" !required="" name="Data_konec" type="date" min="2015-09-01" max="2020-05-01" class="pol"></p>

                <p>
                    <select class="pol" name="Kod_kriteriya" >
     <?php   $sql_option = "SELECT * FROM `kriteriy_razdela` LIMIT 0, 50 ";
          $stmt_option = $pdo->query($sql_option);
          while ($row_option = $stmt_option->fetch())
  {  // в цикле перебираем весь массива
    ?>              
                        <option value="<?php echo $row_option['Kod_kriteriya'];?>" ><?php echo $row_option['Name_kriteriya'];?></option>
    <?php } ?>                    
                     </select>
                 </p>

                <p>
                <textarea placeholder="Не более 20 знаков" rows="1" cols="10" name="Komment" style="margin-left: 0px; margin-right: 0px; width: 245px;"></textarea>
                </p>
               </div>

              <button class="f_submit" type="submit" name="add" value="100">Добавить </button>
              <p></p>   

            
             </div>

               </div>
             </div>
           </form><!-- form -->





            </div> <!-- bl_forma-->
          </div>
        </div>
  
      </div>
     
    </div>
	      
	      </div>
	    </div>
	</div>
	 <!-- подключение JQuery -->
	 <script src="js/jquery-3.2.1.min.js"></script>
   <!-- подключение bootstrap.js-->
	 <script src="js/bootstrap.js"></script>
</body>
</html>
<?php
}
else {
echo "Вам необходимо пройти авторизацию";
?>
<p>Через 5 секунд будет произведено перенаправление на страницу авторизации</p>
  <!--  <script> window.setTimeout(function() { window.location = '../chek.php'; }, 5000) </script> -->
<?php
header('Location: ../chek.php'); exit();
}
?>
