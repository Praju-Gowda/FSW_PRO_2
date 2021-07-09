<?php
	$firstName = $_POST['firstName'];
	$email = $_POST['email'];
	$subject = $_POST['subject'];
	$message = $_POST['message'];

	// Database connection
	$conn = new mysqli('localhost','root','','mypro');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(firstName, email, subject, message) values(?, ?, ?, ?)");
		$stmt->bind_param("sssssi", $firstName, $email, $subject, $message);
		$execval = $stmt->execute();
		echo $execval;
		echo "Message sent... Our team we contact you soon";
		$stmt->close();
		$conn->close();
	}
?>