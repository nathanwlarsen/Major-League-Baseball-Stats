<?php
require_once('secure/mysqli_connect.php');
$year = $_POST['year'];
$franchName = $_POST['team'];
$query = "SELECT DISTINCT(master.nameFirst), master.nameLast, Fielding.POS, Salaries.salary, Fielding.G
FROM Salaries
JOIN Teams
ON Salaries.teamID = Teams.teamID
JOIN TeamsFranchises
ON teams.franchID = TeamsFranchises.franchID
JOIN master
ON Master.playerID = Salaries.playerID
JOIN Fielding
ON Fielding.playerID = master.playerID
WHERE Salaries.yearID = $year
AND TeamsFranchises.franchName = '$franchName'
AND (Salaries.playerID, Fielding.G)
IN (SELECT playerID, MAX(G) FROM Fielding
GROUP BY playerID)";

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
            <?php echo '<h1 class="page-header">'.ucfirst($franchName).' - '.$year.'</h1>'?>
            <?php
            if($response){

              echo '<table style="color: white" align="left"
              cellspacing="5" cellpadding="8">

              <tr>
              <td align="left"><b>First</b></td>
              <td align="left"><b>&emsp;&emsp;Last</b></td>
              <td align="left"><b>&emsp;&emsp;Most Played Position</b></td>
              <td align="left"><b>&emsp;&emsp;Games In Position</b></td>
              <td align="left"><b>&emsp;&emsp;Salary For Year</b></td>
              </tr>';

              // mysqli_fetch_array will return a row of data from the query until no further data is available
              while($row = mysqli_fetch_array($response)){
                echo '<tr><td align="left">' .
                $row['nameFirst'] . '</td><td align="left">' . '&emsp;&emsp;' .
                $row['nameLast'] . '</td><td align="left">' . '&emsp;&emsp;' .
                $row['POS'] . '</td><td align="left">' . '&emsp;&emsp;' .
                $row['G'] . '</td><td align="left">' . '&emsp;&emsp;$' .
                number_format($row['salary']) . '</td><td align="left">';
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
