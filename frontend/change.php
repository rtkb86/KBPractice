<?php
include 'bd.php';
$id = array_search('Повысить',$_POST);
mysqli_query($bd,"UPDATE `user_role` SET `role_id` = '2' WHERE `user_role`.`user_id` ='$id'");
header('Location:Adminpanel.php'); exit;