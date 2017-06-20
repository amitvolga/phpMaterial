<?php
date_default_timezone_set('Europe/Copenhagen');
include 'commentsConn.php ';
include 'commentsphp.php';
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>
		</title>
		<script type="text/javascript">
		</script>
        <link rel="stylesheet" type="text/css" href="comments_style.css"/>
	</head>
    <body>
	     <?php
			echo" <form method='POST' action='".getLogin($conn)."'>
			 <input type='txet' name='name' placeholder='User Name'/>
			 <input type='password' name='password' placeholder='Password'/>
			 <button type='submit'name='loginSubmit'>Login</button>
			 </form>";
			 echo" <form method='POST' action='".logout()."'>
			 <button type='submit' name='logoutSubmit'>Logout</button>
			 </form>";
			if(isset($_SESSION['id'])){
				echo "You are login!!!";
			}else{
				echo "You are Not login!!!";
			}
		
		?>
		<br/>
		<br/>
		<iframe width="420" height="315" src="https://www.youtube.com/embed/XGSy3_Czz8k" frameborder="0" allowfullscreen></iframe>
<br/>
		<br/>
		<?php
		if(isset($_SESSION['id'])){
		    echo "<form method='POST' action='".setComment($conn)."'>
					<input type = 'hidden' name= 'user_id' value='".$_SESSION['id']."'/>
					<input type = 'hidden' name= 'date' value='".date('Y-m-d H:i:s')."'/>
					<textarea name = 'message'>
					</textarea><br/>
					<button name='commentSubmit' type='submit'>Comment</button>
			    </form>";
			}else{
				echo "You need to login to comment!!!<br/><br/>";
			}
		
	
		getComments($conn);
		
		?>
		
    </body>
</html>
