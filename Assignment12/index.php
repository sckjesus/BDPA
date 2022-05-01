<body>
    <head>
    </head>
    <body>
        <form method="post" style="border-color: black; border-width: 2px">
            <b>Add a Message: </b> <input type="text" name="key1" />
            <input type="submit" name="button" value="Submit" /><br><br>
        </form>
        <form method="post">
            <b>Delete a Message</b> (Enter message <b>#</b>): <input type="text" name="key2" />
            <input type="submit" name="button" value="Submit" /><br><br>
        </form>
        <form method="post">
            <b>Update a Message: </b><br>
            Enter Message <b>#</b> to Update: <input type="text" name="key3" /><br>
            Enter New Message: <input type="text" name="key4" />
            <input type="submit" name="button" value="Submit" /><br><br>
        </form>
<?php

include "messages.php";

try {
    $connection = new PDO(
        'mysql:host=studentdb;dbname=first_message_hua;port=3306',
        'samuel_kaspar_ouz',
        'd8ae2742eb2b2bd2de3d'
    );
} catch (PDOException $e) {
    die("Error connecting to MySQL: {$e->getMessage()}");
};


//-------------------------------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------------------------------

if ($_POST['key1']){
    $messagehelper = new Messageshelper();
    $messagehelper->add_message($connection, $_POST['key1']);
};

if ($_POST['key2']){
    $messagehelper = new Messageshelper();
    $messagehelper->delete_message($connection, $_POST['key2']);
};

if ($_POST['key3'] && $_POST['key4']){
    $messagehelper = new Messageshelper();
    $messagehelper->update_message($connection, $_POST['key3'], $_POST['key4']);
};



//-------------------------------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------------------------------

$query = "SELECT id, sender, message, timestamp FROM messages";
$statement = $connection->prepare($query);
$statement->execute();
//-------------------------------------------------------------------------------------------------------------------

echo "<head><style> table, td, th, tr {text-align:center; border: 3px solid black; font-size:150%; margin-left:auto; margin-right:auto; width:50%};</style></head><body><table><tr><th>Message #</th><th>Sender</th><th>Message</th><th>Timestamp</th></tr>";
//-------------------------------------------------------------------------------------------------------------------

while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
    echo "<tr><td>".$row['id']."</td><td>".$row['sender']."</td><td>".$row['message']."</td><td>".$row['timestamp']."</td></tr>";
}

//-------------------------------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------------------------------



?>

        <b style='font-size:150%;'><a href='index.php'>Reload</a> to see the most recent results</b><br><br><br>
    </body>
</html>