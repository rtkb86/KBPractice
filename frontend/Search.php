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
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/Table-with-search.js"></script>
</head>

<body >
<a href="Main.html"></a>
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
    <input type="text" class="search form-control" placeholder="Введите название документа" value='<? echo $_POST['search']?>' >
</div>
<span class="counter pull-right"></span>
<table class="table table-hover table-bordered results">
  <thead>
    <tr>
      <th id="tbltext">Айди</th>
      <th id="tbltext" class="col-md-5 col-xs-5">Название документа</th>
      <th id="tbltext" class="col-md-4 col-xs-4">Дата загрузки</th>
      <th id="tbltext" class="col-md-3 col-xs-3">Статус</th>
    </tr>
    <tr class="warning no-result">
      <td id="tbltext" colspan="4"><i class="fa fa-warning"></i> Нет результатов</td>
    </tr>
  </thead>
  <tbody>
  <?php
$result = mysqli_query($bd, "select `id`, `name`, `create_time`, `status_id` from document join document_status on document.id = document_status.document_id"); //извлекаем из базы все данные о пользователе с введенным логином
$myrow = mysqli_fetch_all($result);
$id = $myrow['id'];
$role = $myrow['role_id']; 
foreach ($myrow as $val) {
    echo '<tr>'."\n";
$val[1]= $val[1].'<form action="docs/download.php" method="post"><input name='."$val[0]".' id="abut" class="btn btn-light action-button" value="Скачать" type="submit"></form>'."\n";
if ($val[3] == 2){
    $val[3]='Подтвержден';
} elseif ($val[3] == 1){
    $val[3]='Не подтвержден';
} 
    foreach ($val as $value) { 
    
        echo '<td>'.$value.'</td>'."\n";
    }
    echo '</tr>'."\n";

}
echo '</tbody>'."\n"; 
echo '</table>'."\n"; 
?>
</div>

</body>

</html>