<?php
session_start();
    include 'bd.php';
    //  вся процедура работает на сессиях. Именно в ней хранятся данные  пользователя, пока он находится на сайте. Очень важно запустить их в  самом начале странички!!!
    if (isset($_POST['name'])) { $name = $_POST['name']; if ($name == '') { unset($name);} } //заносим введенный пользователем логин в переменную $name, если он пустой, то уничтожаем переменную
        if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} }
        //заносим введенный пользователем пароль в переменную $password, если он пустой, то уничтожаем переменную
    if (empty($name) or empty($password)) //если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
        {
        exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
        }
        //если логин и пароль введены,то обрабатываем их, чтобы теги и скрипты не работали, мало ли что люди могут ввести
        $name = stripslashes($name);
        $name = htmlspecialchars($name);
        $password = stripslashes($password);
        $password = htmlspecialchars($password);
    //удаляем лишние пробелы
        $name = trim($name);
        $password = trim($password);
        $password = md5($password);
        $result = mysqli_query($bd, "select * from user join user_role on user.id = user_role.user_id where user.username ='$name'"); //извлекаем из базы все данные о пользователе с введенным логином
        $myrow = mysqli_fetch_array($result);
        $id = $myrow['id'];
        $role = $myrow['role_id'];
        if (empty($myrow['password']))
        {
        //если пользователя с введенным логином не существует
        exit ("Извините, введённый вами name или пароль неверный.");
        }
        else {
        //если существует, то сверяем пароли
        if ($myrow['password']==$password) {
        //если пароли совпадают, то запускаем пользователю сессию! Можете его поздравить, он вошел!
        $_SESSION['id']=$id;//эти данные очень часто используются, вот их и будет "носить с собой" вошедший пользовател
        echo "<html><head><meta    http-equiv='Refresh' content='0;    URL=main.php'></head></html>";
        }
     else {
        //если пароли не сошлись
    
        exit ("Извините, введённый вами name или пароль неверный.");
        }
        }
    ?>