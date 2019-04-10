<!DOCTYPE html>

<html>

    <head>
         <meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
        <title>Регистрация</title>

        <!-- bootstrap -->
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css" />
        
        <!-- подключение своих стилей-->
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <link rel="stylesheet" type="text/css" href="css/reg.css">
        
    </head>
<body>
 <div class="f_nav">
                <nav>
                     <li><a  href="index.php">Главная</a></li> 
                     <li><a  href="users.php">Регистрация</a> </li>
                     <li><a  href="chek.php">Личный кабинет</a> </li>
                </nav>
           </div>
<div class="f_login_pass">
    <h3>Вход в личный кабинет</h3>
    <form class="form-horizontal" role="form" action="controllers/chek_control.php" method="post">
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Логин</label>
        <div class="col-sm-10">
          <input type="text" class="f_form-control" id="inputEmail3" name = "log" placeholder="Логин">
        </div>
      </div>
      <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">Пароль</label>
        <div class="col-sm-10">
          <input type="password" class="f_form-control" name = "pass" id="inputPassword3" placeholder="Password">
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <div class="checkbox">
            <label>
              <input type="checkbox" name="box"> Запомнить меня
            </label>
          </div>
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-default">Войти</button>
        </div>
      </div>
    </form>

</div>
<script src="js/bootstrap.js"></script>
</body>
</html>