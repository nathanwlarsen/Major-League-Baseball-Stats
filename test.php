<?php
echo 'SELECT DISTINCT(master.nameFirst), master.nameLast, Fielding.POS, Salaries.salary, Fielding.G
FROM Salaries
JOIN Teams
ON Salaries.teamID = Teams.teamID
JOIN TeamsFranchises
ON teams.franchID = TeamsFranchises.franchID
JOIN master
ON Master.playerID = Salaries.playerID
JOIN Fielding
ON Fielding.playerID = master.playerID
WHERE Salaries.yearID = 2000
AND TeamsFranchises.franchName = 'San Francisco Giants'
AND (Salaries.playerID, Fielding.G)
IN (SELECT playerID, MAX(G) FROM Fielding
GROUP BY playerID);';

 ?>
