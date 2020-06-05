<?php
    session_start();
    unset($_SESSION['password']);
            unset($_SESSION['name']); 
            unset($_SESSION['id']);
            unset($_SESSION['role']);//    уничтожаем переменные в сессиях
            session_destroy();
        exit("<html><head><meta    http-equiv='Refresh' content='0;    URL=main.php'></head></html>");
            // отправляем пользователя на главную страницу.
            ?>