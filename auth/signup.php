<?php
include_once 'bd.php';
if (isset($_POST['name'])) 
      { $name = $_POST['name']; 
      if ($name == '') { unset($name);} } //заносим введенный пользователем логин в переменную $email, если он пустой, то уничтожаем переменную
   if (isset($_POST['email'])) 
      { $email = $_POST['email']; 
      if ($email == '') { unset($email);} } //заносим введенный пользователем логин в переменную $email, если он пустой, то уничтожаем переменную
   if (isset($_POST['password'])) 
      { $password=$_POST['password']; 
      if ($password =='') { unset($password);} }//заносим введенный пользователем пароль в переменную $password, если он пустой, то уничтожаем переменную
   if (empty($email) or empty($password) or empty($name)) //если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
      {
      exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
      }
      //если логин и пароль введены, то обрабатываем их, чтобы теги и скрипты не работали, мало ли что люди могут ввести
      $email = stripslashes($email);
      $email = htmlspecialchars($email);
      $password = stripslashes($password);
      $password = htmlspecialchars($password);
      $name = stripslashes($name);
      $name = htmlspecialchars($name);
      //удаляем лишние пробелы
      $email = trim($email);
      $password = trim($password);
      $password = md5($password);
      // проверка на существование пользователя с таким же логином
      $sqlcheck = "SELECT id FROM user WHERE email='$email'";
      $result = mysqli_query($bd, $sqlcheck);
      $myrow = mysqli_fetch_array($result);
      if (!empty($myrow['id'])) {
      exit ("Извините, введённый вами логин уже зарегистрирован. Введите другой логин.");
      }
      // если такого нет, то сохраняем данные
      $sqlint = "INSERT INTO user (email,password,username) VALUES('$email','$password','$name')";
      $result2 = mysqli_query ($bd, $sqlint);
      // Проверяем, есть ли ошибки
      if ($result2=='TRUE')
      {
      header('Location:Main.php'); exit;
      }
   else {
      echo "Error: " . $sql . "<br>" . mysqli_error($bd);
      }
?>