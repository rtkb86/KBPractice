<?php
session_start(); 
?>
<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title></title>
    <link type="text/css" rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bitter:400,700">
    <link type="text/css" rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="assets/fonts/simple-line-icons.min.css">
    <link type="text/css" rel="stylesheet" href="assets/css/Adminpanel.css">
    <link type="text/css" rel="stylesheet" href="assets/css/Drag--Drop-Upload-Form.css">
    <link type="text/css" rel="stylesheet" href="assets/css/Log%20in.css">
    <link type="text/css" rel="stylesheet" href="assets/css/Main.css">
    <link type="text/css" rel="stylesheet" href="assets/css/Search.css">
    <link type="text/css" rel="stylesheet" href="assets/css/Sign%20up.css">
    <link type="text/css" rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <nav class="navbar navbar-dark navbar-expand-lg navigation-clean-search" id="nbar_m">
        <div class="container"><a id="logo" href="Main.php"><img id="logo" src="assets/img/logo.png" style="width: 80px;"></a>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav">
                    <li class="nav-item" role="presentation"></li>
                </ul>
            </div>
        </div>
    </nav>
    <div id="bcu" class="dashed_upload"></div>
  <div class="drop">
    <div class="cont">
      <i class="fa fa-cloud-upload"></i>
      <div class="tit">
        Загрузите файл
        <form method="POST" action="upls.php" enctype="multipart/form-data">
          <div>
            <label style="text-transform: none;" class="btn btn-light action-button"for="doc_upload">Выберите файл</label>
            <input id="doc_upload" type="file" name="uploadedFile"  class="inputfile" />
          </div>
          <input class="btn btn-light action-button" type="submit" name="uploadBtn" value="Загрузить" />
        </form>
      </div>
    </div>
  </div>

  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/index.js"></script>
</div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/Table-with-search.js"></script>
</body>

</html>