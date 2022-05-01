<?php
    session_start();    


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

//---------------------------------------------------------------------------------------------------------------------------------
$messagehelper = new Messageshelper();
$messagehelper->login($connection);
if ($_POST['key1']){
    $messagehelper = new Messageshelper();
    $messagehelper->add_message($connection, $userData['name'], $_POST['key1']);
};

if ($_POST['key2']){
    $messagehelper = new Messageshelper();
    $messagehelper->delete_message($connection, $_POST['key2']);
};

if ($_POST['key3'] && $_POST['key4']){
    $messagehelper = new Messageshelper();
    $messagehelper->update_message($connection, $_POST['key3'], $_POST['key4']);
};
?>