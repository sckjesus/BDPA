<?php
class Messageshelper {
	public function add_message($connection, $sender, $messa){
		date_default_timezone_set("America/Chicago");
		$date = date('Y-m-d h:i:s');
		$query = "INSERT INTO messages (message, sender, timestamp) VALUES (?, '".$sender."', '".$date."')";

		$statement = $connection->prepare($query);
		$statement->bindParam(1, $messa);
		$statement->execute();
	}

#-------------------------------------------------------------------------------------------------------------
#-------------------------------------------------------------------------------------------------------------

	public function delete_message($connection, $num1){

		$query = "DELETE FROM messages WHERE id = ?";

		$statement = $connection->prepare($query);
		$statement->bindParam(1, $num1);
		$statement->execute();
	}

#-------------------------------------------------------------------------------------------------------------
#-------------------------------------------------------------------------------------------------------------

	public function update_message($connection, $num2, $messag){

		$query = "UPDATE messages SET message = ? WHERE id = ?";

		$statement = $connection->prepare($query);
		$statement->bindParam(1, $messag);
		$statement->bindParam(2, $num2);
		$statement->execute();
	}

#-------------------------------------------------------------------------------------------------------------
#-------------------------------------------------------------------------------------------------------------

	public function sign_up($connection){
		
		echo "        
		<form action='sign_up.php' method='post'>
            <div> Username:
              	<input type='text' name='usernamesignup' />
            </div>
            <div> Password:
              	<input type='password' name='passwordsignup' />
            </div>
            <div> Name:
              	<input type='text' name='namesignup' />
            </div>
            <div>
        		<input type='submit' value='Sign Up' />
            </div>
        </form>
		";
		
	}

#-------------------------------------------------------------------------------------------------------------
#-------------------------------------------------------------------------------------------------------------

	public function login($connection){

	    if ($_POST['username'] && $_POST['password'] or $_SESSION['log']==1) {
			
			$_SESSION['userid'] = null;
			$_SESSION['name'] = null;
			$_SESSION['username'] = null;
			$_SESSION['password'] = null;


			$query = "SELECT password, username, name, id FROM users WHERE username = ?";
			$statement = $connection->prepare($query);
			$statement->bindParam(1, $_POST['username']);
			$statement->execute();
			$userData = $statement->fetch(PDO::FETCH_ASSOC);

			if ($userData && password_verify($_POST['password'], $userData['password']) or $_SESSION['log']==1) {
				$_SESSION['log'] = 1;
				$_SESSION['userid'] = $userData['id'];
				$_SESSION['name'] = $userData['name'];
				$_SESSION['password'] = $userData['password'];
				$_SESSION['username'] = $userData['username'];

				

				echo"
					<head>
						<title>Messages</title>
					</head>
					<body>
						<h1 style='text-align:right'>Hello <u>".$userData['name']."</u></h1>
						<form method='post'>
							<b>Add a Message: </b> <input type='text' name='key1' />
							<input type='submit' name='button' value='Submit' /><br><br>
						</form>
						<form method='post'>
							<b>Delete a Message</b> (Enter message <b>#</b>): <input type='text' name='key2' />
							<input type='submit' name='button' value='Submit' /><br><br>
						</form>
						<form method='post'>
							<b>Update a Message: </b><br>
							Enter Message <b>#</b> to Update: <input type='text' name='key3' /><br>
							Enter New Message: <input type='text' name='key4' />
							<input type='submit' name='button' value='Submit' /><br><br>
						</form>
					</body>
				";

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
			
				//-------------------------------------------------------------------------------------------------------------------
				//-------------------------------------------------------------------------------------------------------------------
			
				$query = "SELECT id, message, sender, timestamp FROM messages";
				$statement = $connection->prepare($query);
				$statement->execute();
				
				//-------------------------------------------------------------------------------------------------------------------
				echo "<head><style> table, td, th, tr {text-align:center; border: 3px solid black; font-size:150%; margin-left:auto; margin-right:auto; width:50%};</style></head><body><table><tr><th>Message #</th><th>Sender</th><th>Message</th><th>Timestamp</th></tr>";
				//-------------------------------------------------------------------------------------------------------------------
				
				while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
					echo "<tr><td>".$row['id']."</td><td>".$row['sender']."</td><td>".$row['message']."</td><td>".$row['timestamp']."</td></tr>";
				}
				echo "</table>";
			} else {
				$_SESSION['log'] = 0;
				echo "There is no user with those credentials<br>";
                echo "<h2><a href='login.html'>Log In</a></h2>";
			}
		}

	}
};
?>

