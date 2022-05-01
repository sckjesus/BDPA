<html>
    <head>
        <style> 
            table, td, th { 
                text-align:center; 
                border: 3px solid black; 
                font-size:200%; 
                margin-left:auto; 
                margin-right:auto; 
                width:50%
            }
        </style>
    </head>
    <body>
        <table>
            <tr>
                <th>Abbreviation</th>
                <th>State</th>
                <th>Capital</th>
            </tr>

<?php
    $datasource = 'mysql:host=studentdb;dbname=bdpa_practice';
    $username = 'bdpa_student';
    $password = 'Q4e8wz923462';

    $pdo = new PDO($datasource, $username, $password);

    $select = "SELECT name, capital, abbreviation FROM states WHERE name LIKE 'm%'";
    $statement = $pdo->prepare($select);
    $statement->execute();

    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr><td>".$row['abbreviation']."</td><td>".$row['name']."</td><td>".$row['capital']."</td></tr>";
    }
?>
        </table>
    </body>";
</html>
