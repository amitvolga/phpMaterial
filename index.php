<?php
include 'dbh.php';
include 'contactUs.php';

?>
<!DOCTYPE html>
<head>
	<title>Full Screen Landing Page</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  	<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
  	<script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<link href="css/animate.css" rel="stylesheet"/>
	<link href="css/waypoints.css" rel="stylesheet"/>
	<script src="js/jquery.waypoints.min.js" type="text/javascript"></script>
	<script src="js/waypoints.js" type="text/javascript"></script>
	<script src="js/sideNav.js" type="text/javascript"></script>
</head>
<body> 
    <div class = "warpper"/> 
			<div class= "menuBar">
			<div class= "button" onclick="openNavHelp()" >Help</div>
			<div class= "button"onclick="openNavContact()">Contact us</div>
			<div class= "button"onclick="openNavAsk()">About us</div>
			<div class= "button"onclick="openNavFile()">Upload File</div>
	</div>
	<div id="help" class="sidenav">
         <a href="javascript:void(0)" class="closebtn" onclick="closeNavHelp()">&times;</a>
		 <div class="innerNav">
		 <h1 >Help</h1>
		 <input type = "text" name ="search" id = "search" placeholder="Serch here"/>
		 <input type="submit" onclick="" value="search" />
		 </div>
    </div>
	<div id="upload" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNavFile()">&times;</a>
		<div class="innerNav">
		<h1 >Upload File</h1>
	    <form action='upload.php' method='POST' enctype='multipart/form-data'>
		    <input type = 'file' name= 'file'/>
			<button type='submit' name='submit'>Upload
			</button>  
		</form>
		 </div>
    </div>
    <div id="ask" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNavAsk()">&times;</a>
        <div class="innerNav">
			<h1 >About us</h1>
			<p style="float:left;">Since these large scale gatherings bring together the best tech professionals in the country, 
			they are a natural choice for us to announce the winners in many of our yearly contests and prized titles, like 'CIO of The Year, 
			'Best IT Projects of The Year, 'Best Mobile App of The Year', etc. Among our winners are the biggest banks in Israel, top telecom companies,
			airlines, the Israeli government, the Israeli army (IDF) and many more.</p>
			<span style="float:right;">
				<img src="about.jpg" alt="work" />
			</span>
			<span style="float:right;"><p >It’s just a moment in time – just one hand reaching over the counter to present a cup to another outstretched hand.
                                    But it’s a connection.We make sure everything we do honors that connection – from our commitment to the highest quality
								   in every place that we’ve been, and every place.</p></span>
			<span style="float:left;">
				<img src="about2.jpg" alt="work" />
			</span>
			<span style="float:left;">
				<p >People & Computers has been around since 1981,
					focusing on computer oriented news and tech journalism.
					The group publishes a variety of magazines in the field,
					spearheaded by InformationWorld – the Israeli IT industry magazine,
					and operates quite news sites and IT forums for the benefit of the world-renowned local tech industry.
					Whether it’s the biggest buyout in tech history.
				</p>
			</span>
			<span style="float:right;">
				<img src="about3.jpg" alt="work" />
			</span>
		 </div>
	</div>

	<div id="contect" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNavContact()">&times;</a>
        <div class="innerNav">
		<h1 >Contact us</h1>
			<?php
			echo "<form method='POST' action='".contact($conn)."'>
		    <input type = 'text' name= 'name' placeholder='Name'/><br/>
			<input type = 'email' name= 'email' placeholder='Email'/><br/>
			<textarea rows='6' cols='50' name = 'message'>
			</textarea><br/>
			<button name='commentSubmit' type='submit'>Contact Us</button>
		</form><br/><br/><br/><br/>";
		?>
            <img src="1.jpg" alt="Apple" />
		</div>
	</div>
	
    <section >       
		<div class="intro">
		   <div class="fileDownlod">
				<div>
				</div>
				<h1 class="dmb">Are You ready?</h1>
				<p>2 files, 164 MB・Files deleted in 4 days</p>
				  <h1 class="dmb">בהצלחה</h1>
				<div class="form">
				<a  href = "download.php?file=ResizeImage.png">לילה לבן</a>
			    </div>
				<div class="form">
				   <a  href = "download.php?file=ResizeImage.png">לילה לבן בנייד</a>
			    </div>
			</div>
			</div>
    </section>			
		<section class="intro"> 
			<div class = "inner">
				<div class = "content">
					<section class="os-animation" data-os-animation="bounceInUp" data-os-animation-delay="0s">
						<h1>Exemple </h1>
					</section>
					  <section class="os-animation" data-os-animation="bounceInUp" data-os-animation-delay="0s">
						<a class="btn" href="#">Get Started</a>
					</section>
				</div>
			</div> 
		</section>
	</div>

</body>
</html>