<?php
    $datasource = 'mysql:host=studentdb;dbname=bdpa_practice';
    $username = 'bdpa_student';
    $password = 'Q4e8wz923462';

    $pdo = new PDO($datasource, $username, $password);

    $select = "SELECT latitude, longitude, capital FROM states ORDER BY capital";
    $statement = $pdo->prepare($select);
    $statement->execute();

    echo "<head><style>table, td, th { text-align:center; border: 3px solid black; font-size:200%; margin-left:auto; margin-right:auto; width:50%}</style></head><body><table><tr><th>Capital</th><th>Latitude</th><th>Longitude</th></tr>";

    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr><td>".$row['capital']."</td><td>".$row['latitude']."</td><td>".$row['longitude']."</td></tr>";
    }

    echo "</table></body>";

