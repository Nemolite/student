<!DOCTYPE html>

<html>

    <head>
         <meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
        <title>Регистрация</title>
		<link rel="stylesheet" href="css/reg.css">
         <!-- подключение boootstrap стилей и тем-->
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css" />
        
        <!-- подключение своих стилей-->
        <link rel="stylesheet" type="text/css" href="css/main.css">
        
    </head>
<body class="full_fon">
  <div class="container">
  <div class="row">    
    <div class="f_user">
          <div class="f_nav">
                <nav>
                     <li><a  href="index.php">Главная</a></li> 
                     <li><a  href="users.php">Регистрация</a> </li>
                     <li><a  href="chek.php">Личный кабинет</a> </li>
                </nav>
           </div>
                 <div class="h1">
            	 <h2>Регистрация нового пользователя </h2>
                 </div>

               <form action="controllers/basa.php" method="post">
                    <div class="container">
                      <div class="row">  

                  <div class="col-md-2">
                      
                    <div class="f_loign">
                        <p>Логин</p>
                         <p><input placeholder="Логин" required="" name="Login" type="text"> </p>
                         <p>Пароль</p>            
                         <p> <input placeholder="Пароль" required="" name="password" type="password"> </p>
                         <p>Электронный адрес</p>	   
                         <p> <input placeholder="e-mail" required="" name="Gmail" type="email"> </p>
                         <p>Тип пользователя</p>      
                         <p>
                          <select class="pol" name="Tip_user" >
                            <option value="Администратор" >Администратор</option>
                             <option value="Пользователь" >Пользователь</option>
                              
                             </select>
                         </p>
                     </div>  
               
            	 </div>

                 <div class="col-md-10">
                 <h2 class="f_center">Сведение о пользователе</h2>
            	  <div class="f_label_1">
                        <p>Фамилия</p>
                        <p>Имя</p>
                        <p>Отчество</p>
                        <p>Телефон</p>
                        <p>Учебное подразделение</p>
                        <p>Направление подготовки</p>

                  </div>
                  <div class="f_input_1">
                    	 <p><input placeholder="Фамилия" !required="" name="Familiya" type="text" size="30"> </p>
                         <p><input placeholder="Имя" !required="" name="Name" type="text" size="30"></p>
                         <p><input placeholder="Отчество" !required="" name="Otchestvo" type="text" size="30"> </p>
                         <p><input placeholder="Телефон" !required="" name="Telefon" type="tel" size="30"> </p>
                         <p><input placeholder="Учебное подразделение" !required="" name="Ychebnoe_podrazdel" type="text" size="30"> </p>
                         <p><input placeholder="Направление подготовки" !required="" name="Napravl_podgotovki" type="text" size="30"> </p> 
                  </div>

                    <div class="f_label_2">
                        <p>Квалификация</p>
                        <p>Курс</p>
                        <p>Группа</p>
                        <p>Статус обучения</p>
                        <p>Форма обучения</p>
                        <p>Дата рождения</p>
                        <p>Пол</p>

                  </div>


            <div class="f_input_2">

                 <p>
                    <select class="pol" name="Kvalifikaciya" >
                        <option value="Бакалавриат" >Бакалавриат</option>
                        <option value="Специалитет" >Специалитет</option>
                        <option value="Магистратура" >Магистратура</option>
                     </select>
                 </p>



                 <p><input  class="pol" placeholder="Курс" !required="" name="Kurs" type="number" min="1" max="6" size="30">	 </p>
                <p> <input placeholder="Группа" !required="" name="Gruppa" type="text"  size="30"> </p>
                 <p><input placeholder="Статус обучения" !required="" name="Status_obucheniya" type="text" size="30"> </p>
                 <p>
                      <select class="pol" name="Forma_obucheniya" >
                        <option value="Очная" >Очная</option>
                        <option value="Очно-заочная" >Очно-заочная</option>
                        <option value="Заочная" >Заочная</option>
                     </select>

                 </p>
                 <p><input placeholder="Дата рождения" !required="" name="Data_rojdeniya" type="date" min="1920-01-01" max="1999-01-01" size="30" class="pol"></p>
                 <p>
                     <select class="pol" name="Pol" >
                        <option value="Мужской" >Мужской</option>
                        <option value="Женский" >Женский</option>
                     </select>
                 </p>	   
               </div>
                 
             </div>
<button class="f_submit" type="submit">Зарегистрироваться</button>
               </div>
             </div>
           </form><!-- form -->
   </div><!-- f_user -->
   </div>
</div><!-- container-->
<script src="js/bootstrap.js"></script>
</body>
</html>