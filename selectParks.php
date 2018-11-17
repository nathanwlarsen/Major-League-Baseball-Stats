<?php
require_once('secure/mysqli_connect.php');
$city = $_POST['city'];
$query = "SELECT * FROM parks WHERE city = '$city'";
$response = @mysqli_query($dbc, $query);
?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <style type="text/css">

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
            <?php echo '<h1 class="page-header">'.ucfirst($city).'</h1>';?>
            <?php
            if($response){

                echo '<table style="color: white" align="left"
                cellspacing="5" cellpadding="8">

                <tr>
                <td align="left"><b>Park Name</b></td>
                <td align="left"><b>&emsp;&emsp;Park Alias</b></td>
                <td align="left"><b>&emsp;&emsp;City</b></td>
                <td align="left"><b>&emsp;&emsp;State</b></td>
                <td align="left"><b>&emsp;&emsp;Country</b></td>
                </tr>';

                // mysqli_fetch_array will return a row of data from the query until no further data is available
                while($row = mysqli_fetch_array($response)){

                    echo '<tr><td align="left">' .
                    $row['park.name'] . '</td><td align="left">' . '&emsp;&emsp;' .
                    $row['park.alias'] . '</td><td align="left">' . '&emsp;&emsp;' .
                    $row['city'] . '</td><td align="left">' . '&emsp;&emsp;' .
                    $row['state'] . '</td><td align="left">' . '&emsp;&emsp;' .
                    $row['country'] . '</td><td align="left">';
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
