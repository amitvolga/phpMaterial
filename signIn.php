<?php
session_start();
include 'dbh2.php';

$name = $_POST['customer_name'];
$password = $_POST['password'];
$email = $_POST['email'];

echo $name."<br/>" ;
echo $password."<br/>";
echo $email."<br/>";
if(empty($name)){
	header("Location: some.php?error=empty");
	exit();
}
if(empty($email)){
	header("Location: some.php?error=empty");
	exit();
}
if(empty($password)){
	header("Location: some.php?error=empty");
	exit();
}
else{
    $sql = "select customer_name from customer where customer_name='$name'";
	$result = mysqli_query($conn, $sql);
	$uidcheck = mysqli_num_rows($result);
	if($uidcheck > 0){
		header("Location: some.php?error=userName");
	    exit();
	}else{
		$encrypted = password_hash($password, PASSWORD_DEFAULT);
	    $sql = "Insert into customer (customer_name, password, email)
        values ('$name','$encrypted','$email')";
        $result = mysqli_query($conn, $sql);
 
     header("Location: login.php");	
	}
	}
?>