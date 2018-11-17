<?php
require_once('secure/mysqli_connect.php');
$first = $_POST['first'];
$last = $_POST['last'];
$query = "SELECT *
FROM master
WHERE nameFirst = '$first'
AND nameLast = '$last'";

$response = @mysqli_query($dbc, $query);
?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <style type="text/css">

  table {
    align: center;
    border-spacing: 20px;
  }
  td {
    padding: 10px;
  }

  input[type=text], select {
    color: black;
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
    <nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper" role="navigation">
      <ul class="nav sidebar-nav">
        <li>
          <a href="index.html"><i class="fa fa-fw fa-home"></i>Home</a>
        </li>
        <li>
          <a href="selectTeam.html"><i class="fa fa-fw fa-file-o"></i>Team/Year Query</a>
        </li>
        <li>
          <a href="selectPlayer.html"><i class="fa fa-fw fa-file-o"></i>Player Query</a>
        </li>
        <li>
          <a href="selectParks.html"><i class="fa fa-fw fa-file-o"></i>Park/City Query</a>
        </li>
        <li>
          <a href="selectSchool.html"><i class="fa fa-fw fa-file-o"></i>Player/School Query</a>
        </li>
      </ul>
    </nav>
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
            <?php echo '<h1 class="page-header">'.ucfirst($first).' '.ucfirst($last).'</h1>'?>
            <?php

            if($response){

              echo '<table style="color: white" align="left">';

              // mysqli_fetch_array will return a row of data from the query until no further data is available
              while($row = mysqli_fetch_array($response)){

                echo
                '<tr>
                <td align="left"><b>Birth Year</b></td>
                <td align="left">' . $row['birthYear'] . '</td>
                </tr>
                <tr>
                <td align="left"><b>Birth Month</b></td>
                <td align="left">' . $row['birthMonth'] . '</td>
                </tr>
                <tr>
                <td align="left"><b>Birth Day</b></td>
                <td align="left">' . $row['birthDay'] . '</td>
                </tr>
                <tr>
                <td align="left"><b>Birth Country</b></td>
                <td align="left">' . $row['birthCountry'] . '</td>
                </tr>
                <tr>
                <td align="left"><b>Birth State</b></td>
                <td align="left">' . $row['birthState'] . '</td>
                </tr>
                <tr>
                <td align="left"><b>Birth City</b></td>
                <td align="left">' . $row['birthCity'] . '</td>
                </tr>
                <tr>
                <td align="left"><b>Death Year</b></td>
                <td align="left">' . $row['deathYear'] . '</td>
                </tr>
                <tr>
                <td align="left"><b>Death Month</b></td>
                <td align="left">' . $row['deathMonth'] . '</td>
                </tr>
                <tr>
                <td align="left"><b>Death Day</b></td>
                <td align="left">' . $row['deathDay'] . '</td>
                </tr>
                <tr>
                <td align="left"><b>Death Country</b></td>
                <td align="left">' . $row['deathCountry'] . '</td>
                </tr>
                <tr>
                <td align="left"><b>Death State</b></td>
                <td align="left">' . $row['deathState'] . '</td>
                </tr>
                <tr>
                <td align="left"><b>Death City</b></td>
                <td align="left">' . $row['deathCity'] . '</td>
                </tr>
                <tr>
                <td align="left"><b>First Name</b></td>
                <td align="left">' . $row['nameFirst'] . '</td>
                </tr>
                <tr>
                <td align="left"><b>Last Name</b></td>
                <td align="left">' . $row['nameLast'] . '</td>
                </tr>
                <tr>
                <td align="left"><b>Given Name</b></td>
                <td align="left">' . $row['nameGiven'] . '</td>
                </tr>
                <tr>
                <td align="left"><b>Weight</b></td>
                <td align="left">' . $row['weight'] . '</td>
                </tr>
                <tr>
                <td align="left"><b>Height</b></td>
                <td align="left">' . $row['height'] . '</td>
                </tr>
                <tr>
                <td align="left"><b>Bats</b></td>
                <td align="left">' . $row['bats'] . '</td>
                </tr>
                <tr>
                <td align="left"><b>Throws</b></td>
                <td align="left">' . $row['throws'] . '</td>
                </tr>
                <tr>
                <td align="left"><b>Debut</b></td>
                <td align="left">' . $row['debut'] . '</td>
                </tr>
                <tr>
                <td align="left"><b>Final Game</b></td>
                <td align="left">' . $row['finalGame'] . '</td>';
                echo '</tr>';
              }
              echo '</table>';
            } else {
              echo '<div style="color:white">Could not issue database query</div>';
            }
            ?>
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
