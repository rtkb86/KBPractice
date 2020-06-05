<?php session_start();
include 'bd.php';
include 'bdz.php';
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
    <div>
        <div class="header-dark">
            <nav class="navbar navbar-dark navbar-expand-lg navigation-clean-search" id="nbar_m">
                <div class="container">
                  <a id="logo" href="Main.php">
                    <img id="logo" src="assets/img/logo.png" style="width: 80px;">
                  </a>
                  <input type="search" id="search-field" class="search-field" name="search">
                  <a id="search1" class="btn btn-light action-button" href="Search.html">
                    <i class="fa fa-search"></i>&nbsp;
                  </a>
                  <?if ($role == 2):?>
                  <a id="admin" class="btn btn-light action-button" href="Adminpanel.php">К панели администратора</a>
                  <?endif?>
                  <a class="btn btn-light action-button" href="Upload.html">Загрузить файл</a>
                  <div class="collapse navbar-collapse" id="navcol-1">
                    <ul class="nav navbar-nav">
                      <li class="nav-item" role="presentation"></li>
                    </ul>
                    <form class="form-inline mr-auto" target="_self">
                      <div class="form-group"><label for="search-field"></label></div>
                    </form>
                  </div>
                    <?if(empty($id)):?>
                      <a class="btn btn-light action-button" role="button" href="Log%20in.html">Вход</a>
                      <a class="btn btn-light action-button" role="button" href="Sign%20up.html">Регистрация</a>
                    <?else:?>
                      <a class="btn btn-light action-button" role="button" href="#" >Аккаунт</a>
                      <form action="exit.php" method="post">
                      <input class="btn btn-light action-button" type="submit" value="Выйти">
                      </form>
                    <?endif?>  
                    <?php//echo $_SESSION['id']// нада для отладки =)?>           
            </nav>
            <p><br><div class="form-group pull-right">
    
</div>
<span class="counter pull-right"></span>
<table class="table table-hover table-bordered results">
  <thead>
    <tr>
      <th id="tbltext">#</th>
      <th id="tbltext" class="col-md-5 col-xs-5">Название документа</th>
      <th id="tbltext" class="col-md-4 col-xs-4">Дата загрузки</th>
      <th id="tbltext" class="col-md-3 col-xs-3">Статус</th>
    </tr>
    <tr class="warning no-result">
      <td id="tbltext" colspan="4"><i class="fa fa-warning"></i> Нет результатов</td>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th id="tbltext" scope="row">1</th>
      <td id="tbltext" >Документ №1</td>
      <td id="tbltext" >25.05.2020</td>
      <td id="tbltext" >Подтвержден</td>
    </tr>
    <tr>
      <th id="tbltext" scope="row">2</th>
      <td id="tbltext" >Документ №2</td>
      <td id="tbltext" >25.05.2020</td>
      <td id="tbltext" >Не подтвержден</td>
    </tr>
    <tr>
      <th id="tbltext" scope="row">3</th>
      <td id="tbltext" >Документ №3</td>
      <td id="tbltext" >25.05.2020</td>
      <td id="tbltext" >Не подтвержден</td>
    </tr>
    <tr>
      <th id="tbltext" scope="row">4</th>
      <td id="tbltext" >Документ №4</td>
      <td id="tbltext" >24.05.2020</td>
      <td id="tbltext" >Не подтвержден</td>
    </tr>
  </tbody>
</table></p>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/Table-with-search.js"></script>
</body>

</html>