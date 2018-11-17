<!DOCTYPE html>
<html lang="en" >
<head>
  <style type="text/css">

  input[type=text], select {
    font-size: 14pt;
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
  }

  input[type=submit] {
    font-size: 14pt;
    width: 100%;
    background-color: #2980B9;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
  }

  input[type=submit]:hover {
    background-color: #154360;
  }

  div {
    border-radius: 5px;
    padding: 20px;
  }
  /** {
    font-family: Calibri, Candara, Segoe, "Segoe UI", Optima, Arial, sans-serif;
  }*/
  </style>
  <meta charset="UTF-8">
  <title>CINS 570 Project</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'>

  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <div id="wrapper">
    <div class="overlay"></div>

    <!-- Sidebar -->

    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">
      <button type="button" class="hamburger is-closed animated fadeInLeft" data-toggle="offcanvas">
        <span class="hamb-top"></span>
        <span class="hamb-middle"></span>
        <span class="hamb-bottom"></span>
      </button>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-lg-offset-2">
            <h1 class="page-header">Backups</h1>
          </div>
        </div>
      </div>
    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script src='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js'></script>

  <script  src="js/index.js"></script>

</body>
</html>

<?php
if(isset($_POST['createBackup'])) {

  $data_missing = array();

  if(empty($_POST['minute'])){
    $data_missing[] = 'Minute';
  }
  else {
    $v_minute = trim($_POST['minute']);
  }
  if(empty($_POST['hour'])){
    $data_missing[] = 'Hour';
  }
  else {
    $v_hour = trim($_POST['hour']);
  }
  if(empty($_POST['day'])){
    $data_missing[] = 'Day';
  }
  else {
    $v_day = trim($_POST['day']);
  }
  if(empty($_POST['month'])){
    $data_missing[] = 'Month';
  }
  else {
    $v_month = trim($_POST['month']);
  }
  if(empty($_POST['dayofweek'])){
    $data_missing[] = 'Day of week';
  }
  else {
    $v_dayofweek = trim($_POST['dayofweek']);
  }
  if(empty($_POST['nameofbackup'])) {
    $data_missing[] = 'Name of backup';
  }
  else {
    $v_nameofbackup = trim($_POST['nameofbackup']);
  }
}



if(empty($data_missing)) {
  $v_string = $v_minute . ' ' . $v_hour . ' ' . $v_day . ' ' . $v_month . ' ' .
  $v_dayofweek . ' /backup.sh ' . $v_nameofbackup;
  exec('echo '.$v_string.' > /Users/nathanwlarsen/Backups/temp');
  exec('crontab /Users/nathanwlarsen/Backups/temp');
  echo "<script>
  alert('Cron Job Created!');
  window.history.go(-1);
  </script>";
}

else {
  echo '<p>You need to enter the following data</p>';
  foreach($data_missing as $missing) {
    echo "$missing<br />";
  }
}
?>
