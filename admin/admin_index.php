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
<body>
	<header>
		<?php 
			if($_SESSION['loggedin'] == "yes"){
				echo '<a id="returnLink" href="../index.html">Return To Main Site</a>';
			}else{
			echo '<a id="returnLink" href="phpscripts/caller.php?caller_id=logout">Return To Main Site</a>';
			}
		?>
	</header
	<?php echo '<div id="slideup"><h1 id="indexGreeting"> Hi '.$_SESSION['user_name'].', what would you like to do today?</h1></div> ';?>
	<?php
		if($_SESSION['user_lvl'] == 1){
			echo '
				<div id="masterContainer">
					<div class="indexContainer" id="editC">
						<a href="admin_contentmenu.php" class="indexlink">Edit Content</a>
						<p id="editDesc">Alter dynamic content within the site (text and images)</p>
					</div>
					<div class="indexContainer" id="create">
						<a href="admin_createuser.php" class="indexlink">Create User</a>
						<p id="createDesc">Create a new adminstrative user for the site</p>
					</div>
					<div class="indexContainer" id="editD">
						<a href="admin_edituser.php" class="indexlink">Edit Your Account</a>
						<p id="editUDesc">Edit your account details</p>
					</div>
					<div class="indexContainer" id="delete">
						<a href="admin_deleteuser.php" class="indexlink">Delete User</a>
						<p id="deleteDesc">Revoke a users adminstrative access (can not be undone)</p>
					</div>
					<div id="signoutContainer">
						<a href="phpscripts/caller.php?caller_id=logout" class="indexlink">Sign Out</a>
					</div>
				</div>
				';
	}else{
		echo '
			<div id="masterContainer">
				<div class="indexContainer" id="editC2">
					<a href="admin_contentmenu.php" class="indexlink">Edit Content</a>
					<p id="editDesc">Alter dynamic content within the site (text and images)</p>
				</div>
				<div class="indexContainer" id="editD2">
					<a href="admin_edituser.php" class="indexlink">Edit Your Account</a>
					<p id="editUDesc">Edit your account details</p>
				</div>
				<div id="signoutContainer2">
					<a href="phpscripts/caller.php?caller_id=logout" class="indexlink">Sign Out</a>
				</div>
			</div>
			';
	}
	?>
</body>
</html>
