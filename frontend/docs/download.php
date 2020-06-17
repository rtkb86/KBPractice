<?php
include '../bd.php';
$id = array_search('Скачать',$_POST);
$result = mysqli_query($bd,"select name from document where id ='$id'");
$myrow = mysqli_fetch_array($result);
$filename = $myrow['name'];
if(ini_get('zlib.output_compression'))
  ini_set('zlib.output_compression', 'Off');
$file_extension = strtolower(substr(strrchr($filename,"."),1));
switch( $file_extension )
{
          case "pdf": $ctype="application/pdf"; break;
          case "exe": $ctype="application/octet-stream"; break;
          case "zip": $ctype="application/zip"; break;
          case "doc": $ctype="application/msword"; break;
          case "xls": $ctype="application/vnd.ms-excel"; break;
          case "ppt": $ctype="application/vnd.ms-powerpoint"; break;
          case "mp3": $ctype="audio/mp3"; break;
          case "gif": $ctype="image/gif"; break;
          case "png": $ctype="image/png"; break;  
          case "docx": $ctype="application/vnd.openxmlformats-officedocument.wordprocessingml.document"; break;
          case "jpg": $ctype="image/jpg"; break;
          default: $ctype="application/force-download";
}
header("Pragma: public"); 
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Cache-Control: private",false); // нужен для некоторых браузеров
header("Content-Type: $ctype");
header("Content-Disposition: attachment; filename=\"".$filename."\";" );
header("Content-Transfer-Encoding: binary");
header("Content-Length: ".filesize($filename)); // необходимо доделать подсчет размера файла по абсолютному пути
readfile("$filename");
//header('Location:Adminpanel.php'); 
exit();