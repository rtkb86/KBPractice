<?php
include '../bd.php';
$id = array_search('Удалить',$_POST);
mysqli_query($bd,"DELETE FROM `document` WHERE `document`.`id` = $id");
header('Location: ../Adminpanel.php'); // нарочно не удаляю сам файл ибо это 1 строка и вслучае чего допилю потом
exit;