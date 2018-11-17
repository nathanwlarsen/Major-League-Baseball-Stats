<?php
if(isset($_POST['submit'])) {
  $data_missing = array();

  if(empty($_POST['playerID'])){
    //Adds name to array
    $data_missing[] = 'Player ID';
  }
  else {
    //Trim white space
    $v_playerID = trim($_POST['playerID']);
  }
  if(empty($_POST['birthYear'])){
    //Adds name to array
    $data_missing[] = 'Birth Year';
  }
  else {
    //Trim white space
    $v_birthYear = trim($_POST['birthYear']);
  }
  if(empty($_POST['birthMonth'])){
    //Adds name to array
    $data_missing[] = 'Birth Month';
  }
  else {
    //Trim white space
    $v_birthMonth = trim($_POST['birthMonth']);
  }
  if(empty($_POST['birthDay'])){
    //Adds name to array
    $data_missing[] = 'Birth Day';
  }
  else {
    //Trim white space
    $v_birthDay = trim($_POST['birthDay']);
  }
  if(empty($_POST['birthCountry'])){
    //Adds name to array
    $data_missing[] = 'Birth Country';
  }
  else {
    //Trim white space
    $v_birthCountry = trim($_POST['birthCountry']);
  }
  if(empty($_POST['birthState'])){
    //Adds name to array
    $data_missing[] = 'Birth State';
  }
  else {
    //Trim white space
    $v_birthState = trim($_POST['birthState']);
  }
  if(empty($_POST['birthCity'])){
    //Adds name to array
    $data_missing[] = 'Birth City';
  }
  else {
    //Trim white space
    $v_birthCity = trim($_POST['birthCity']);
  }
  if(!empty($_POST['deathYear'])){
    $v_deathYear = trim($_POST['deathYear']);
  }
  if(!empty($_POST['deathMonth'])){
    $v_deathMonth = trim($_POST['deathMonth']);
  }
  if(!empty($_POST['deathDay'])){
    $v_deathDay = trim($_POST['deathDay']);
  }
  if(!empty($_POST['deathCountry'])){
    $v_deathCountry = trim($_POST['deathCountry']);
  }
  if(!empty($_POST['deathState'])){
    $v_deathState = trim($_POST['deathState']);
  }
  if(!empty($_POST['deathCity'])){
    $v_deathCity = trim($_POST['deathCity']);
  }
  if(empty($_POST['nameFirst'])){
    //Adds name to array
    $data_missing[] = 'First Name';
  }
  else {
    //Trim white space
    $v_nameFirst = trim($_POST['nameFirst']);
  }
  if(empty($_POST['nameLast'])){
    //Adds name to array
    $data_missing[] = 'Last Name';
  }
  else {
    //Trim white space
    $v_nameLast = trim($_POST['nameLast']);
  }
  if(empty($_POST['nameGiven'])){
    //Adds name to array
    $data_missing[] = 'Given Name';
  }
  else {
    //Trim white space
    $v_nameGiven = trim($_POST['nameGiven']);
  }
  if(empty($_POST['weight'])){
    //Adds name to array
    $data_missing[] = 'Weight';
  }
  else {
    //Trim white space
    $v_wieght = trim($_POST['weight']);
  }
  if(empty($_POST['height'])){
    //Adds name to array
    $data_missing[] = 'Height';
  }
  else {
    //Trim white space
    $v_height = trim($_POST['height']);
  }
  if(empty($_POST['bats'])){
    //Adds name to array
    $data_missing[] = 'Bats';
  }
  else {
    //Trim white space
    $v_bats = trim($_POST['bats']);
  }
  if(empty($_POST['throws'])){
    //Adds name to array
    $data_missing[] = 'Throws';
  }
  else {
    //Trim white space
    $v_throws = trim($_POST['throws']);
  }
  if(empty($_POST['debut'])){
    //Adds name to array
    $data_missing[] = 'Debut';
  }
  else {
    //Trim white space
    $v_debut = trim($_POST['debut']);
  }
  if(empty($_POST['finalGame'])){
    //Adds name to array
    $data_missing[] = 'Final Game';
  }
  else {
    //Trim white space
    $v_finalGame = trim($_POST['finalGame']);
  }
  if(empty($_POST['retroID'])){
    //Adds name to array
    $data_missing[] = 'Retro ID';
  }
  else {
    //Trim white space
    $v_retroID = trim($_POST['retroID']);
  }
  if(empty($_POST['bbrefID'])){
    //Adds name to array
    $data_missing[] = 'BBREF ID';
  }
  else {
    //Trim white space
    $v_bbrefID = trim($_POST['bbrefID']);
  }
}
if(empty($data_missing)){
  require_once('secure/mysqli_connect.php');
  $query = "INSERT INTO master(playerID, birthYear,birthMonth,birthDay,birthCountry,birthState,birthCity,deathYear,deathMonth,deathDay,deathCountry,deathState,deathCity,nameFirst,nameLast,nameGiven,weight,height,bats,throws,debut,finalGame, retroID, bbrefID) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
  $stmt = mysqli_prepare($dbc, $query);
  mysqli_stmt_bind_param($stmt, "siiissssssssssssiissssss", $v_playerID, $v_birthYear, $v_birthMonth, $v_birthDay, $v_birthCountry, $v_birthState, $v_birthCity, $v_deathYear, $v_deathMonth, $v_deathDay, $v_deathCountry, $v_deathState, $v_deathCity, $v_nameFirst, $v_nameLast, $v_nameGiven, $v_wieght, $v_height, $v_bats, $v_throws, $v_debut, $v_finalGame, $v_retroID, $v_bbrefID);
  mysqli_stmt_execute($stmt);
  $affected_rows = mysqli_stmt_affected_rows($stmt);
  if($affected_rows == 1){
    echo 'Player Entered<br/>';
    foreach ($_POST as $key => $value)
        echo $key.': '.$value.'<br>';
    mysqli_stmt_close($stmt);
    mysqli_close($dbc);
  }
  else {
    echo 'Error Occurred<br />';
    echo mysqli_error();
    mysqli_stmt_close($stmt);
    mysqli_close($dbc);
  }
}
else {
  echo 'You need to enter the following data<br />';
  foreach($data_missing as $missing){
    echo "$missing<br />";
  }
}
?>
