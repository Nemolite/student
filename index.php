<?php 
session_start(); // стратуем сессию, чтобы использовать 
//проерку авторизации пользователя
?> 
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Портфолио студента</title>

	<!-- подключение bootstrap (бутстрап)-->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css" />
		
	<!-- подключение своих стилей-->
	<link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <!-- подключение  стилей панеля управления-->
	   <link rel="stylesheet" href="css/lk.css">

</head>
<body class="full_fon">

 
    <div class="container">
        <header class="f_header"> 
        <div class="f_users">

			<p>Пользователь,  
			      <?php if (!empty($_SESSION['id'])) 
			      // тут понятно и просто
			      // если авторизован выводим ФИО пользователя
			      {
			      echo $_SESSION['Familiya'];
			      echo "  ";
			      echo $_SESSION['Name'];
			      echo "  ";
			      echo $_SESSION['Otchestvo'];
                    }
                    else
                    	// если же нет, то выводим как гость
                    	echo "Гость";
			      ?>
			</p>
		</div>
                <img src="images/logo2.jpg" width="430" height="315">
                <h1>Портфолио – это не только дань моде,
					но и реальная возможность представить
					себя и свои достижения в самом лучшем виде!
			   </h1>
                 <nav>
	                 <li><a  href="index.php">Главная</a></li> 
	                 <li><a  href="users.php">Регистрация</a> </li>
                 <?php if (!empty($_SESSION['id'])) // здесь происходит следующее
                 // если пользователь авторизован направляем его в личный кабинет
			      {?>
                      <li><a  href="lk.php">Личный кабинет</a> </li>
			     <?php }
			     // если же не автоизован направляем его на 
			     // страницу входа в систему
                       else
			      {?>
			     
	                 <li><a  href="chek.php">Личный кабинет</a> </li>
                 <?php }?>
                  <li><a  href="admin.php">Администратор</a> </li>
                  <li>
			<form action="" method="post">
			<button class="f_exit" type="submit" name="exit" value="999">Выход </button>
				<?php 
				if (isset($_POST['exit'])&&($_POST['exit']==999)) {
					$_SESSION = array(); // или $_SESSION = array() для очистки всех данных сессии
					session_destroy();
					header('Location: index.php');
					}
				?>
			</form>
                  </li>
                </nav>
        </header>
    </div> <!-- container -->
  <!-- content -->
    <div class="container">
      <div class="row">
	        <div class="col-md-4">
				<div class="f_aside ">
				<!--Этот блок для сайдбара-->
				<h3>Наш рейтинг ТОП 5</h3>

        <table class="table table-striped">
              <thead>
                <tr>
                <th>Пользователь</th>
                  <th>Достижение</th>
                
                </tr>
              </thead>
              <?php
              include 'connect.php'; // подключаемся к базе
$mas= array();  // готовим пустой массив по значения
$mas_id= array(); // по id
$sql_r = "SELECT * FROM `user` LIMIT 0, 50 "; //делаем простой запрос к бд
$stmt_r = $pdo->query($sql_r); 
while ($row_r = $stmt_r->fetch()) // начинаем перебор всего массива который
//пришел к нам с бд
{
	
	$mas[] = $row_r['Login']; //в этом массиве накапливаем логины
	$mas_id[] = $row_r['Kod_user'];//здесь их id коды
	
}// т.е собираем id и логины пользователей

$reult = array(); //готовим еще один массив

  for($i = 0; $i < count($mas_id); $i++) { // запускаем цикл столько раз
  	//сколько id т.е сколько пользователей
$stmt2 = $pdo->prepare("SELECT * FROM dostijeniya WHERE Kod_user=?");
// делаем запрос к бд, то есть готовим его пока
$stmt2->execute(array($mas_id[$i]));// вместо ? подставляем каждый раз
// id пользователя
$rows2 = $stmt2->fetchAll(); // получаем массив
$count2 = count($rows2);// так как нам нужно число мы его и берем
//это число ничто иное как кол-во достижений
$reult[] = $count2; // пишем это число в массив
}

$c = array_combine($reult, $mas);// из двух массивов делаем один
// ассоциативный где в качестве ключей числа(достижения), а в качестве значений
// логины

// вот здесь сортируем их по убыванию, этот блок ниже занят этим
function cmp($a, $b) 
{
    if ($a == $b) {
        return 0;
    }
    return ($a > $b) ? -1 : 1;
}
// вот сама сортировка, а функция выше просто придаток
uksort($c, "cmp");

$tmp_counter = 0;
foreach ($c as $key => $value) { //ну выводим на страницу
 $tmp_counter++;  
?>
              <tbody>
                  <td><?php echo $value;?></td>
                  <td><?php echo $key; ?></td>
               </tbody>
 <?php  
if ($tmp_counter==5) break; // так как топ 5 прекращаем вывод по достижении 
 } ?>               
            </table>


				</div>

	        </div> <!-- col-md-3 -->
	        <div class="col-md-8">
				<div class="f_content">   <!--А в этом блоке расположен контент-->
				    <h1>Здравствуй, Дорогой студент!</h1>
				         <p>На нашем сайте Вы можете заполнить свой портфель достижений. </p>
				         <p>Грамотно заполненное портфолио
							станет одним из важных способов привлечения внимания работодателей к Вашей
							персоне. Рекомендуется вести портфолио своих успехов и достижений с первых дней учебы в вузе.
				          </p>
				 </div>
	       </div><!-- col-md-9-->
      
      </div>
    </div>
 <!-- end content -->
 <div class="container">
      <div class ="f_footer">
        <p> © Все права защищены 2017г. разработчиками</p>
      </div>
  </div>     
   <script src="js/bootstrap.js"></script>
 </body>
</html>