<?php
include 'dbh2.php';
session_start();
$name = $_POST['customer_name'];
$password = $_POST['password'];

$sql = "SELECT * FROM db_dao.customer WHERE customer_name='$name'";
$result = mysqli_query($conn, $sql);
$row = $result->fetch_assoc();
$hash_pwd = $row['password'];
$hash = password_verify($password, $hash_pwd);
if($hash == 0){
	header("Location: login.php?error=empty");
	
	exit();
}else{

    $sql = "SELECT * FROM db_dao.customer WHERE customer_name='$name' AND password = '$hash_pwd'";
    $result = mysqli_query($conn, $sql);
    if(!$row = $result->fetch_assoc()){
	    echo "Your user or password incorrect";
    }else{
        echo "Your login ";
	    $_SESSION['id'] = $row['id'];
        header("Location: index.php");
 }
}
?>