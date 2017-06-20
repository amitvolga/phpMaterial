<?php 
include 'dbh.php';

function contact($conn){
	
	if(isset($_POST['commentSubmit'])){
		$name = $_POST['name'];
	    $message = $_POST['message'];
	    $email = $_POST['email'];
		if(empty($name)){
			header("Location: index.php?error=empty");
			exit();
		}
		if(empty($email)){
			header("Location: index.php?error=empty");
			exit();
		}
		if(empty($message)){
			header("Location: index.php?error=empty");
			exit();
		}
	else{
		$sql = "insert into customer (customer_name, message, email);
		values('$name','$message','$email')";
		$result = $conn->query($sql);
		header('Location: index.php');
		}
	}
}
?>