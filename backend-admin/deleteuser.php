<?php
include './bd.php';
$id = array_search('Удалить',$_POST);
mysqli_query($bd,"DELETE FROM `user` WHERE `user`.`id` = $id");
header('Location: ./Adminpanel.php'); // 
exit;