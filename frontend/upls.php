<?php
session_start();
include 'bd.php';
include 'bdz.php';
$message = ''; 
if (isset($_POST['uploadBtn']) && $_POST['uploadBtn'] == "Загрузить")
{
  if (isset($_FILES['uploadedFile']) && $_FILES['uploadedFile']['error'] === UPLOAD_ERR_OK)
  {
    // get details of the uploaded file
    $fileTmpPath = $_FILES['uploadedFile']['tmp_name'];
    $fileName = $_FILES['uploadedFile']['name'];
    $fileSize = $_FILES['uploadedFile']['size'];
    $fileType = $_FILES['uploadedFile']['type'];
    $fileNameCmps = explode(".", $fileName);
    $fileExtension = strtolower(end($fileNameCmps));

    // sanitize file-name
    $newFileName = $fileName;

    // check if file has one of the following extensions
    $allowedfileExtensions = array('docx');

    if (in_array($fileExtension, $allowedfileExtensions))
    {
      // directory in which the uploaded file will be moved
      $uploadFileDir = './docs/';
      $dest_path = $uploadFileDir . $newFileName;
      if(move_uploaded_file($fileTmpPath, $dest_path)) 
      {
        $message ='File is successfully uploaded.';
        mysqli_query($bd, "INSERT INTO document (name) VALUES ('$newFileName')");
        $idd = mysqli_insert_id($bd);
        mysqli_query($bd, "INSERT INTO document_uploader (user_id, document_id) VALUES ('$id', '$idd')");
        mysqli_query($bd, "INSERT INTO document_type (type_id, document_id) VALUES ('1', '$idd')");
        mysqli_query($bd, "INSERT INTO document_status (document_id, id_set_by, status_id) VALUES ('$idd', '$id', '1')");
        mysqli_query($bd, "INSERT INTO setstatus_by (id_status, user_id) VALUES ('1', '$id')");
        mysqli_query($bd, "INSERT INTO last_document_modify (document_id, modify_id) VALUES ('$idd', '3')");
        mysqli_query($bd, "INSERT INTO modified_by (id_manage, user_id) VALUES ('3', '$id')");
      }
      else 
      {
        $message = 'There was some error moving the file to upload directory. Please make sure the upload directory is writable by web server.';
      }
    }
    else
    {
      $message = 'Upload failed. Allowed file types: ' . implode(',', $allowedfileExtensions);
    }
  }
  else
  {
    $message = 'There is some error in the file upload. Please check the following error.<br>';
    $message .= 'Error:' . $_FILES['uploadedFile']['error'];
  }
}
$_SESSION['message'] = $message;
header("Location: upload.php");