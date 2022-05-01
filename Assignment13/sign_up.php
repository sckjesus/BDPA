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


    

    $query = "SELECT username FROM users";
    $statement = $connection->prepare($query);
    $statement->execute();
    $usernames = $statement->fetch(PDO::FETCH_ASSOC);

    $query = "SELECT password FROM users";
    $statement = $connection->prepare($query);
    $statement->execute();
    $passwords = $statement->fetch(PDO::FETCH_ASSOC);

    if ($_POST["passwordsignup"]){
        if (in_array($_POST["usernamesignup"], $usernames)){
            echo "Sorry, that username is already taken...<br>";
            echo "Sign Up again<br>";
            echo "<h2><a href='sign_up.html'>Sign Up</a></h2>";
        } elseif (in_array($_POST["passwordsignup"], $passwords)){
            echo "Sorry, that password is already taken...<br>";
            echo "Sign Up again<br>";
            echo "<h2><a href='sign_up.html'>Sign Up</a></h2>";
        }else {
            $query = "INSERT INTO users(username, password, name) VALUES (?, ?, ?)";
            $statement = $connection->prepare($query);
            $statement->bindParam(1, $_POST['usernamesignup']);
            $statement->bindParam(2, password_hash($_POST['passwordsignup'], PASSWORD_DEFAULT));
            $statement->bindParam(3, $_POST['namesignup']);
            $a = $statement->execute();
            if ($a==1){
                echo "You are now Signed up!<br>";
                echo "You can now log in<br>";
                echo "<h2><a href='login.html'>Log In</a></h2>";
            };  
        }
        
    };
    echo "<script>window.location.replace('http://www.w3schools.com');</script>";

