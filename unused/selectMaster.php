<?php
require_once('secure/mysqli_connect.php');
$query = "SELECT * FROM master LIMIT 100";
$response = @mysqli_query($dbc, $query);

if($response){

    echo '<table align="left"
    cellspacing="5" cellpadding="8">

    <tr>
    <td align="left"><b>Player ID</b></td>
    <td align="left"><b>Birth Year</b></td>
    <td align="left"><b>Birth Month</b></td>
    <td align="left"><b>Birth Day</b></td>
    <td align="left"><b>Birth Country</b></td>
    <td align="left"><b>Birth State</b></td>
    <td align="left"><b>Birth City</b></td>
    <td align="left"><b>Death Year</b></td>
    <td align="left"><b>Death Month</b></td>
    <td align="left"><b>Death Day</b></td>
    <td align="left"><b>Death Country</b></td>
    <td align="left"><b>Death State</b></td>
    <td align="left"><b>Death City</b></td>
    <td align="left"><b>First Name</b></td>
    <td align="left"><b>Last Name</b></td>
    <td align="left"><b>Given Name</b></td>
    <td align="left"><b>Weight</b></td>
    <td align="left"><b>Height</b></td>
    <td align="left"><b>Bats</b></td>
    <td align="left"><b>Throws</b></td>
    <td align="left"><b>Debut</b></td>
    <td align="left"><b>Final Game</b></td>
    <td align="left"><b>Retro ID</b></td>
    <td align="left"><b>BBREF ID</b></td>
    </tr>';

    // mysqli_fetch_array will return a row of data from the query until no further data is available
    while($row = mysqli_fetch_array($response)){

        echo '<tr><td align="left">' .
        $row['playerID'] . '</td><td align="left">' .
        $row['birthYear'] . '</td><td align="left">' .
        $row['birthMonth'] . '</td><td align="left">' .
        $row['birthDay'] . '</td><td align="left">' .
        $row['birthCountry'] . '</td><td align="left">' .
        $row['birthState'] . '</td><td align="left">' .
        $row['birthCity'] . '</td><td align="left">' .
        $row['deathYear'] . '</td><td align="left">' .
        $row['deathMonth'] . '</td><td align="left">' .
        $row['deathDay'] . '</td><td align="left">' .
        $row['deathCountry'] . '</td><td align="left">' .
        $row['deathState'] . '</td><td align="left">' .
        $row['deathCity'] . '</td><td align="left">' .
        $row['nameFirst'] . '</td><td align="left">' .
        $row['nameLast'] . '</td><td align="left">' .
        $row['nameGiven'] . '</td><td align="left">' .
        $row['weight'] . '</td><td align="left">' .
        $row['height'] . '</td><td align="left">' .
        $row['bats'] . '</td><td align="left">' .
        $row['throws'] . '</td><td align="left">' .
        $row['debut'] . '</td><td align="left">' .
        $row['finalGame'] . '</td><td align="left">' .
        $row['retroID'] . '</td><td align="left">' .
        $row['bbrefID'] . '</td><td align="left">';
        echo '</tr>';
    }
    echo '</table>';
} else {
    echo "Couldn't issue database query<br />";
}
?>
