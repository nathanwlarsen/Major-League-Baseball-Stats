<?php
if(isset($_POST['submit'])) {
  $data_missing = array();

  if(empty($_POST['name'])){
    //Adds name to array
    $data_missing[] = 'Name';
  }
  else {
    //Trim white space
    $v_name = trim($_POST['name']);
    setcookie("name", $v_name, time() + (86400 * 30), "/");
  }
}

//insert cookie data into database
if(empty($data_missing)){
  require_once('secure/mysqli_connect.php');
  $query = "INSERT INTO Visitors(name, visitTime) VALUES (?, ?)";
  $stmt = mysqli_prepare($dbc, $query);
  $mysqltime = date('Y-m-d H:i:s');
  echo $mysqltime;
  mysqli_stmt_bind_param($stmt, "ss", $v_name, $mysqltime);
  mysqli_stmt_execute($stmt);
  $affected_rows = mysqli_stmt_affected_rows($stmt);
  if($affected_rows == 1){
    mysqli_stmt_close($stmt);
    mysqli_close($dbc);
    header("Location: cookieTest.php");
  }
  else {
    echo '<p>Error Occurred</p>';
    echo mysqli_error();
    mysqli_stmt_close($stmt);
    mysqli_close($dbc);
  }
}
else {
  echo 'You need to enter your name';
}
?>
