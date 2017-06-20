<?php
function setComment($conn){
    if(isset($_POST['commentSubmit'])){
	    $userNmae= mysqli_real_escape_string($conn, $_POST['user_id']);
        $date= mysqli_real_escape_string($_POST['date']);
        $message= mysqli_real_escape_string($_POST['message']);

        $sql= "insert into comments (message, customer_id, date ) 
	    values('$message','$userNmae','$date')";	
       	$result = $conn -> query($sql);   
	}
	
}
function getComments($conn){
	$sql = "select * from comments";
	$result = $conn->query($sql);
	while($row = $result->fetch_assoc()){
		$replyid = $row['idcomments'];
	    $sql3 = "select * from reply where commentid = '$replyid'";
	    $result3 = $conn->query($sql3);
		
		$id = $row['customer_id'];
		$sql2 = "select * from customer where id='$id'";
	    $result2 = $conn->query($sql2);
		if($row2 = $result2->fetch_assoc()){
			
			echo  "<div class='comments-box'>";
			echo $row['idcomments']."<br/>";
			echo $row2['customer_name']."<br/>";
			echo nl2br($row['message'])."<br/>";
			echo $row['date']."<br/>";
			while($row3 = $result3 ->fetch_assoc()){
			echo $row3['commentid'];
			echo $row3['customerid'];
			echo nl2br($row3['reply']);
			echo $row3['date']."<br/>";
	
			}
				if(isset($_SESSION['id'])){
					//client can delete of edit his post's only when he is logged in. 
					if($_SESSION['id']== $row2['id']){
						$idDelete=$_SESSION['id'];
						echo"<form class='edit-form' action='editComments.php' method='POST' >
							<input type='hidden' name='user_id' value='".$row['customer_id']."'/>
							<input type='hidden' name='id' value='".$row['idcomments']."'/>
							<input type='hidden' name='date' value='".$row['date']."'/>
							<input type='hidden' name='message' value='".$row['message']."'/>
							<button>
							EDIT
							</button>
						</form>
						<form class='delete-form' action='".deleteComments($conn,$idDelete)."' method='POST' >
							<input type='hidden' name='id' value='".$row['idcomments']."'/>
							<button name='commentDelete' type='submit'>
							DELETE
							</button>
						</form>";
					}else{ //button reply for others peolpe post's  
						
						echo "<form class='edit-form' action='replyComments.php' method='POST' >
								<input type='hidden' name='user_id' value='".$_SESSION['id']."'/>
								<input type='hidden' name='id' value='".$row['idcomments']."'/>
								<button  type='submit'>
							Reply
							</button>
						</form>";
						echo"</div>";
					}
				}else{
					echo "<p class= 'commentMessage' >You need to be login to reply!!</p>";
				}
					echo"</div>";
			
				
		    }
	}
	

}
function editComments($conn){
	if(isset($_POST['commentSubmit'])){
		$commentId= mysqli_real_escape_string($conn, $_POST['id']);
		$userNmae= mysqli_real_escape_string($conn, $_POST['user_id']);
        $date = mysqli_real_escape_string($conn, $_POST['date']);
        $message =mysqli_real_escape_string($conn, $_POST['message']);
		
		$sql= "UPDATE `db_dao`.`comments` SET `message`='$message' WHERE `idcomments`='$commentId'";
       	$result = $conn -> query($sql);
		header("Location: comments.php");
	}
}
function deleteComments($conn, $idDelete){
	if(isset($_POST['commentDelete'])){
		$commentId= mysqli_real_escape_string($conn, $_POST['id']);
		
		$sql = "DELETE  from comments where idcomments='$commentId' and customer_id='$idDelete'";
		$sql1 = "DELETE  from reply where commentid='$commentId'";
		$result = $conn -> query($sql);
		$result1 = $conn -> query($sql1);
		header("Location: comments.php");
	}
}
function getLogin($conn){
	if(isset($_POST['loginSubmit'])){
	    $userName = mysqli_real_escape_string($conn, $_POST['name']);
	    $password =mysqli_real_escape_string($conn, $_POST['password']);
	   
	    $stmt = $conn -> prepare( "select * from customer where customer_name=? and password = ?");
	    $stmt->bind_param("ss",$name, $pass );
		$name = $userName;
		$pass = $password;
		$stmt->execute();

		$result = $stmt -> get_result();
		$rowNum = $result->num_rows;
		
	    if($rowNum > 0){
	        if($row = $result->fetch_assoc()){
		         $_SESSION['id'] = $row['id'];
	             header("Location: comments.php?loginsuccess");
	             exit();
		    }	
	    }else{
		header("Location: comments.php?loginfiled");
	       exit();
	    }
   }
}
function logout(){
	if(isset($_POST['logoutSubmit'])){
		session_start();
		session_destroy();
		header("Location: comments.php");
	       exit();
	}
	
}
function replyComments($conn){
	
	if(isset($_POST['replySubmit'])){
	    $commentId=mysqli_real_escape_string($conn, $_POST['id']);
		$userNmae= mysqli_real_escape_string($conn, $_POST['user_id']);
        $date = mysqli_real_escape_string($conn, $_POST['date']);
        $reply = mysqli_real_escape_string($conn, $_POST['reply']);
        
		
		$sql= "insert into reply (reply, customerid, commentid, date ) 
	    values('$reply','$userNmae','$commentId','$date')";	
       	$result = $conn -> query($sql); 
        header("Location: comments.php"); 		
	}
	
}