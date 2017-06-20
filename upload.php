<?php
session_start();
include_once 'dbh.php';
if(isset($_POST['submit'])){
	$file= $_FILES['file'];
	$fileName = $_FILES['file']['name'];
	$fileTmpName = $_FILES['file']['tmp_name'];
	$filesize = $_FILES['file']['size'];
	$fileError = $_FILES['file']['error'];
	$fileType = $_FILES['file']['type'];
	
	$fileExt = explode('.', $fileName );
	$fileActualExt = strtolower(end($fileExt));
	
	$allowed = array('jpg', 'jpeg', 'png', 'pdf', 'text');
	
	if(in_array($fileActualExt, $allowed )){
		if($fileError === 0){
			if($filesize<1000000){
				$fileNameNew ="upload".uniqid().".".$fileActualExt;
			    $fileDestination = 'upload/'.$fileNameNew;
				move_uploaded_file($fileTmpName, $fileDestination);
				header("Location: index.php?uploadsuccess");
				echo "success";
			}else{
				echo "To Big";
			}
		}else{
			echo "You Have Some Error";
		}
	}else{
		echo "You Can Not upload";
	}
}