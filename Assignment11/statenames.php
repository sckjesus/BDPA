<?php
    $datasource = 'mysql:host=studentdb;dbname=bdpa_practice';
    $username = 'bdpa_student';
    $password = 'Q4e8wz923462';

    $pdo = new PDO($datasource, $username, $password);

    $select = "SELECT name FROM states ORDER BY name DESC";
    $statement = $pdo->prepare($select);
    $statement->execute();

    echo "<head><style>table, td, th { text-align:center; border: 3px solid black; font-size:200%; margin-left:auto; margin-right:auto; width:50%}</style></head><body><table><tr><th>State</th></tr>";

    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr><td>".$row['name']."</td></tr>";
    }

    echo "</table></body>";

