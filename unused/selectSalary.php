<?php
require_once('secure/mysqli_connect.php');
$query = "SELECT * FROM salaries LIMIT 100";
$response = @mysqli_query($dbc, $query);

if($response){

    echo '<table align="left"
    cellspacing="5" cellpadding="8">

    <tr>
    <td align="left"><b>Year</b></td>
    <td align="left"><b>Team ID</b></td>
    <td align="left"><b>League</b></td>
    <td align="left"><b>Player ID</b></td>
    <td align="left"><b>Salary</b></td>
    </tr>';

    // mysqli_fetch_array will return a row of data from the query until no further data is available
    while($row = mysqli_fetch_array($response)){

        echo '<tr><td align="left">' .
        $row['yearID'] . '</td><td align="left">' .
        $row['teamID'] . '</td><td align="left">' .
        $row['lgID'] . '</td><td align="left">' .
        $row['playerID'] . '</td><td align="left">$' .
        $row['salary'] . '</td><td align="left">';
        echo '</tr>';
    }
    echo '</table>';
} else {
    echo "Couldn't issue database query<br />";
}
?>
