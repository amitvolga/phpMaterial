<?php


return $conn = mysqli_connect('localhost:3306', 'root', 'root', 'db_dao');

if(!conn){
	die("connection failed: ".mysqli_connect_error());
}


