<?php
    $server = 'localhost';
    $user = 'root';
    $pass = '';
    
    $bd=mysqli_connect($server, $user, $pass, $database); 
    //if($bd)
    //echo 'Соединение установлено.';
    //else
    //die('Ошибка подключения к серверу баз данных.');
    
    $database = 'mydb';
    $selected = mysqli_select_db($bd, "mydb");
   // if($selected)
    //echo ' Подключение к базе данных прошло успешно.';
    //else
    //die(' База данных не найдена или отсутствует доступ.');
    ?>