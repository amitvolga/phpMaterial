<?php
session_start();

?>
<!DOCTYPE html>
<html>
    <head>
        <title>
		</title>
		<link rel="stylesheet" type="text/css" href="style.css"/>
		<script type="text/javascript">
		</script>
    </head>
    <body>
	    <header>
	        <nav>
	            <ul>
				 <li><a href="login.php">Home</a></li>
<?php	
    if(isset($_SESSION['id'])){
	    echo "
	        <form action='loguot.php'  > 
		         <button value = 'submit' type='submit'>Log uot</button> 
		    </form>";
	}else{
	     echo "<form action='login2.php' method='POST' >
	           <input type='text' name = 'customer_name' placeholder='User Name'/>
	           <input type='password' name = 'password' placeholder='Password'/>  
		       <button value = 'submit' type='submit'>login</button> 
		    </form>";
	}
          


?>				 
				 <li><a href="some.php">Sign Up</a></li>
				</ul>
	        </nav>
	    </header>