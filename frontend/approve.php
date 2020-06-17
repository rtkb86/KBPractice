<?php
include 'bd.php';
$id = array_search('Утвердить',$_POST);
mysqli_query($bd,"UPDATE `document_status` SET `status_id` = '2' WHERE `document_status`.`document_id` ='$id'");
header('Location:Adminpanel.php'); 
exit;