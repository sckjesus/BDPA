<?php
class Messageshelper {
	public function add_message($conn, $messa){
		date_default_timezone_set("America/Chicago");
		$date = date('Y-m-d h:i:s');
		$query = "INSERT INTO messages (message, sender, timestamp) VALUES (?, '".rand(0,100)."', '".$date."')";

		$statement = $conn->prepare($query);
		$statement->bindParam(1, $messa);
		$statement->execute();
	}
	public function delete_message($conn, $num1){

		$query = "DELETE FROM messages WHERE id = ?";

		$statement = $conn->prepare($query);
		$statement->bindParam(1, $num1);
		$statement->execute();
	}
	public function update_message($conn, $num2, $messag){

		$query = "UPDATE messages SET message = ? WHERE id = ?";

		$statement = $conn->prepare($query);
		$statement->bindParam(1, $messag);
		$statement->bindParam(2, $num2);
		$statement->execute();
	}
};
?>