<?php 
session_start();

if (!empty($_SESSION['id'])&&($_SESSION['Tip_user']=="Администратор")) { //id достаем из сессии
  // тут админка и доступ еще более оганичен
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Администратор</title>

    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="css/local.css" />
    <link rel="stylesheet" type="text/css" href="css/admin.css">

       <link rel="stylesheet" type="text/css" href="css/main.css">

  
    <link rel="stylesheet" type="text/css" href="http://www.shieldui.com/shared/components/latest/css/light-bootstrap/all.min.css" />
   

<link rel="stylesheet" href="css/remodal.css">
<link rel="stylesheet" href="css/remodal-default-theme.css">
 <script type="text/javascript" src="../js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript">
 
           
            function AjaxFormRequest(result_id,form_id,url) {
                jQuery.ajax({
                    url:     url, //Адрес подгружаемой страницы
                    type:     "POST", //Тип запроса
                    dataType: "html", //Тип данных
                    data: jQuery("#"+form_id).serialize(), 
                    success: function(response) { //Если все нормально
                    document.getElementById(result_id).innerHTML = response;
                },
                error: function(response) { //Если ошибка
                document.getElementById(result_id).innerHTML = "Ошибка при отправке формы";
                }
             });
        }
 
   </script>


</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">            
           
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active"><a href="admin.php"><i class="fa fa-bullseye"></i> Администратор</a></li>
                    <li><a href="index.php"><i class="fa fa-tasks"></i>Главная</a></li>                    
                    <li><a href="lk.php"><i class="fa fa-globe"></i>Личный кабинет</a></li>
                    <li>
<form action="" method="post">
            <button class="f_exit" type="submit" name="exit" value="999">Выход </button>
                <?php 
                if (isset($_POST['exit'])&&($_POST['exit']==999)) {
                    $_SESSION = array(); // или $_SESSION = array() для очистки всех данных сессии
                    session_destroy();
                     // <script> window.setTimeout(function() { window.location = '../index.php'; }, 5000) </script>
                    // header('Location: index.php');
                    }
                ?>
</form>



                    </li>
                                        
                </ul>
               <div class="f_head_admin">
                 <h2>Панель управления администратора</h2>
               </div>
            </div>
        </nav>

        <div id="page-wrapper">
       
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-bar-chart-o"></i> Информация по достижениями пользователей</h3>
                        </div>
                        <div class="panel-body">
                            <div id="shieldui-grid1">

<!-- -->

 <table class="table table-striped">
              <thead>
                <tr>
                <th>Пользователь</th>
                  <th>Достижение</th>
                  <th>Уровень</th>
                   <th>Статус</th>
                   <th>Дополнительная</th>
                  <th>Начало</th>
                  <th>Завершение</th>
                  <th>Комментарии</th>
                  <th>Подтверждение</th>

                 
                </tr>
              </thead>
              <tbody>
              <form action="" method="post">
            
              <?php

include 'connect.php';

$sql_select3 = "SELECT * FROM `dostijeniya` LIMIT 0, 50 ";
$stmt = $pdo->query($sql_select3);
while ($row = $stmt->fetch())
  {  // в цикле перебираем весь массив
    // $tmp_index = $row['Kod_dostijeniya'];
    //   $_POST['$tmp_index'] = $tmp_index;
      $tmp_id = $row['Kod_user'];
    ?>
                <tr>
                <td>
               
             <?php
            $sql_select4 = "SELECT * FROM `user` LIMIT 0, 50 ";
            $stmt1 = $pdo->query($sql_select4);
            while ($row_users = $stmt1->fetch())
              {  // в цикле перебираем весь массив
                if ( $row_users['Kod_user']== $tmp_id) {
                   $tmp_v = $row_users['Login'];
                   $tmp_index = $row['Kod_dostijeniya'];
                   $_POST['$tmp_index'] = $tmp_index;
                   break;
                    
                }
               }   
                ?>

<?php echo $tmp_v?>
                </td>
                  <td><?php echo $row['Name_dostijeniya'];?></td>
                  <td><?php echo $row['Name_yrovnya'];?></td>
                  <td><?php echo $row['Name_rezult'];?></td>
                  <td>
<!-- всплывашка -->
<button class="btn btn-default" data-toggle="modal" data-target=".bs-example-modal-lg"><a href="#modal<?php echo $row['Kod_kriteriya']?>">Информация</a></button>


<script>
  $(document).on('opening', '.remodal', function () {
    console.log('opening');
  });

  $(document).on('opened', '.remodal', function () {
    console.log('opened');
  });

  $(document).on('closing', '.remodal', function (e) {
    console.log('closing' + (e.reason ? ', reason: ' + e.reason : ''));
  });

  $(document).on('closed', '.remodal', function (e) {
    console.log('closed' + (e.reason ? ', reason: ' + e.reason : ''));
  });

  $(document).on('confirmation', '.remodal', function () {
    console.log('confirmation');
  });

  $(document).on('cancellation', '.remodal', function () {
    console.log('cancellation');
  });

//  Usage:
//  $(function() {
//
//    // In this case the initialization function returns the already created instance
//    var inst = $('[data-remodal-id=modal]').remodal();
//
//    inst.open();
//    inst.close();
//    inst.getState();
//    inst.destroy();
//  });

  //  The second way to initialize:
  $('[data-remodal-id=modal2]').remodal({
    modifier: 'with-red-theme'
  });
</script>  


<div class="remodal" data-remodal-id="modal<?php echo $row['Kod_kriteriya']?>" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc">
  <button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>
  <div>
    <h3 id="modal1Title">Дополнительная информация по данному достижению</h3>
    <p id="modal1Desc">
      <?php 

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
     
    </p>
  </div>
  <br>
  
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
                  <td class="f_green" id="yes">Подтвежден</td>
                  <?
                } 
                  else {
                  ?>
                  <td class="<? echo $_POST['$tmp_index']; ?>">
                  <? //echo $_POST['$tmp_index']; 

                  ?>
       <!--  <div id="id<? echo $_POST['$tmp_index']; ?>">
            Тут будет вывод нашей формы<br/>
          
            
        </div> -->
        <br/><br/>
        <form method="post" action="" id="f_id<? echo $_POST['$tmp_index']; ?>">
           <!--  Имя: <input type="text" name="name" value="Антон" /><br/> -->
           <!--  Телефон: <input type="text" name="phone" value="8(916)124-234-122" /><br/> -->
          <!--   Сайт: <input type="text" name="site" value="http://ox2.ru/" /><br/> -->
            <input type="button" value="Подтвердить" onclick="AjaxFormRequest('id<? echo $_POST['$tmp_index']; ?>', 'f_id<? echo $_POST['$tmp_index']; ?>', 'info.php')" />
        </form>
  
  
                  </td>
                  <?php } ?>
              
                </tr>
<?php
} //while
?>               
               
              </form>  




              </tbody>
            </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
   <!-- подключение JQuery -->
   <script src="js/jquery-3.2.1.min.js"></script>
   <!-- подключение bootstrap.js-->
   <script src="js/bootstrap.js"></script>
 <script src="js/remodal.min.js"></script>
 <script type="text/javascript">
           
            function AjaxFormRequest(result_id,form_id,url) {
                jQuery.ajax({
                    url:     url, //Адрес подгружаемой страницы
                    type:     "POST", //Тип запроса
                    dataType: "html", //Тип данных
                    data: jQuery("#"+form_id).serialize(), 
                    success: function(response) { //Если все нормально
                    document.getElementById(result_id).innerHTML = response;
                },
                error: function(response) { //Если ошибка
                document.getElementById(result_id).innerHTML = "Ошибка при отправке формы";
                }
             });
        }
 
   </script>
</body>
</html>

<?php
}
else 
{
echo "У Вас нет прав работать в разделе Администратора";
?>
<p>Через 5 секунд будет произведено перенаправление на страницу регистрации</p>
   <script> window.setTimeout(function() { window.location = 'users.php'; }, 5000) </script>
<?php

}
?>