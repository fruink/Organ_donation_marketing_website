<?php
	require_once('phpscripts/config.php');
	confirm_logged_in();
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Welcome to your admin panel</title>
<link rel="stylesheet" href="css/main.css">
</head>
<header>
		<?php if($_SESSION['loggedin'] == "yes"){
			echo '<a id="returnLink" href="../index.html">Return To Main Site</a>';
		}else{
			echo '<a id="returnLink" href="phpscripts/caller.php?caller_id=logout">Return To Main Site</a>';
		}?>
</header
<body>
	<div id='menuContainer'>
		<h2 id='createheader'>What Section Would You Like To Change?</h2>
		<div id='optionsContainer'>
			<div id='whySect' class='sectCont'>
				<a href='admin_changewhy.php'>Why Donate</a>
			</div>
			<div id='howSect' class='sectCont'>
				<a href='admin_changehow.php'>How To Donate</a>
			</div>
			<div id='mythsSect' class='sectCont'>
				<a href='admin_changestory.php'>Donation Stories</a>
			</div>
			<div id='justSect' class='sectCont'>
				<a href='admin_changevideo.php'>Donation Video</a>
			</div>
			<div id='organSect' class='sectCont'>
				<a href='admin_changeorgans.php'>Learn More</a>
			</div>
		</div>
	</div>
	<div id="backToMenu">
		<a href="admin_index.php" class="indexlink">Back To Menu</a>
	</div>
</body>
</html>
