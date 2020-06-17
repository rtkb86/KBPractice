<?php 
$result = mysqli_query($bd, "select * from user join user_role on user.id = user_role.user_id where user.id ='$_SESSION[id]'"); //извлекаем из базы все данные о пользователе с введенным логином
$myrow = mysqli_fetch_array($result);
$id = $myrow['id'];
$role = $myrow['role_id']; 
?>