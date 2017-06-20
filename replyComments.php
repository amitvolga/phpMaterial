<?php
date_default_timezone_set('Europe/copenhagen');
include'commentsConn.php';
include 'commentsphp.php';

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
	    $commentId= $_POST['id'];
		$userName= $_POST['user_id'];
     echo $commentId.$userName;
		echo "<form method='POST' action='".replyComments($conn)."'>
		    <input type = 'hidden' name= 'user_id' value='".$userName."'/>
			<input type = 'hidden' name= 'id' value='".$commentId."'/>
		    <input type = 'hidden' name= 'date' value='".date('Y-m-d ')."'/>
		    <textarea name = 'reply'>
			</textarea><br/>
			<button name='replySubmit' type='submit'>Reply</button>
		</form>";
		?>
		
    </body>
</html>