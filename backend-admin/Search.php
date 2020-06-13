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

<body><a href="Main.html"></a>
    <nav class="navbar navbar-dark navbar-expand-lg" id="nbar_s">
        <div class="container"><a href="Main.php"><img id="logo" src="assets/img/logo.png" style="width: 80px;"></a>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav">
                    <li class="nav-item" role="presentation"></li>
                </ul>
                <form class="form-inline mr-auto" target="_self">
                    <div class="form-group"><label for="search-field"></label></div>
                </form>
            </div>
        </div>
    </nav><div id="tws">
<div class="form-group pull-right">
    <input type="text" class="search form-control" placeholder="Введите название документа">
</div>
<span class="counter pull-right"></span>
<table class="table table-hover table-bordered results">
  <thead>
    <tr>
      <th>#</th>
      <th class="col-md-5 col-xs-5">Название документа</th>
      <th class="col-md-4 col-xs-4">Дата загрузки</th>
      <th class="col-md-3 col-xs-3">Статус</th>
    </tr>
    <tr class="warning no-result">
      <td colspan="4"><i class="fa fa-warning"></i> Нет результатов</td>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Документ №1</td>
      <td>25.05.2020</td>
      <td>Подтвержден</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Документ №2</td>
      <td>25.05.2020</td>
      <td>Не подтвержден</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Документ №3</td>
      <td>25.05.2020</td>
      <td>Не подтвержден</td>
    </tr>
    <tr>
      <th scope="row">4</th>
      <td>Документ №4</td>
      <td>24.05.2020</td>
      <td>Не подтвержден</td>
    </tr>
  </tbody>
</table>
</div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/Table-with-search.js"></script>
</body>

</html>