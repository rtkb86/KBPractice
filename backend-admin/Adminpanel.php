<?php session_start();
include 'bd.php';
include 'bdz.php';
?>
<?if($role == 2):?>
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
    <div class="header-dark" style="position: initial;">
        <nav class="navbar navbar-dark navbar-expand-lg navigation-clean-search" id="nbar_m">
            <div class="container"><a id="logo" href="Main.php"><img id="logo" src="assets/img/logo.png" style="width: 80px;"></a>
                <div class="collapse navbar-collapse" id="navcol-1">
                    <ul class="nav navbar-nav">
                        <li class="nav-item" role="presentation"></li>
                    </ul>
                    <form class="form-inline mr-auto" target="_self">
                        <div class="form-group"><label for="search-field"></label></div>
                    </form>
                </div>
            </div>
        </nav>
        <p><br><div class="form-group pull-right">
    
</div>
<div class="form-group pull-right">
    <input type="text" class="search form-control" placeholder="Поиск по двум таблицам">
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
$val[1]= $val[1].'<form action="docs/download.php" method="post"><input name='."$val[0]".' id="abut" class="btn btn-light action-button" value="Скачать" type="submit"></form>
<form action="docs/delete.php" method="post"><input name='."$val[0]".' id="abut" class="btn btn-light action-button" value="Удалить" type="submit"></form>'."\n";
if ($val[3] == 2){
    $val[3]='Подтвержден';
} elseif ($val[3] == 1){
    $val[3]='Не подтвержден';
} 
    foreach ($val as $value) { 
        if ($value == 'Не подтвержден'){
            echo '<td>'.$value."\n";
            echo '<form action="approve.php" method="post"><input name='."$val[0]".' id="abut" class="btn btn-light action-button" value="Утвердить" type="submit"></td></form>'."\n";
        } else {
    
        echo '<td>'.$value.'</td>'."\n";}
    }
    echo '</tr>'."\n";

}
echo '</tbody>'."\n"; 
echo '</table>'."\n"; 
?>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/Table-with-search.js"></script>
<?php
$result = mysqli_query($bd, "select `username`, `id`, `role_id` from user join user_role on user.id = user_role.user_id"); //извлекаем из базы все данные о пользователе с введенным логином
$myrow = mysqli_fetch_all($result);
$id = $myrow['id'];
$role = $myrow['role_id']; 
echo '<table class="table table-hover table-bordered results">'."\n";
echo '<tr align="center">'."\n";
    echo '<th>Логин</th>'."\n";
    echo '<th>Айди</th>'."\n";
    echo '<th>Роль</th>'."\n";
echo '</tr>';
 
foreach ($myrow as $val) {
    echo '<tr>'."\n";
if ($val[2] == 2){
    $val[2]='Администратор';
} elseif ($val[2] == 1){
    $val[2]='Пользователь';
} 
    foreach ($val as $value) { 
        if ($value == 'Пользователь'){
            echo '<td>'.$value."\n";
            echo '<form action="change.php" method="post"><input name='."$val[1]".' id="abut" class="btn btn-light action-button" value="Повысить" type="submit"></form>
            <form action="deleteuser.php" method="post"><input name='."$val[1]".' id="abut" class="btn btn-light action-button" value="Удалить" type="submit"></form>'."\n";
        } else {
    
        echo '<td>'.$value.'</td>'."\n";}
    }
    echo '</tr>'."\n";

}
echo '<td colspan="3" align="center"><a class="btn btn-light action-button" role="button" href="Sign%20up.html">Добавить нового пользователя</a></td>';
echo '</table>'."\n"; 
?>
</body>

</html>
<?else:
  echo 'У тебя нет доступа,';
  ?>
  <a href="Main.php">Авторизуйся</a>
<?endif?>